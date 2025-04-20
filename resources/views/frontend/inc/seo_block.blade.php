@php
    $agent = new \Jenssegers\Agent\Agent();
    $setting =isset($seo)?(object) $seo : setting();
    $isMobile = $agent->isMobile();

    $title = $isMobile ? ($setting->mobile_meta_title ?? $setting->meta_title) : $setting->meta_title;
    $description = $isMobile ? ($setting->mobile_meta_description ?? $setting->meta_description) : $setting->meta_description;
    $keyword = $isMobile ? ($setting->mobile_meta_keyword ?? $setting->meta_keyword) : $setting->meta_keyword;

    $image = getImageurl($setting->image??setting()->image);
    $fev = getImageurl(setting()->fev);
    $url = Request::url();
    $canonical = $url;
@endphp

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keyword" content="{{ $keyword }}">

{{-- OpenGraph / Facebook --}}
<meta property="fb:app_id" content="160443599540603" />
<meta property="og:url" content="{{ $url }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $title }}" />
<meta property="og:description" content="{{ $description }}" />
<meta property="og:image" content="{{ $image }}" />

{{-- Standard Meta --}}
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- Canonical --}}
@if ($url === 'https://www.nepalvisiontreks.com' || $url === 'https://www.nepalvisiontreks.com/index.php')
    <link rel="canonical" href="https://www.nepalvisiontreks.com" />
@elseif (Str::contains($url, '/package-detail/'))
    <link rel="canonical" href="https://www.nepalvisiontreks.com/package-detail/{{ request()->segment(count(request()->segments())) }}" />
@else
    <link rel="canonical" href="{{ $canonical }}" />
@endif

{{-- Favicon --}}
<link rel="shortcut icon" href="{{ $fev }}" type="image/icon type">
