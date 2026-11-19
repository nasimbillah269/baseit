/* BASE IT front-end scripts */
(function () {
  'use strict';

  function onVisible(el, cb) {
    if (!el) return;
    if (!('IntersectionObserver' in window)) { cb(); return; }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { cb(); io.disconnect(); }
      });
    }, { threshold: 0.25 });
    io.observe(el);
  }

  document.addEventListener('DOMContentLoaded', function () {

    /* ---------- Header height -> CSS var (hero fills the rest of the screen) ---------- */
    var setHeadHeight = function () {
      var h = 0;
      document.querySelectorAll('.top-bar, .header').forEach(function (el) {
        if (getComputedStyle(el).display !== 'none') h += el.offsetHeight;
      });
      document.documentElement.style.setProperty('--bi-head', h + 'px');
    };
    setHeadHeight();
    window.addEventListener('resize', setHeadHeight);

    /* ---------- Floating chat box: closed -> teaser -> form -> sent ---------- */
    var chat = document.getElementById('biChat');
    if (chat) {
      var launcher = chat.querySelector('.bi-chat-launcher');
      var form = chat.querySelector('.bi-chat-form');
      var done = chat.querySelector('.bi-chat-done');
      var errorBox = chat.querySelector('.bi-chat-error');
      var msg = form.querySelector('textarea');
      var count = chat.querySelector('.bi-chat-count');
      var sendBtn = form.querySelector('.bi-chat-send');

      var setState = function (s) {
        chat.setAttribute('data-state', s);
        launcher.setAttribute('aria-expanded', s === 'closed' ? 'false' : 'true');
        launcher.setAttribute('aria-label', s === 'closed' ? 'Open chat' : 'Close chat');
        if (s === 'form' && done.hidden) setTimeout(function () { form.querySelector('input[name=name]').focus(); }, 250);
        if (s === 'closed' && !done.hidden) {           // after a sent message, next open starts fresh
          setTimeout(function () { done.hidden = true; form.hidden = false; }, 300);
        }
      };

      launcher.addEventListener('click', function () {
        setState(chat.getAttribute('data-state') === 'closed' ? 'teaser' : 'closed');
      });
      chat.addEventListener('click', function (e) {
        var go = e.target.closest('[data-chat-go]');
        if (go) setState(go.getAttribute('data-chat-go') === 'close' ? 'closed' : 'form');
      });
      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && chat.getAttribute('data-state') !== 'closed') setState('closed');
      });

      var updateCount = function () { count.textContent = msg.value.length + ' / 700'; };
      msg.addEventListener('input', updateCount);

      var showError = function (text) { errorBox.textContent = text; errorBox.hidden = !text; };

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        showError('');
        var bad = [];
        form.querySelectorAll('[required]').forEach(function (el) {
          var invalid = !el.value.trim() || (el.type === 'email' && !/^\S+@\S+\.\S+$/.test(el.value.trim()));
          el.classList.toggle('is-invalid', invalid);
          if (invalid) bad.push(el);
        });
        if (bad.length) { showError('Please fill in your name, a valid email and your message.'); bad[0].focus(); return; }

        sendBtn.disabled = true;
        sendBtn.textContent = 'Sending...';
        fetch(form.action, {
          method: 'POST',
          body: new FormData(form),
          headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
          credentials: 'same-origin'
        }).then(function (res) {
          return res.json().catch(function () { return {}; }).then(function (data) { return { ok: res.ok, status: res.status, data: data }; });
        }).then(function (r) {
          if (r.ok) {
            form.reset(); updateCount();
            form.hidden = true; done.hidden = false;
          } else if (r.status === 422 && r.data.errors) {
            var first = Object.keys(r.data.errors)[0];
            showError(r.data.errors[first][0]);
            var field = form.querySelector('[name="' + first + '"]');
            if (field) { field.classList.add('is-invalid'); field.focus(); }
          } else if (r.status === 419) {
            showError('Your session expired. Please refresh the page and try again.');
          } else {
            showError('Sorry, the message could not be sent. Please try again or call us.');
          }
        }).catch(function () {
          showError('Network error. Please check your connection and try again.');
        }).then(function () {
          sendBtn.disabled = false;
          sendBtn.textContent = 'Send message';
        });
      });

      form.addEventListener('input', function (e) { e.target.classList.remove('is-invalid'); });
    }

    /* ---------- Sticky header: compact + shadow after scrolling (desktop CSS only) ---------- */
    var stickyHead = document.getElementById('biStickyHead');
    if (stickyHead) {
      var onScroll = function () { stickyHead.classList.toggle('is-scrolled', window.scrollY > 60); };
      onScroll();
      window.addEventListener('scroll', onScroll, { passive: true });
    }

    /* ---------- Hero slider (jQuery) ---------- */
    if (window.jQuery && jQuery('#biHero').length) {
      (function ($) {
        var $hero = $('#biHero');
        var $slides = $hero.find('.bi-hero-slide');
        var $bars = $hero.find('.bi-hero-bar');
        var $count = $hero.find('.bi-hero-count b');
        var total = $slides.length;
        var interval = 7000;      // keep in sync with --bi-hero-time
        var transition = 1300;    // longest panel transition
        var current = 0, timer = null, busy = false, paused = false, remaining = interval, startedAt = 0;
        var autoTurn = 0;         // autoplay alternates direction: right->left, then left->right ("parallax" left/right)
        // every change uses the next effect / text entrance (a slide can force one with data-effect / data-text)
        var effects = ['parallax', 'curtain', 'zoom', 'parallaxv', 'fadedark'];
        var texts = ['side', 'up', 'zoom', 'blur'];
        var moveNo = 0;

        if (total < 2) { $hero.find('.bi-hero-controls').hide(); return; }

        var pad = function (n) { return (n < 10 ? '0' : '') + n; };

        var restartBar = function () {
          $bars.removeClass('is-active is-done');
          $bars.each(function (k) { if (k < current) $(this).addClass('is-done'); });
          var $bar = $bars.eq(current);
          void $bar[0].offsetWidth;   // restart CSS animation
          $bar.addClass('is-active');
        };

        var schedule = function (ms) {
          clearTimeout(timer);
          remaining = ms;
          startedAt = Date.now();
          timer = setTimeout(function () { go(current + 1, (autoTurn++ % 2) ? 'left' : 'right'); }, ms);
        };

        // dir = side the NEW slide comes in from: 'right' (moves right->left) or 'left' (moves left->right)
        var go = function (next, dir) {
          next = (next + total) % total;
          if (next === current) return;
          if (busy) { if (!paused) schedule(400); return; }   // mid-transition: try again shortly, never stall
          busy = true;

          var $old = $slides.eq(current);
          var $new = $slides.eq(next);

          $hero.attr({
            'data-dir': dir || 'right',
            'data-effect': $new.data('effect') || effects[moveNo % effects.length],
            'data-text': $new.data('text') || texts[moveNo % texts.length]
          }).addClass('has-moved');
          moveNo++;
          void $hero[0].offsetWidth;   // make sure the new direction is applied before the animation starts

          $old.removeClass('is-active').addClass('is-leaving').attr('aria-hidden', 'true');
          $new.addClass('is-active').removeAttr('aria-hidden');
          current = next;
          $count.text(pad(current + 1));
          restartBar();

          setTimeout(function () {
            $old.removeClass('is-leaving');
            busy = false;
          }, transition);

          if (!paused) schedule(interval);
        };

        $hero.on('click', '.bi-hero-next', function () { go(current + 1, 'right'); });
        $hero.on('click', '.bi-hero-prev', function () { go(current - 1, 'left'); });
        $hero.on('click', '.bi-hero-bar', function () { var i = +$(this).data('index'); go(i, i > current ? 'right' : 'left'); });

        // Autoplay never pauses on hover: the hero fills the screen, so a hover-pause made it look stuck
        // (and on phones a tap fires mouseenter without a mouseleave, freezing it for good).

        // keyboard arrows when the slider is in view
        $(document).on('keydown', function (e) {
          var r = $hero[0].getBoundingClientRect();
          if (r.bottom < 0 || r.top > window.innerHeight) return;
          if (e.key === 'ArrowRight') go(current + 1, 'right');
          if (e.key === 'ArrowLeft') go(current - 1, 'left');
        });

        // swipe on touch devices
        var touchX = null;
        $hero.on('touchstart', function (e) { touchX = e.originalEvent.touches[0].clientX; });
        $hero.on('touchend', function (e) {
          if (touchX === null) return;
          var dx = e.originalEvent.changedTouches[0].clientX - touchX;
          if (Math.abs(dx) > 50) go(current + (dx < 0 ? 1 : -1), dx < 0 ? 'right' : 'left');
          touchX = null;
        });

        // pause when the tab is hidden
        document.addEventListener('visibilitychange', function () {
          if (document.hidden) { clearTimeout(timer); } else if (!paused) { schedule(interval); restartBar(); }
        });

        restartBar();
        schedule(interval);
      })(jQuery);
    }

    /* ---------- Service boxes: direction-aware hover overlay ---------- */
    if (window.jQuery) {
      (function ($) {
        // 0 = top, 1 = right, 2 = bottom, 3 = left
        var offsets = ['translate(0,-100%)', 'translate(100%,0)', 'translate(0,100%)', 'translate(-100%,0)'];
        var direction = function ($el, e) {
          var w = $el.outerWidth(), h = $el.outerHeight(), o = $el.offset();
          var x = (e.pageX - o.left - w / 2) * (w > h ? h / w : 1);
          var y = (e.pageY - o.top - h / 2) * (h > w ? w / h : 1);
          return Math.round((Math.atan2(y, x) * (180 / Math.PI) + 180) / 90 + 3) % 4;
        };

        $('.bi-services .service-box').each(function () {
          var $box = $(this);
          var $overlay = $box.find('.service-overlay');
          $overlay.css('transform', offsets[2]);   // hidden below until first hover

          $box.on('mouseenter', function (e) {
            var from = offsets[direction($box, e)];
            // jump (without animation) to the side the mouse came from, then slide in
            $overlay.css({ transition: 'none', transform: from });
            void $overlay[0].offsetWidth;
            $overlay.css({ transition: '', transform: 'translate(0,0)' });
          }).on('mouseleave', function (e) {
            // slide out to the side the mouse left from
            $overlay.css({ transition: '', transform: offsets[direction($box, e)] });
          });
        });
      })(jQuery);
    }

    /* ---------- Mobile menu ---------- */
    var menu = document.querySelector('.mobile-menu');
    var overlay = document.querySelector('.mobile-menu-overlay');
    var openBtn = document.querySelector('.mobile-menu-btn');
    var closeBtn = document.querySelector('.close-menu');
    var toggleMenu = function (open) {
      if (!menu) return;
      menu.classList.toggle('active', open);
      if (overlay) overlay.classList.toggle('active', open);
      document.body.style.overflow = open ? 'hidden' : '';
    };
    if (openBtn) openBtn.addEventListener('click', function () { toggleMenu(true); });
    if (closeBtn) closeBtn.addEventListener('click', function () { toggleMenu(false); });
    if (overlay) overlay.addEventListener('click', function () { toggleMenu(false); });
    document.querySelectorAll('.mobile-dropdown > a').forEach(function (a) {
      a.addEventListener('click', function (e) {
        e.preventDefault();
        a.parentElement.classList.toggle('active');
      });
    });

    /* ---------- Counters ---------- */
    document.querySelectorAll('.stat-number[data-target]').forEach(function (el) {
      onVisible(el, function () {
        var target = parseInt(el.dataset.target, 10) || 0;
        var now = 0, step = Math.max(1, Math.ceil(target / 80));
        var t = setInterval(function () {
          now += step;
          if (now >= target) { now = target; clearInterval(t); }
          el.textContent = el.dataset.plain ? String(now) : now.toLocaleString();
        }, 18);
      });
    });

    /* ---------- Circle arcs ---------- */
    document.querySelectorAll('.statsRow').forEach(function (row) {
      onVisible(row, function () {
        row.classList.add('animated');
        row.querySelectorAll('.circle-progress').forEach(function (c) {
          c.style.strokeDashoffset = getComputedStyle(c).getPropertyValue('--offset');
        });
      });
    });

    /* ---------- Statistics circles ---------- */
    document.querySelectorAll('.bi-stats-row').forEach(function (row) {
      onVisible(row, function () { row.classList.add('is-animated'); });
    });

    /* ---------- Skill metrix bars (home) ---------- */
    document.querySelectorAll('.bi-metrix-content').forEach(function (box) {
      onVisible(box, function () {
        box.querySelectorAll('.bi-bar-fill').forEach(function (bar) {
          bar.style.width = bar.dataset.width;
        });
      });
    });

    /* ---------- Skill bars ---------- */
    document.querySelectorAll('.right-panel').forEach(function (panel) {
      onVisible(panel, function () {
        panel.querySelectorAll('.skill-fill').forEach(function (bar) {
          bar.style.width = bar.dataset.width;
        });
      });
    });

    /* ---------- Domain checker ---------- */
    document.querySelectorAll('.domainCheckForm').forEach(function (form) {
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var result = form.querySelector('.domain-result');
        var btn = form.querySelector('button[type=submit]');
        result.className = 'domain-result is-loading';
        result.textContent = 'Checking...';
        btn.disabled = true;
        fetch(form.action, {
          method: 'POST',
          headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
          body: new FormData(form)
        })
          .then(function (r) { return r.json(); })
          .then(function (data) {
            result.className = 'domain-result ' + (data.success && data.available ? 'is-ok' : 'is-bad');
            result.textContent = data.message;
          })
          .catch(function () {
            result.className = 'domain-result is-bad';
            result.textContent = 'Something went wrong. Please try again.';
          })
          .finally(function () { btn.disabled = false; });
      });
    });

    /* ---------- About: Mission / Vision tabs ---------- */
    document.querySelectorAll('[data-tabs]').forEach(function (box) {
      box.querySelectorAll('[data-tab]').forEach(function (btn) {
        btn.addEventListener('click', function () {
          box.querySelectorAll('[data-tab]').forEach(function (b) { b.classList.toggle('is-active', b === btn); });
          box.querySelectorAll('[data-panel]').forEach(function (p) { p.classList.toggle('is-active', p.dataset.panel === btn.dataset.tab); });
        });
      });
    });

    /* ---------- About: services accordion ---------- */
    document.querySelectorAll('.bi-acc').forEach(function (acc) {
      acc.querySelectorAll('.bi-acc-head').forEach(function (head) {
        head.addEventListener('click', function () {
          var item = head.parentElement, open = !item.classList.contains('is-open');
          acc.querySelectorAll('.bi-acc-item').forEach(function (it) {
            it.classList.remove('is-open');
            it.querySelector('.bi-acc-head i').className = 'fas fa-plus';
          });
          if (open) {
            item.classList.add('is-open');
            head.querySelector('i').className = 'fas fa-minus';
          }
        });
      });
    });

    /* ---------- Toggle boxes (software pages) ---------- */
    document.querySelectorAll('.bi-toggle-head').forEach(function (head) {
      head.addEventListener('click', function () {
        var box = head.parentElement, open = box.classList.toggle('is-open');
        head.querySelector('i').className = 'far ' + (open ? 'fa-square-minus' : 'fa-square-plus');
      });
    });

    /* ---------- Clients A–Z directory ---------- */
    document.querySelectorAll('[data-az]').forEach(function (box) {
      box.querySelectorAll('.bi-az-letter:not([disabled])').forEach(function (btn) {
        btn.addEventListener('click', function () {
          box.querySelectorAll('.bi-az-letter').forEach(function (b) { b.classList.toggle('is-active', b === btn); });
          box.querySelectorAll('[data-group]').forEach(function (g) { g.classList.toggle('is-active', g.dataset.group === btn.dataset.letter); });
        });
      });
    });

    /* ---------- Back to top button ---------- */
    var toTop = document.querySelector('.bi-to-top');
    if (toTop) {
      var toggleTop = function () { toTop.classList.toggle('is-visible', window.scrollY > 400); };
      window.addEventListener('scroll', toggleTop, { passive: true });
      toggleTop();
      toTop.addEventListener('click', function (e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    }

    /* ---------- Auto hide flash alerts ---------- */
    setTimeout(function () {
      document.querySelectorAll('.bi-flash .alert').forEach(function (a) { a.remove(); });
    }, 7000);
  });
})();
