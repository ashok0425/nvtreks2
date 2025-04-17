<section class="video_section mb-md-5 mb-4">
    <!-- navbar -->
    @include('frontend.layout.header')
    <div class="video_banner_container ">

        @php
            $banner = App\Models\MainSlider::where('link', request()->path())->first();
        @endphp

        <video loop muted autoPlay playsInline poster='./images/herobgvideo.mp4' class="video-banner">
            <source src='{{asset('frontend/images/herobgvideo.mp4')}}' type="video/mp4" />
        </video>
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <div class="banner-container">
                <div class="position-absolute top-0 start-0 w-100 h-100 z-1"
                    style='background-color: #000000;opacity: 20%'></div>
                <div class="banner-content">
                    <p class="home_banner_subtitle mb-0">CELEBRATING 30 PLUS GLORIOUS YEARS OF SERVICE</p>
                    <h1 class="home_banner_title mb-md-4">NEPAL</h1>
                    <div class="home_banner_input">
                        <div class="input-group search_input">
                            <span class="input-group-text bg-white ps-3 pe-0 rounded-start-2 py-md-3"
                                id="basic-addon1">
                                <i class="bi bi-search fs-6 text_darkprimary"></i>

                            </span>
                            <input type="text" class="form-control border border-start-0 ps-2 py-md-3 rounded-end-2"
                                placeholder="Find your trip.." aria-label="search"
                                aria-describedby="basic-addon1" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
