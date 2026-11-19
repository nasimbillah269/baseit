{{-- Right sidebar on software pages: "Our Software Package" --}}
@php($items = config('baseit.software_sidebar'))
<div class="bi-sidebox">
    <h3>Our Software Package</h3>
    <ul>
        @foreach($items as $item)
        @php($current = !empty($item['slug']) && $item['slug'] === ($slug ?? null))
        <li class="{{$current ? 'is-current' : ''}}">
            <a href="{{!empty($item['slug']) ? bpage($item['slug']) : bpage('contact-us').'?subject='.urlencode($item['label'])}}">
                <i class="{{$item['icon']}}"></i> {{$item['label']}}
            </a>
        </li>
        @endforeach
    </ul>
</div>
