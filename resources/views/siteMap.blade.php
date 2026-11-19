<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    
    <url>
        <loc>{{ route('index') }}</loc>
        <lastmod>{{ Carbon\Carbon::now()->toAtomString() }}</lastmod>
        <priority>1.00</priority>
    </url>
    
    {{-- BASE IT pages (config/baseit.php) --}}
    @php($baseitSlugs = array_keys(config('baseit.pages', [])))
    @foreach ($baseitSlugs as $slug)
        <url>
            <loc>{{ bpage($slug) }}</loc>
            <lastmod>{{ Carbon\Carbon::now()->startOfMonth()->toAtomString() }}</lastmod>
            <priority>0.9</priority>
        </url>
    @endforeach

    {{-- CMS pages that are not already BASE IT pages (and have content) --}}
    @foreach ($pages->reject(fn ($p) => in_array($p->slug, $baseitSlugs, true) || in_array($p->slug, ['home', 'blogs'], true)) as $page)
        <url>
            <loc>{{route('pageView',$page->slug?:'no-title')}}</loc>
            <lastmod>{{ $page->updated_at->toAtomString() }}</lastmod>
            <priority>@if($page->fetured) 0.9 @else 0.8 @endif</priority>
        </url>
    @endforeach
    
    @foreach ($products as $product)
        <url>
            <loc>{{route('productView',$product->slug?:'no-title')}}</loc>
            <lastmod>{{ $product->updated_at->toAtomString() }}</lastmod>
            <priority>@if($product->fetured) 0.5 @else 0.4 @endif</priority>
        </url>
    @endforeach
    
    @foreach ($posts as $post)
        <url>
            <loc>{{route('blogView',$post->slug?:'no-title')}}</loc>
            <lastmod>{{ $post->updated_at->toAtomString() }}</lastmod>
            <priority>@if($post->fetured) 0.7 @else 0.6 @endif</priority>
        </url>
    @endforeach
    
</urlset>