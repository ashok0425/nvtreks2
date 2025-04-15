@extends('frontend.layout.master')


@section('content')
<section class="video_section mb-md-5 mb-4">
    <!-- navbar -->
    @include('frontend.layout.header')
    @php
    $defaultImage = asset('/frontend/images/thankyouBanner.png'); // fallback image
    $finalImage = $defaultImage;
@endphp
    <div class="position-absolute top-0 start-0 w-100 h-100">
        <div class="banner-container"
            style="background-image: url({{$finalImage}});background-size: cover;background-position: center;">
            <div class="position-absolute top-0 start-0 w-100 h-100 z-1"
                style='background-color: #000000;opacity: 20%'></div>
            <div class="banner-content">
                <h1 class="banner-title">THANK YOU
                </h1>
            </div>
        </div>
    </div>

</section>
<section class="mb-md-5 mb-4">
    <div class="container ">
        <div class="d-flex justify-content-center w-100">
            <div class="" style='max-width: 520px;width: 100%;'>
                <div class="text-center">
                    <i class="bi bi-check-circle-fill checkIcon mb-3"></i>
                    <p class="fs-4 fw-bolder mb-2">We will get back to you as soon as possible</p>

                    <p class="text_lightDark fs-6 font_montserrat mb-2 text-wrap">
                        If you have any queries, feel free to contact us at
                    </p>
                    <p class="text_lightDark fs-6 font_montserrat mb-3 text-wrap">
                        sales@nepalvisiontreks.com / 977-1-4424762 / +977 9802342081
                    </p>

                    <div class="d-flex flex-column flex-md-row justify-content-md-between gap-2">
                        <a href="{{route('home')}}"
                            class="btn btn_darkprimary rounded-0 px-4 py-3 text-decoration-none d-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-arrow-left fs-5 fw-bold"></i> RETURN TO HOME
                        </a>
                        <a href="{{route('destination',['url'=>'nepal'])}}"
                            class="btn btn_darkprimary rounded-0 px-4 py-3 text-decoration-none d-flex align-items-center justify-content-center gap-2">
                            EXPLORE MORE <i class="bi bi-arrow-right fs-5 fw-bold"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.inc.socialmedia')
@include('frontend.inc.contactus')
@endsection
@push('style')

@endpush

@push('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/vue@3.3.4/dist/vue.global.prod.js"></script>



@endpush



