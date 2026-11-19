{{-- Floating "Leave a message" chat box (bottom-right). Sends through the contact mail route (AJAX), see baseit.js --}}
<div class="bi-chat" id="biChat" data-state="closed">
    {{-- 1) Teaser card --}}
    <div class="bi-chat-teaser" role="dialog" aria-label="Chat">
        <div class="bi-chat-teaser-top">
            <span class="bi-chat-avatar" aria-hidden="true">
                <svg viewBox="0 0 48 48"><path d="M24 9c-9.4 0-17 6.1-17 13.7 0 4.3 2.5 8.2 6.4 10.7-.3 2.4-1.5 4.6-3.4 6.1 3.5.1 6.8-1.2 9.2-3.4 1.5.3 3.1.4 4.8.4 9.4 0 17-6.1 17-13.8C41 15.1 33.4 9 24 9z" fill="none" stroke="#fff" stroke-width="3.2" stroke-linejoin="round"/><path d="M17 23.5c2 2.4 4.4 3.6 7 3.6s5-1.2 7-3.6" fill="none" stroke="#fff" stroke-width="3.2" stroke-linecap="round"/></svg>
            </span>
            <p>Chat offline. Leave a message</p>
        </div>
        <div class="bi-chat-teaser-bottom">
            <button type="button" class="bi-chat-pill" data-chat-go="form">Leave a message</button>
        </div>
    </div>

    {{-- 2) Message form --}}
    <div class="bi-chat-panel" role="dialog" aria-label="Leave a message">
        <div class="bi-chat-head">
            <h4>Chat offline. Leave a message</h4>
            <p>We are currently offline. Please leave a message and we'll get back to you shortly.</p>
        </div>
        <form class="bi-chat-form" action="{{route('contactMail')}}" method="post" novalidate>
            @csrf
            <input type="hidden" name="subject" value="Website chat message">
            <input type="hidden" name="source" value="chat">
            <input type="text" name="name" placeholder="Your name *" maxlength="100" autocomplete="name" required>
            <input type="email" name="email" placeholder="Your email *" maxlength="100" autocomplete="email" required>
            <div class="bi-chat-msg">
                <textarea name="message" placeholder="Your message *" maxlength="700" rows="4" required></textarea>
                <span class="bi-chat-count">0 / 700</span>
            </div>
            <p class="bi-chat-error" hidden></p>
            <button type="submit" class="bi-chat-send">Send message</button>
        </form>
        {{-- 3) Sent --}}
        <div class="bi-chat-done" hidden>
            <span class="bi-chat-done-icon" aria-hidden="true">&#10003;</span>
            <h4>Message sent!</h4>
            <p>Thank you. We'll get back to you shortly by email.</p>
            <button type="button" class="bi-chat-pill" data-chat-go="close">Close</button>
        </div>
    </div>

    {{-- Launcher --}}
    <button type="button" class="bi-chat-launcher" aria-label="Open chat" aria-expanded="false">
        <svg class="bi-chat-ico-open" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 4h16a1 1 0 0 1 1 1v11a1 1 0 0 1-1 1H9l-4.2 3.4A.5.5 0 0 1 4 20V5a1 1 0 0 1 1-1z" fill="#fff"/></svg>
        <svg class="bi-chat-ico-close" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18" stroke="#fff" stroke-width="2.4" stroke-linecap="round"/></svg>
    </button>
</div>
