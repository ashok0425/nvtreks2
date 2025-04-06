
@php
    $setting = DB::table('websites')->first();
    $agent = new \Jenssegers\Agent\Agent();
@endphp
@if ($agent->isMobile())
    @section('title')
        {{ $setting->mobile_title }}
    @endsection
    @section('descr')
        {{ $setting->mobile_description }}
    @endsection
    @section('keyword')
        {{ $setting->mobile_keyword }}
    @endsection
@else
    @section('title')
        {{ $setting->title }}
    @endsection
    @section('descr')
        {{ $setting->descr }}
    @endsection
    @section('keyword')
        {{ $setting->title }}
    @endsection
@endif
@section('img')
    {{ getImageurl($setting->image) }}
@endsection
@section('url')
    {{ Request::url() }}
@endsection
@section('fev')
    {{ getImageurl($setting->fev) }}
@endsection

<meta property="fb:app_id" content="160443599540603" />
<meta property="og:url" content="{{$url}}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{$title}}" />
<meta property="og:description" content="{{$description}}" />
<meta property="og:image" content="{{$image}}" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('noindex')
<meta name="keyword" content="{{$keyword}}">
<meta name="description" content="{{$description}}">
@if (url()->current() == 'https://www.nepalvisiontreks.com' ||
        url()->current() == 'https://www.nepalvisiontreks.com/index.php')
    <link rel="canonical" href="https://www.nepalvisiontreks.com" />
@elseif(url()->current() == 'https://www.nepalvisiontreks.com/{country?}/package-detail/{url?}')
<link rel="canonical" href="https://www.nepalvisiontreks.com/package-detail/{url?}" />
@else
@endif
<link rel="canonical" href="{{$canonical}}" />

<link rel="shortcut  icon" href="{{$fev}}" type="image/icon type">
<title>{{$title}}</title>
