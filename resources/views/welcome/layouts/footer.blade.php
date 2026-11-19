@php($company = config('baseit.company'))
@php($bank = config('baseit.bank'))
<!-- Footer (same as original) -->
<footer class="bi-footer" id="footer" @if(file_exists(public_path('welcome/baseit/footer-bg.jpg'))) style="background-image:url('{{asset('welcome/baseit/footer-bg.jpg')}}')" @endif>
    <div class="bi-footer-main">
        <div class="bi-footer-grid">
            <div class="bi-footer-col">
                <h4>CORPORATE OFFICE</h4>
                <ul class="bi-footer-contact">
                    <li><i class="fas fa-map-marker-alt"></i> <b>Address:</b> {!! str_replace(', Dhaka', ',<br>Dhaka', e($company['address'])) !!}</li>
                    <li><i class="fas fa-envelope"></i> <a href="mailto:{{$company['email']}}">{{$company['email']}}</a></li>
                    <li class="is-small"><i class="fas fa-phone-alt"></i><b>Phone:</b> {{$company['phone']}}</li>
                    <li class="is-small"><i class="fas fa-phone-alt"></i><b>Cell:</b> {{$company['cell']}}</li>
                    <li><i class="fas fa-globe-americas"></i> <b>Website:</b> <a href="{{route('index')}}">{{$company['website']}}</a></li>
                </ul>
                <div class="bi-footer-social">
                    <a href="{{$company['facebook']}}" target="_blank" rel="noopener" aria-label="Twitter"><img src="{{bimg('2016/11/1479991801_twitter.png')}}" alt="Twitter" loading="lazy"></a>
                    <a href="{{$company['facebook']}}" target="_blank" rel="noopener" aria-label="Google Plus"><img src="{{bimg('2016/11/1479991820_googleplus.png')}}" alt="Google Plus" loading="lazy"></a>
                    <a href="#" aria-label="LinkedIn"><img src="{{bimg('2016/11/1479991832_linkedin.png')}}" alt="LinkedIn" loading="lazy"></a>
                    <a href="#" aria-label="YouTube"><img src="{{bimg('2016/11/1479991848_youtube.png')}}" alt="YouTube" loading="lazy"></a>
                </div>
                <a href="{{$company['apk']}}" class="bi-footer-android" aria-label="Download Android App">
                    <img src="{{bimg('2020/02/android.png')}}" alt="Android App" loading="lazy">
                </a>
            </div>

            <div class="bi-footer-col">
                <h4>PAYMENT METHOD</h4>
                <div class="bi-footer-pay">
                    <p><b>Bank PAYMENT</b></p>
                    <p>Bank Name: {{$bank['bank']}}</p>
                    <p>Account Name: {{$bank['name']}}</p>
                    <p>Account Number:{{$bank['number']}}</p>
                    <p>Branch: {!! str_replace(', Dhaka', ',<br>Dhaka', str_replace(', Bangladesh', ',Bangladesh', e($bank['branch']))) !!}</p>
                    <p><b>bKash PAYMENT</b></p>
                    @foreach($bank['bkash'] as $bkash)
                    <p>{{$bkash}}</p>
                    @endforeach
                </div>
            </div>

            <div class="bi-footer-col">
                <h4>GOOGLE MAP</h4>
                <div class="bi-footer-map">
                    <iframe src="{{$company['map']}}" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen title="BASE IT location"></iframe>
                </div>
            </div>

            <div class="bi-footer-col">
                <h4>CONTACT FORM</h4>
                <form class="bi-footer-form" action="{{route('contactMail')}}" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="Your name" maxlength="100" required>
                    <input type="email" name="email" placeholder="Your email" maxlength="100" required>
                    <input type="text" name="subject" placeholder="Your subject" maxlength="100" required>
                    <textarea name="message" placeholder="Your message" maxlength="500" required></textarea>
                    <button type="submit">SEND</button>
                </form>
            </div>
        </div>
    </div>

    <div class="bi-footer-bottom">
        <div class="bi-footer-bottom-inner">
            <p class="bi-footer-copy">&copy; Copyrights <a href="{{route('index')}}">BASE IT</a> 2016. All rights reserved.</p>
            <div class="bi-footer-accept">
                <span>We Accept</span>
                <img src="{{bimg($company['payment_img'])}}" alt="MasterCard, VISA, American Express, DBBL, bKash" loading="lazy">
            </div>
        </div>
    </div>

    <a href="#" class="bi-to-top" aria-label="Back to top"><i class="fas fa-chevron-up"></i></a>
</footer>
