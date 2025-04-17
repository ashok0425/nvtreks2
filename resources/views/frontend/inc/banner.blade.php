<section class="video_section mb-md-5 mb-4">
    <!-- navbar -->
    @include('frontend.layout.header')
    <div class="video_banner_container ">

        @php
            $banner = App\Models\MainSlider::where('status',1)->where('link', request()->path())->first();
        @endphp

        @if (isset($banner)&&!Str::endsWith($banner?->image, ['.jpeg', '.webp', '.gif','jpg','png']))
        <video loop muted autoPlay playsInline poster='{{getImageUrl($banner?->image)??asset('frontend/images/herobgvideo.mp4')}}' class="video-banner">
            <source src='{{getImageUrl($banner?->image)??asset('frontend/images/herobgvideo.mp4')}}' type="video/mp4" />
        </video>
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <div class="banner-container">
                <div class="position-absolute top-0 start-0 w-100 h-100 z-1"
                    style='background-color: #000000;opacity: 20%'></div>
                <div class="banner-content">
                    @if (isset($banner)&&$banner->details)
                    <p class="home_banner_subtitle mb-0">{{$banner->details}}</p>
                    @endif
                    @if (isset($banner)&&$banner->title)
                    <h1 class="home_banner_title mb-md-4">{{$banner->title}}</h1>
                    </h1>
                    @endif
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
        @else
        @php
            $defaultImage = asset('/frontend/images/about_banner.png'); // fallback image
            $finalImage = getImageUrl($banner?->image)??$defaultImage;
        @endphp
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <div class="banner-container"
                style="background-image: url({{ $finalImage }});background-size: cover;background-position: center;">
                <div class="position-absolute top-0 start-0 w-100 h-100 z-1" style='background-color: #000000;opacity: 20%'>
                </div>
                <div class="banner-content">
                    @if (isset($banner)&&$banner->details)
                    <p class="home_banner_subtitle mb-0">{{$banner->details}}</p>
                    @endif
                    @if (isset($banner)&&$banner->title)
                    <h1 class="home_banner_title mb-md-4">{{$banner->title}}</h1>
                    </h1>
                    @endif
                </div>
            </div>
        </div>

        @endif
    </div>

</section>
