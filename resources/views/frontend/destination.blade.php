@extends('frontend.layout.master')

@section('content')
<section class="video_section mb-md-5 mb-4">
    <!-- navbar -->
    @include('frontend.layout.header')

    <div class="position-absolute top-0 start-0 w-100 h-100">
        <div class="banner-container"
            style="background-image: url({{asset($data->cover_image)}});background-size: cover;background-position: center;">
            <div class="position-absolute top-0 start-0 w-100 h-100 z-1"
                style='background-color: #000000;opacity: 20%'></div>
            <div class="banner-content">
                <h1 class="banner-title">NEPAL</h1>
            </div>
        </div>
    </div>

</section>
@endsection
