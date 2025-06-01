<section class="video_section mb-md-5 mb-4">
    <!-- navbar -->
    @php
            $banner = App\Models\MainSlider::where('status',1)->where('link', request()->path())->first();
        @endphp
    @include('frontend.layout.header')
    <div class="video_banner_container ">

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
                  @if (isset($banner) && $banner->title)
    @php
        $wordCount = str_word_count($banner->title);
        $titleClass = $wordCount >= 2 ? 'home_banner_title small-font' : 'home_banner_title';
    @endphp
    <h1 class="{{ $titleClass }} mb-md-4">{{ $banner->title }}</h1>
@endif
                </div>
            </div>
        </div>

    </div>

</section>
