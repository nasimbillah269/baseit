{{-- One content block of a BASE IT page (see config/baseit.php) --}}
@switch($block['type'])

    @case('heading')
    <section class="bi-c-section">
        <div class="bi-c-wrap">
            <div class="bi-c-heading">
                @if(!empty($block['small']))<h3 class="{{!empty($block['small_orange']) ? 'is-orange' : ''}}">{{$block['small']}}</h3>@endif
                <h2>@if(!empty($block['before'])){{$block['before']}} @endif @if(!empty($block['highlight']))<span>{{$block['highlight']}}</span> @endif{{$block['rest']}}</h2>
                <div class="bi-c-line"><i></i></div>
            </div>
        </div>
    </section>
    @break

    @case('media')
    <section class="bi-c-section">
        <div class="bi-c-wrap">
            <div class="bi-c-media" @if(!empty($block['cols'])) style="grid-template-columns: {{$block['cols']}};@if(!empty($block['align'])) align-items: {{$block['align']}};@endif" @endif>
                <div class="bi-c-media-img">
                    @if(!empty($block['img']) && file_exists(public_path($block['img'])))
                    <img src="{{asset($block['img'])}}" alt="{{$page['title']}}">
                    @elseif(($block['art'] ?? '')==='domains')
                    <div class="bi-domain-art" aria-hidden="true">
                        <div class="bi-da-title">DOMAIN REGISTRATION<small>Register your domain name in brand available price</small></div>
                        <span class="t1">.info</span><span class="t2">.edu</span><span class="t3">.org</span>
                        <span class="t4">.com</span><span class="t5">.biz</span><span class="t6">.gov</span><span class="t7">.int</span>
                        <b class="s1">.edu</b><b class="s2">.int</b><b class="s3">net</b><b class="s4">com</b><b class="s5">info</b><b class="s6">.org</b>
                    </div>
                    @elseif(($block['art'] ?? '')==='web')
                    <div class="bi-web-art" aria-hidden="true">
                        <i class="fab fa-php i1"></i><i class="fab fa-wordpress i2"></i><i class="fab fa-drupal i3"></i>
                        <i class="fab fa-joomla i4"></i><i class="fab fa-magento i5"></i><i class="fab fa-html5 i6"></i>
                        <i class="fab fa-css3-alt i7"></i><i class="fab fa-js i8"></i><i class="fas fa-laptop-code i9"></i>
                        <b>WEB</b>
                    </div>
                    @elseif(($block['art'] ?? '')==='job')
                    <div class="bi-job-art" aria-hidden="true">
                        <i class="fas fa-briefcase a1"></i><i class="fas fa-search a2"></i>
                        <i class="fas fa-user-tie a3"></i><i class="fas fa-file-alt a4"></i>
                        <b>JOBS</b>
                    </div>
                    @elseif(($block['art'] ?? '')==='cart')
                    <div class="bi-cart-art" aria-hidden="true">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="l1">Shopping Cart</span><span class="l2">Product Catalog</span>
                        <span class="l3">Payment Gateway</span><span class="l4">Order Management</span>
                        <span class="l5">Customer Account</span><span class="l6">Shipping Option</span>
                        <span class="l7">SEO Friendly</span>
                    </div>
                    @elseif(($block['art'] ?? '')==='server')
                    <div class="bi-server-art" aria-hidden="true">
                        @for($r=0;$r<3;$r++)
                        <div class="bi-rack">
                            @for($u=0;$u<7;$u++)<div class="bi-unit"><i></i><i></i><i></i><span></span></div>@endfor
                        </div>
                        @endfor
                    </div>
                    @endif
                </div>
                <div class="bi-c-media-text">
                    @foreach($block['body'] as $paragraph)<p>{{$paragraph}}</p>@endforeach
                    @if(!empty($block['button']))
                    <a href="{{bpage($block['button']['slug'])}}" class="bi-c-readmore">{{$block['button']['label']}}</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @break

    @case('pricing')
    @php($rowCount = max(array_map(fn ($p) => count($p['rows']), $block['items'])))
    <section class="bi-c-section">
        <div class="bi-c-wrap">
            <div class="bi-pricing" style="--bi-rows: {{$rowCount + 4}}; --bi-cols: {{count($block['items'])}};@if(!empty($block['width'])) max-width: {{(int) $block['width']}}px;@endif @if(!empty($block['plan_width'])) grid-template-columns: repeat({{count($block['items'])}}, minmax(0, {{(int) $block['plan_width']}}px));@endif">
                @foreach($block['items'] as $plan)
                <div class="bi-plan {{!empty($plan['badge']) ? 'is-popular' : ''}}">
                    <div class="bi-plan-badge">@if(!empty($plan['badge'])){{$plan['badge']}}@endif</div>
                    <div class="bi-plan-name">{{$plan['name']}}</div>
                    <div class="bi-plan-price">{{$plan['price']}}</div>
                    @foreach($plan['rows'] as $row)
                        @if(str_starts_with($row, '# '))
                        <div class="bi-plan-row is-head">{{substr($row, 2)}}</div>
                        @else
                        <div class="bi-plan-row">{!! preg_replace('/\*\*(.+?)\*\*/', '<b>$1</b>', e($row)) !!}</div>
                        @endif
                    @endforeach
                    @for($pad = count($plan['rows']); $pad < $rowCount; $pad++)
                    <div class="bi-plan-row is-empty"></div>
                    @endfor
                    <div class="bi-plan-row is-btn">
                        <a href="{{border($page['title'], $plan['name'], $plan['price'] ?? null)}}" class="bi-plan-order">Order Now</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @break

    @case('logo_grid')
    <section class="bi-c-section">
        <div class="bi-c-wrap">
            <div class="bi-logo-tiles">
                @foreach(config('baseit.clients') as $client)
                @if(!empty($client[2]))
                <div class="bi-logo-tile" title="{{$client[0]}} - {{$client[1]}}">
                    <img src="{{bimg($client[2])}}" alt="{{$client[0]}}" loading="lazy">
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
    @break

    @case('client_az')
    @php($az = bclientGroups())
    @php($azGroups = $az['groups'])
    @php($azLetters = $az['letters'])
    @php($azFirst = $az['first'])
    <section class="bi-c-section">
        <div class="bi-c-wrap bi-az" data-az>
            <div class="bi-az-letters">
                @foreach($azLetters as $letter)
                <button type="button" class="bi-az-letter {{$letter === $azFirst ? 'is-active' : ''}} {{empty($azGroups[$letter]) ? 'is-empty' : ''}}" data-letter="{{$letter}}" @if(empty($azGroups[$letter])) disabled @endif>{{$letter}}</button>
                @endforeach
            </div>
            @foreach($azLetters as $letter)
            @if(!empty($azGroups[$letter]))
            @php($half = (int) ceil(count($azGroups[$letter]) / 2))
            <div class="bi-az-group {{$letter === $azFirst ? 'is-active' : ''}}" data-group="{{$letter}}">
                <div class="bi-az-hex"><span>{{$letter}}</span></div>
                <div class="bi-az-cols">
                    <ul>@foreach(array_slice($azGroups[$letter], 0, $half) as $name)<li>{{$name}}</li>@endforeach</ul>
                    <span class="bi-az-line" aria-hidden="true"></span>
                    <ul>@foreach(array_slice($azGroups[$letter], $half) as $name)<li>{{$name}}</li>@endforeach</ul>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </section>
    @break

    @case('courses')
    <section class="bi-c-section">
        <div class="bi-c-wrap bi-courses">
            @foreach($block['items'] as $course)
            <div class="bi-course">
                <span class="bi-course-tag"><small>FULL COURSE</small><b>{{$course['price']}}</b></span>
                <h3>{{$course['title']}}</h3>
                <ul>
                    @foreach($course['lines'] as $i=>$line)
                    <li>@if($i==0)<i class="{{$course['icon']}}"></i>@elseif($i==1)<i class="far fa-calendar-alt"></i>@else<i class="far fa-clock"></i>@endif {{$line}}</li>
                    @endforeach
                </ul>
                <a href="{{bpage($course['slug'])}}" class="bi-course-btn"><i class="fas fa-circle"></i> VIEW DETAILS</a>
            </div>
            @endforeach
        </div>
    </section>
    @break

    @case('service_list')
    <section class="bi-c-section">
        <div class="bi-c-wrap bi-svc-list">
            @foreach($block['items'] as $item)
            <div class="bi-svc-item">
                <h3><i class="{{$item['icon']}}"></i> {{$item['title']}}</h3>
                <p>{{$item['text']}}</p>
                <a href="{{bpage($item['slug'])}}" class="bi-svc-btn">READ MORE</a>
            </div>
            @endforeach
        </div>
    </section>
    @break

    @case('pricebar')
    <section class="bi-c-section">
        <div class="bi-c-wrap">
            <div class="bi-pricebar">
                <div class="bi-pricebar-box">
                    <b>{{$block['name']}}</b>
                    @if(!empty($block['price']))<span>Price {{$block['price']}}</span>@endif
                </div>
                <a href="{{border($page['title'] !== $block['name'] ? $page['title'] : $block['name'], $page['title'] !== $block['name'] ? $block['name'] : null, $block['price'] ?? null)}}" class="bi-pricebar-order">{{$block['button'] ?? 'ORDER NOW'}}</a>
            </div>
        </div>
    </section>
    @break

    @case('para')
    <section class="bi-c-section">
        <div class="bi-c-wrap bi-c-para">
            @if(!empty($block['title']))<h4 class="bi-c-label is-lg">{{$block['title']}}</h4>@endif
            @foreach($block['body'] as $paragraph)<p>{{$paragraph}}</p>@endforeach
        </div>
    </section>
    @break

    @case('image')
    @if(file_exists(public_path($block['img'])))
    <section class="bi-c-section">
        <div class="bi-c-wrap">
            <img src="{{asset($block['img'])}}" alt="{{$block['alt'] ?? $page['title']}}" class="bi-c-image" loading="lazy">
        </div>
    </section>
    @endif
    @break

    @case('figure')
    <section class="bi-c-section">
        <div class="bi-c-wrap">
            @if(!empty($block['img']) && file_exists(public_path($block['img'])))
            <img src="{{asset($block['img'])}}" alt="{{$block['alt'] ?? $page['title']}}" class="bi-c-figure" loading="lazy" @if(!empty($block['width'])) style="max-width: {{(int) $block['width']}}px" @endif>
            @elseif(($block['art'] ?? '')==='inventory')
            <div class="bi-flow" aria-hidden="true">
                <div class="bi-flow-node is-supplier"><i class="fas fa-truck-fast"></i><span>Supplier</span></div>
                <i class="fas fa-arrow-right bi-flow-arrow"></i>
                <div class="bi-flow-node is-central"><i class="fas fa-warehouse"></i><span>Head Office / Central Store</span></div>
                <i class="fas fa-arrow-right bi-flow-arrow"></i>
                <div class="bi-flow-stack">
                    <div class="bi-flow-node is-branch"><i class="fas fa-store"></i><span>Branch / Shop</span></div>
                    <div class="bi-flow-node is-branch"><i class="fas fa-store"></i><span>Branch / Shop</span></div>
                </div>
                <i class="fas fa-arrow-right bi-flow-arrow"></i>
                <div class="bi-flow-node is-customer"><i class="fas fa-users"></i><span>Customers</span></div>
                <div class="bi-flow-base"><i class="fas fa-chart-line"></i> Stock &amp; Sales Reports</div>
            </div>
            @endif
        </div>
    </section>
    @break

    @case('syllabus')
    <section class="bi-c-section">
        <div class="bi-c-wrap">
            <div class="bi-syl">
                <div class="bi-syl-title"><i class="far fa-folder-open"></i> {{$block['title']}}</div>
                <ul class="bi-syl-modules">
                    @foreach($block['modules'] as $module)
                    <li>
                        <div class="bi-syl-module"><i class="bi-check"></i> {{$module['title']}}@if(!empty($module['note'])) <small>{{$module['note']}}</small>@endif</div>
                        @if(!empty($module['items']))
                        <ul class="bi-syl-items">
                            @foreach($module['items'] as $item)
                            @if($item === '')<li class="is-gap"></li>@else<li>{{$item}}</li>@endif
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    @break

    @case('checklists')
    <section class="bi-c-section">
        <div class="bi-c-wrap {{!empty($block['aside_img']) ? 'bi-check-aside' : ''}}">
        <div class="bi-checklists {{($block['style'] ?? '')==='numbered' ? 'is-numbered' : ''}}">
            @foreach($block['sections'] as $sec)
            <h4>{{$sec['title']}}</h4>
            @if(!empty($sec['text']))
            <p class="bi-checklists-text">{{$sec['text']}}</p>
            @continue
            @endif
            @if(($block['style'] ?? '')==='numbered')
            <ol>@foreach($sec['items'] as $item)<li>{{is_array($item) ? $item['text'] : $item}}</li>@endforeach</ol>
            @continue
            @endif
            <ul>
                @foreach($sec['items'] as $item)
                @if(is_array($item))
                <li class="has-children">
                    <span>{{$item['text']}}</span>
                    <ul>@foreach($item['children'] as $child)<li>{{$child}}</li>@endforeach</ul>
                </li>
                @else
                <li>{{$item}}</li>
                @endif
                @endforeach
            </ul>
            @endforeach
        </div>
        @if(!empty($block['aside_img']) && file_exists(public_path($block['aside_img'])))
        <div class="bi-check-aside-img"><img src="{{asset($block['aside_img'])}}" alt="{{$page['title']}}" loading="lazy"></div>
        @endif
        </div>
    </section>
    @break

    @case('doc')
    {{-- mixed text: p / ul / ol (items may have children) / label --}}
    <section class="bi-c-section">
        <div class="bi-c-wrap {{!empty($block['aside_img']) ? 'bi-check-aside is-doc' : ''}}">
        <div class="bi-doc">
            @foreach($block['parts'] as $part)
                @if(isset($part['h']))
                <h4 class="bi-doc-h">{{$part['h']}}</h4>
                @elseif(isset($part['b']))
                <p class="bi-doc-b">{{$part['b']}}</p>
                @elseif(isset($part['orange']))
                <p class="bi-doc-orange">{{$part['orange']}}</p>
                @elseif(isset($part['quote']))
                <p class="bi-doc-quote">{{$part['quote']}}</p>
                @elseif(isset($part['lead']))
                <p class="bi-doc-lead">{{$part['lead']}}</p>
                @elseif(isset($part['hr']))
                <hr class="bi-doc-hr">
                @elseif(isset($part['plain']))
                <div class="bi-doc-plain">@foreach($part['plain'] as $line)<div>{{$line}}</div>@endforeach</div>
                @elseif(isset($part['lines']))
                <div class="bi-doc-lines">@foreach($part['lines'] as $line)<div><i class="bi-check"></i> {{$line}}</div>@endforeach</div>
                @elseif(isset($part['ola']))
                <ol class="bi-doc-alpha">
                    @foreach($part['ola'] as $item)
                    @if(is_array($item))
                    <li>{{$item['text']}}<ol class="bi-doc-roman">@foreach($item['children'] as $child)<li>{{$child}}</li>@endforeach</ol></li>
                    @else
                    <li>{{$item}}</li>
                    @endif
                    @endforeach
                </ol>
                @elseif(isset($part['p']))
                <p>{{$part['p']}}</p>
                @elseif(isset($part['label']))
                <p class="bi-doc-label">{{$part['label']}}</p>
                @elseif(isset($part['ul']) || isset($part['ol']))
                @php($tag = isset($part['ul']) ? 'ul' : 'ol')
                <{{$tag}}>
                    @foreach($part[$tag] as $item)
                    @if(is_array($item))
                    <li>{{$item['text']}}<ol>@foreach($item['children'] as $child)<li>{{$child}}</li>@endforeach</ol></li>
                    @else
                    <li>{!! preg_replace('/\*\*(.+?)\*\*/', '<b>$1</b>', e($item)) !!}</li>
                    @endif
                    @endforeach
                </{{$tag}}>
                @endif
            @endforeach
        </div>
        @if(!empty($block['aside_img']) && file_exists(public_path($block['aside_img'])))
        <div class="bi-check-aside-img"><img src="{{asset($block['aside_img'])}}" alt="{{$page['title']}}" loading="lazy"></div>
        @endif
        </div>
    </section>
    @break

    @case('toggle')
    <section class="bi-c-section">
        <div class="bi-c-wrap">
            <div class="bi-toggle {{!empty($block['open']) ? 'is-open' : ''}}">
                <button type="button" class="bi-toggle-head"><i class="far {{!empty($block['open']) ? 'fa-square-minus' : 'fa-square-plus'}}"></i> {{$block['title']}}</button>
                <div class="bi-toggle-body">
                    @foreach($block['blocks'] as $child)
                        @include('welcome.baseit.partials.block', ['block' => $child])
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @break

    @case('about_stats')
    <section class="bi-c-section">
        <div class="bi-c-wrap">
            <div class="bi-ab-stats">
                @foreach($block['items'] as $item)
                <div class="bi-ab-stat">
                    <i class="{{$item['icon']}}"></i>
                    <span class="stat-number" data-target="{{$item['value']}}">{{number_format($item['value'])}}</span>
                    <h4>{{$item['label']}}</h4>
                    <p>{{$item['text']}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @break

    @case('about_what')
    <section class="bi-c-section">
        <div class="bi-c-wrap bi-ab-what">
            <div>
                <h3 class="bi-ab-title">{{$block['title']}} <span>{{$block['highlight']}}</span></h3>
                <span class="bi-ab-line"></span>
                <p>{{$block['body']}}</p>
            </div>
            <div class="bi-metrix-content bi-ab-bars">
                @foreach($block['skills'] as $skill)
                <div class="bi-bar">
                    <span class="bi-bar-label">{{$skill['label']}}</span>
                    <div class="bi-bar-track">
                        <div class="bi-bar-fill {{$skill['class']}}" data-width="{{$skill['value']}}%"><span class="bi-bar-tip">{{$skill['value']}}%</span></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @break

    @case('team')
    <section class="bi-c-section">
        <div class="bi-c-wrap bi-team">
            @foreach($block['members'] as $member)
            <div class="bi-member">
                <div class="bi-member-photo"><img src="{{asset($member['img'])}}" alt="{{$member['name']}}" loading="lazy"></div>
                <h4>{{$member['name']}}</h4>
                <span class="bi-member-role">{{$member['role']}}</span>
                <div class="bi-member-social">
                    <a href="{{config('baseit.company.facebook')}}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Google Plus"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @break

    @case('about_tabs')
    <section class="bi-c-section bi-ab-tabs" data-tabs>
        <div class="bi-ab-tabbar">
            @foreach($block['tabs'] as $i=>$tab)
            <button type="button" class="bi-ab-tab {{$i==0 ? 'is-active' : ''}}" data-tab="{{$i}}"><i class="{{$tab['icon']}}"></i><span>{{$tab['label']}}</span></button>
            @endforeach
        </div>
        @foreach($block['tabs'] as $i=>$tab)
        <div class="bi-ab-panel {{$i==0 ? 'is-active' : ''}}" data-panel="{{$i}}" style="background-image:url('{{asset($tab['bg'])}}')">
            <div class="bi-c-wrap bi-ab-panel-inner">
                <div class="bi-ab-panel-img"><img src="{{asset($tab['img'])}}" alt="{{$tab['label']}}" loading="lazy"></div>
                <p>{{$tab['text']}}</p>
            </div>
        </div>
        @endforeach
    </section>
    @break

    @case('about_why')
    <section class="bi-c-section">
        <div class="bi-c-wrap bi-ab-why">
            <div>
                <h3 class="bi-ab-title">{{$block['title']}} <span>{{$block['highlight']}}</span></h3>
                <span class="bi-ab-line"></span>
                @foreach($block['body'] as $paragraph)<p>{{$paragraph}}</p>@endforeach
            </div>
            <div>
                <h3 class="bi-ab-title is-plain">{{$block['services_title']}}</h3>
                <div class="bi-acc">
                    @foreach($block['services'] as $i=>$service)
                    <div class="bi-acc-item {{$i==0 ? 'is-open' : ''}}">
                        <button type="button" class="bi-acc-head"><i class="fas {{$i==0 ? 'fa-minus' : 'fa-plus'}}"></i> {{$service['title']}}</button>
                        <div class="bi-acc-body">
                            <p>{{$service['text']}} <a href="{{bpage($service['slug'])}}">Read more</a></p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @break

    @case('policy')
    <section class="bi-c-section">
        <div class="bi-c-wrap">
            <h2 class="bi-c-policy-title">{{$block['title']}}</h2>
            @foreach($block['sections'] as $sec)
            <div class="bi-c-policy">
                <h4>{{$sec['title']}}</h4>
                @foreach($sec['body'] as $paragraph)<p>{{$paragraph}}</p>@endforeach
                @if(!empty($sec['list']))
                <ul class="bi-c-bullets">@foreach($sec['list'] as $li)<li>{{$li}}</li>@endforeach</ul>
                @endif
            </div>
            @endforeach
        </div>
    </section>
    @break

    @case('bullets')
    <section class="bi-c-section">
        <div class="bi-c-wrap">
            <h4 class="bi-c-label {{($block['size'] ?? '')==='lg' ? 'is-lg' : ''}}">{{$block['title']}}</h4>
            <ul class="bi-c-bullets">
                @foreach($block['items'] as $li)<li>{{$li}}</li>@endforeach
            </ul>
        </div>
    </section>
    @break

    @case('text')
    <section class="bi-section">
        <div class="container bi-narrow">
            @if(!empty($block['title']))<h2 class="bi-title">{{$block['title']}}</h2>@endif
            @if(!empty($block['lead']))<p class="bi-lead">{{$block['lead']}}</p>@endif
            @foreach($block['body'] as $paragraph)
            <p>{{$paragraph}}</p>
            @endforeach
        </div>
    </section>
    @break

    @case('quote')
    <section class="bi-section">
        <div class="container bi-narrow">
            <blockquote class="bi-quote"><i class="fas fa-quote-left"></i> {{$block['text']}}</blockquote>
        </div>
    </section>
    @break

    @case('price')
    <section class="bi-section">
        <div class="container">
            <div class="bi-price-box">
                <div>
                    <span class="bi-price-label">Price</span>
                    <div class="bi-price">{{$block['tk']}} @if(!empty($block['usd']))<small>/ {{$block['usd']}}</small>@endif</div>
                </div>
                <a href="{{border($page['title'], null, trim($block['tk'].(!empty($block['usd']) ? ' / '.$block['usd'] : '')))}}" class="bi-btn">Order Now</a>
            </div>
        </div>
    </section>
    @break

    @case('packages')
    <section class="bi-section bi-soft">
        <div class="container">
            <h2 class="bi-title text-center">{{$block['title'] ?? 'Our Packages'}}</h2>
            @if(!empty($block['note']))<p class="text-center bi-muted">{{$block['note']}}</p>@endif
            <div class="bi-packages">
                @foreach($block['items'] as $package)
                <div class="bi-package {{!empty($package['badge']) ? 'is-featured' : ''}}">
                    @if(!empty($package['badge']))<span class="bi-badge">{{$package['badge']}}</span>@endif
                    <h3>{{$package['name']}}</h3>
                    <div class="bi-package-price">{{$package['tk']}}</div>
                    @if(!empty($package['usd']))<div class="bi-package-usd">{{$package['usd']}}</div>@endif
                    @if(!empty($package['items']))
                    <ul>
                        @foreach($package['items'] as $line)
                        <li><i class="bi-check"></i> {{$line}}</li>
                        @endforeach
                    </ul>
                    @endif
                    <a href="{{border($page['title'], $package['name'], trim($package['tk'].(!empty($package['usd']) ? ' / '.$package['usd'] : '')))}}" class="bi-btn">Order Now</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @break

    @case('table')
    @if(($block['style'] ?? '')==='classic')
    <section class="bi-c-section">
        <div class="bi-c-wrap">
            @if(!empty($block['label']))<h4 class="bi-c-label">{{$block['label']}}</h4>@endif
            <div class="table-responsive">
                <table class="bi-c-table">
                    <thead><tr>@foreach($block['head'] as $th)<th>{{$th}}</th>@endforeach</tr></thead>
                    <tbody>
                        @foreach($block['rows'] as $row)
                        <tr>
                            @foreach($row as $td)<td>{{$td}}</td>@endforeach
                            @if(!empty($block['order']))
                            <td><a href="{{border($page['title'], $row[0], $row[1] ?? null)}}" class="bi-c-order">{{$block['order']}}</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @break
    @endif
    <section class="bi-section">
        <div class="container">
            @if(!empty($block['title']))<h2 class="bi-title">{{$block['title']}}</h2>@endif
            <div class="table-responsive">
                <table class="table bi-table">
                    <thead><tr>@foreach($block['head'] as $th)<th>{{$th}}</th>@endforeach</tr></thead>
                    <tbody>
                        @foreach($block['rows'] as $row)
                        <tr>@foreach($row as $td)<td>{{$td}}</td>@endforeach</tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @break

    @case('lists')
    <section class="bi-section">
        <div class="container">
            @if(!empty($block['title']))<h2 class="bi-title">{{$block['title']}}</h2>@endif
            <div class="bi-lists">
                @foreach($block['lists'] as $list)
                <div class="bi-list {{count($list['items']) > 12 ? 'is-wide' : ''}}">
                    <h3>{{$list['title']}}</h3>
                    @if(!empty($list['ordered']))
                    <ol>@foreach($list['items'] as $li)<li>{{$li}}</li>@endforeach</ol>
                    @else
                    <ul>@foreach($list['items'] as $li)<li><i class="bi-check"></i> {{$li}}</li>@endforeach</ul>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @break

    @case('terms')
    <section class="bi-section">
        <div class="container">
            <div class="bi-terms">
                <h3>{{$block['title'] ?? 'Terms & Conditions'}}</h3>
                <ul>@foreach($block['items'] as $li)<li>{{$li}}</li>@endforeach</ul>
            </div>
        </div>
    </section>
    @break

    @case('cards')
    <section class="bi-section">
        <div class="container">
            @if(!empty($block['title']))<h2 class="bi-title text-center">{{$block['title']}}</h2>@endif
            <div class="bi-cards">
                @foreach($block['items'] as $card)
                <a href="{{bpage($card['slug'])}}" class="bi-card">
                    <i class="{{$card['icon']}}"></i>
                    <h3>{{$card['title']}}</h3>
                    <p>{{$card['text']}}</p>
                    <span>Read More <i class="fas fa-arrow-right"></i></span>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @break

    @case('menu_cards')
    @php($menuItem = collect(config('baseit.menu'))->firstWhere('slug', $block['menu']))
    <section class="bi-section">
        <div class="container">
            <div class="bi-cards">
                @foreach($menuItem['children'] as $child)
                @php($childPage = config('baseit.pages.'.$child['slug']))
                <a href="{{bpage($child['slug'])}}" class="bi-card">
                    <img src="{{bicon($child['img'] ?? null)}}" alt="{{$child['label']}}" loading="lazy">
                    <h3>{{$child['label']}}</h3>
                    @if($childPage)<p>{{$childPage['subtitle'] ?? ''}}</p>@endif
                    @if($childPage && ($price = collect($childPage['blocks'])->firstWhere('type','price')))
                    <p class="bi-card-price">{{$price['tk']}}</p>
                    @endif
                    <span>Read More <i class="fas fa-arrow-right"></i></span>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @break

    @case('cta')
    <section class="bi-section">
        <div class="container">
            <div class="bi-cta">
                <p>{{$block['text']}}</p>
                <a href="{{bpage('contact-us')}}?subject={{urlencode($page['title'])}}" class="bi-btn">Contact Us</a>
            </div>
        </div>
    </section>
    @break

    @case('domain')
    @include('welcome.baseit.partials.domain', ['style' => $block['style'] ?? null])
    @break

    @case('stats')
    @include('welcome.baseit.partials.stats')
    @break

    @case('skills')
    <section class="bi-section">
        <div class="container bi-narrow">
            @include('welcome.baseit.partials.skills', ['items' => $block['items'], 'title' => $block['title'] ?? null])
        </div>
    </section>
    @break

    @case('tabs')
    <section class="bi-section">
        <div class="container">
            <div class="bi-tabs">
                @foreach($block['items'] as $tab)
                <div class="bi-tab">
                    <h3>{{$tab['title']}}</h3>
                    <p>{{$tab['text']}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @break

    @case('logos')
    @include('welcome.baseit.partials.logos')
    @break

    @case('clients')
    <section class="bi-section">
        <div class="container">
            <div class="bi-client-grid">
                @foreach(config('baseit.clients') as [$name, $about])
                <div class="bi-client">
                    <span class="bi-client-initial">{{mb_substr($name,0,1)}}</span>
                    <h3>{{$name}}</h3>
                    <p>{{$about}}</p>
                </div>
                @endforeach
            </div>
            <h2 class="bi-title mt-5">Client Directory</h2>
            <ul class="bi-directory">
                @foreach(collect(config('baseit.client_directory'))->sort() as $client)
                <li><i class="fas fa-building"></i> {{$client}}</li>
                @endforeach
            </ul>
        </div>
    </section>
    @break

    @case('payment')
    @php($bank = config('baseit.bank'))
    @php($bkashNo = preg_replace('/[^0-9]/', '', $bank['bkash'][0]))
    <section class="bi-pm">
        <div class="bi-c-heading">
            <h3>Payment Method</h3>
            <h2><span>Secure transaction</span> in all Payment</h2>
            <div class="bi-c-line"><i></i></div>
        </div>

        <div class="bi-pm-logo bi-pm-ebl"><img src="{{asset('welcome/baseit/eastern-bank-logo.jpg')}}" alt="{{$bank['bank']}}" width="216" height="40"></div>
        <div class="bi-pm-box">
            <h4>Payment Method:</h4>
            <ul class="bi-pm-list">
                <li><b>Bank Name:</b> {{$bank['bank']}}</li>
                <li><b>Account Name:</b> {{$bank['name']}}</li>
                <li><b>Account Number:</b>{{$bank['number']}}</li>
                <li><b>Address:</b>{{$bank['branch']}}</li>
            </ul>
        </div>

        <div class="bi-pm-logo bi-pm-bkash">
            <img src="{{asset('welcome/baseit/bkash-logo.jpg')}}" alt="bKash" width="86" height="42">
            <span>bKash payment(Personal Account)</span>
        </div>
        <div class="bi-pm-box">
            <h4>Payment Method:</h4>
            <ul class="bi-pm-list">
                <li>Dial *247#</li>
                <li>Choose Send Money</li>
                <li>Enter Number: {{$bkashNo}}. Enter the amount you want to send.</li>
                <li>Enter a reference about the transaction.</li>
                <li>Now enter your bKash Mobile PIN</li>
            </ul>
        </div>
    </section>
    @break

    @case('career')
    <section class="bi-job-sec">
        <div class="bi-job-cols">
            <div class="bi-job-left">
                <h2 class="bi-job-head"><span>Job</span> Opportunities</h2>
                <div class="bi-job-acc">
                    @foreach(config('baseit.jobs') as $job)
                    <details class="bi-job-item" name="bi-jobs" {{$loop->first ? 'open' : ''}}>
                        <summary><i class="fas fa-download"></i> <span>{{$job['title']}}</span><b></b></summary>
                        <div class="bi-job-body">
                            @foreach((array) $job['text'] as $para)
                            <p>{{$para}}</p>
                            @endforeach
                        </div>
                    </details>
                    @endforeach
                </div>
            </div>
            <div class="bi-job-right">
                <h2 class="bi-job-head"><span>Apply For</span> a Job</h2>
                @if(Session::has('success'))
                <div class="alert alert-success py-2 small">{{Session::get('success')}}</div>
                @endif
                <form action="{{route('careerApply')}}" method="post" enctype="multipart/form-data" class="bi-job-form">
                    @csrf
                    <label for="job-name">Full name <span>*</span></label>
                    <input type="text" id="job-name" name="name" value="{{old('name')}}" maxlength="100" required>
                    @error('name')<small class="text-danger">{{$message}}</small>@enderror

                    <label for="job-email">Email <span>*</span></label>
                    <input type="email" id="job-email" name="email" value="{{old('email')}}" maxlength="100" required>
                    @error('email')<small class="text-danger">{{$message}}</small>@enderror

                    <label for="job-position">Position</label>
                    <select id="job-position" name="position" class="is-wide" required>
                        @foreach(config('baseit.jobs') as $job)
                        <option value="{{$job['title']}}" {{old('position', request('position'))==$job['title']?'selected':''}}>{{$job['title']}}</option>
                        @endforeach
                    </select>
                    @error('position')<small class="text-danger">{{$message}}</small>@enderror

                    <label for="job-message">Message <span>*</span></label>
                    <textarea id="job-message" name="message" rows="4" class="is-wide" maxlength="2000" required>{{old('message')}}</textarea>
                    @error('message')<small class="text-danger">{{$message}}</small>@enderror

                    <label for="job-cv">For more details upload your CV</label>
                    <div class="bi-job-file"><input type="file" id="job-cv" name="cv" accept=".pdf,.doc,.docx" required></div>
                    @error('cv')<small class="text-danger">{{$message}}</small>@enderror

                    <button type="submit" class="bi-job-send">Send</button>
                </form>
            </div>
        </div>
    </section>
    <script>
    // one job open at a time (for browsers without <details name> support)
    document.querySelectorAll('.bi-job-item').forEach(function (d) {
        d.addEventListener('toggle', function () {
            if (d.open) document.querySelectorAll('.bi-job-item').forEach(function (o) { if (o !== d) o.open = false; });
        });
    });
    </script>
    @break

    @case('contact')
    {{-- Map (full width) --}}
    <div class="bi-ct-map">
        <iframe src="{{$company['map']}}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="BASE IT location"></iframe>
    </div>

    {{-- Address / Phone / E-mail cards on dark background --}}
    <section class="bi-ct-info">
        <div class="bi-ct-cards">
            <div class="bi-ct-card">
                <div class="bi-ct-icon">
                    <svg viewBox="0 0 64 64" aria-hidden="true">
                        <path d="M38 6v8" stroke="#9b4fc4" stroke-width="2.5" stroke-linecap="round"/>
                        <rect x="21" y="14" width="22" height="46" rx="2" fill="#f1e2fb" stroke="#9b4fc4" stroke-width="2.5"/>
                        <path d="M26 21h5M33 21h5M26 28h5M33 28h5M26 35h5M33 35h5M26 42h5M33 42h5M26 49h5M33 49h5" stroke="#9b4fc4" stroke-width="2.5" stroke-linecap="round"/>
                        <rect x="5" y="34" width="14" height="26" rx="2" fill="#fff6d6" stroke="#e7b400" stroke-width="2.5"/>
                        <path d="M9 40v14M15 40v14" stroke="#e7b400" stroke-width="2.5" stroke-linecap="round"/>
                        <rect x="45" y="26" width="14" height="34" rx="2" fill="#dff5e8" stroke="#27a35f" stroke-width="2.5"/>
                        <path d="M49 32h6M49 38h6M49 44h6M49 50h6" stroke="#27a35f" stroke-width="2.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3>Address</h3>
                <p>{{rtrim($company['address'], '.')}}</p>
            </div>
            <div class="bi-ct-card">
                <div class="bi-ct-icon">
                    <svg viewBox="0 0 64 64" aria-hidden="true">
                        <path d="M14 8c3-2 6-1 8 2l5 8c1.5 2.5 1 5-1 6.8l-3.5 3c2.5 5.5 6.5 9.8 12 12.6l3.2-3.4c1.9-2 4.6-2.3 6.9-.8l7.8 5.2c2.7 1.8 3.4 5 1.6 7.7l-3 4.4c-2.4 3.4-6.6 4.8-10.5 3.4C24.5 51.6 12.6 39.6 7.3 23.4 6 19.4 7.4 15.2 10.7 12.6z" fill="#9b5bd4" stroke="#4a2a6b" stroke-width="2"/>
                        <path d="M36 14a14 14 0 0 1 14 14M36 7a21 21 0 0 1 21 21M36 21a7 7 0 0 1 7 7" fill="none" stroke="#4a2a6b" stroke-width="2.6" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3>Phone</h3>
                @foreach($company['phones'] as $label=>$phone)
                <p>{{$label}}: <a href="tel:{{preg_replace('/[^0-9+]/','',$phone)}}">{{$phone}}</a></p>
                @endforeach
            </div>
            <div class="bi-ct-card">
                <div class="bi-ct-icon">
                    <svg viewBox="0 0 64 64" aria-hidden="true">
                        <rect x="4" y="14" width="56" height="38" rx="2" fill="#fff" stroke="#3a3a3a" stroke-width="2.5"/>
                        <path d="M4 14h56L32 36z" fill="#f2316f" stroke="#3a3a3a" stroke-width="2.5" stroke-linejoin="round"/>
                        <path d="M4 52l20-17M60 52L40 35" stroke="#3a3a3a" stroke-width="2.5"/>
                        <path d="M44 42h10M44 46h10" stroke="#3a3a3a" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3>E-mail</h3>
                @foreach($company['emails'] as $email)
                <p><a href="mailto:{{$email}}">{{$email}}</a></p>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Form + query text --}}
    {{-- Filled when the visitor clicked an "Order Now" button (see border() / border_info() helpers) --}}
    @php($ord = border_info())
    @php($ordService = $ord['service'])
    @php($ordPackage = $ord['package'])
    @php($ordPrice = $ord['price'])
    @php($ordSubject = $ord['subject'])
    @php($ordMessage = $ord['message'])
    <section class="bi-ct-bottom">
        <div class="bi-ct-cols">
            <div class="bi-ct-col" id="order">
                <div class="bi-c-heading">
                    <h3>{{$ordService !== '' ? 'Complete your order' : 'If you need instant support'}}</h3>
                    <h2>{{$ordService !== '' ? 'ORDER FORM' : 'CONTACT FORM'}}</h2>
                    <div class="bi-c-line"><i></i></div>
                </div>
                @if(Session::has('success'))
                <div class="alert alert-success mt-3 mb-0">{{Session::get('success')}}</div>
                @endif
                @if($ordService !== '')
                <div class="bi-ct-order">
                    <div class="bi-ct-order-head">
                        <span><i class="fas fa-shopping-bag"></i> Your Order</span>
                        <a href="{{bpage('contact-us')}}" title="Remove this order">&times;</a>
                    </div>
                    <dl>
                        <dt>Service</dt><dd>{{$ordService}}</dd>
                        @if($ordPackage !== '')<dt>Package</dt><dd>{{$ordPackage}}</dd>@endif
                        @if($ordPrice !== '')<dt>Price</dt><dd class="is-price">{{$ordPrice}}</dd>@endif
                    </dl>
                    <p>Fill in your name &amp; email below and send. We will contact you to confirm the order.</p>
                </div>
                @endif
                <form action="{{route('contactMail')}}" method="post" class="bi-ct-form">
                    @csrf
                    @if($ordService !== '')
                    <input type="hidden" name="order" value="{{$ordService}}">
                    <input type="hidden" name="package" value="{{$ordPackage}}">
                    <input type="hidden" name="price" value="{{$ordPrice}}">
                    @endif
                    <label for="ct-name">Your Name <span>*</span></label>
                    <input type="text" id="ct-name" name="name" value="{{old('name')}}" maxlength="100" required>
                    @error('name')<small class="text-danger">{{$message}}</small>@enderror

                    <label for="ct-email">Your Email <span>*</span></label>
                    <input type="email" id="ct-email" name="email" value="{{old('email')}}" maxlength="100" required>
                    @error('email')<small class="text-danger">{{$message}}</small>@enderror

                    <label for="ct-subject">Subject</label>
                    <input type="text" id="ct-subject" name="subject" value="{{old('subject', \Illuminate\Support\Str::limit((string) $ordSubject, 97))}}" maxlength="100" required>
                    @error('subject')<small class="text-danger">{{$message}}</small>@enderror

                    <label for="ct-message">Your Message</label>
                    <textarea id="ct-message" name="message" rows="4" maxlength="500">{{old('message', $ordMessage)}}</textarea>
                    @error('message')<small class="text-danger">{{$message}}</small>@enderror

                    <div class="bi-ct-submit"><button type="submit">{{$ordService !== '' ? 'Send Order' : 'Send Message'}}</button></div>
                </form>
            </div>
            <div class="bi-ct-col">
                <div class="bi-c-heading">
                    <h3>If you have any query</h3>
                    <h2>CONTACT US</h2>
                    <div class="bi-c-line"><i></i></div>
                </div>
                <p class="bi-ct-text">We are always ready to serve you. If you have any support or query, just through us a email, phone or message. We promise you to response you within 15 min. Our agent is always online on chat. You may also chat with us for instant support. Thanks</p>
                <img src="{{asset('welcome/baseit/contact-us.jpg')}}" alt="Contact BASE IT" class="bi-ct-img" loading="lazy">
            </div>
        </div>
    </section>
    @break

@endswitch
