@extends('frontend.layout.master')


@section('content')

@include('frontend.inc.banner')
 <!-- ultimate guide -->
 <section class="">
    <div class="container py-5">
        <div class="row my-md-5 align-items-center">
            <div class="col-lg-6 col-12 text-center mb-4 mb-lg-0">
                <img src="{{asset('frontend/images/epicadventuresImg.png')}}" alt="Epic Adventures" class="img-fluid" />
            </div>
            <div class="col-lg-6 col-12 px-3 px-lg-5">
                <p class="text_darkprimary mb-3 fw-bold text-center text-lg-start">INTRODUCTION ABOUT US</p>
                <h4 class="head_title text-center text-lg-start">ULTIMATE GUIDE TO EPIC ADVENTURE</h4>
                <div
                    class="d-flex flex-wrap justify-content-center justify-content-lg-start align-items-center text-danger mb-4">
                    <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                    <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                    <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                    <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                    <span class="mx-2"><img src="{{asset('frontend/images/epicbagIcon.png')}}" alt="price guaranted" width="15"
                            height="24"></span>
                    <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                    <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                    <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                    <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                </div>
                <p class="fs-6 mb-4 font_montserrat text_lightDark text-center text-lg-start">
                    Explore our curated list of the best countries to visit in 2024 and discover incredible
                    destinations waiting to be explored.
                </p>
                <div class="d-flex align-items-center gap-3 mb-4 flex-column flex-sm-row text-center text-sm-start">
                    <div class="bg_darkprimary p-3 d-flex justify-content-center align-items-center">
                        <img src="{{asset('frontend/images/priceguarantedIcon.png')}}" alt="price guaranted" width="40" height="40">
                    </div>
                    <div>
                        <p class="fs-6 fw-bold font_montserrat mb-1">BEST PRICE GUARANTEED</p>
                        <p class="mb-0" style="max-width: 300px;">Discover the top places to visit with Nepal Vision—handpicked destinations full of beauty, culture, and adventure.</p>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 mb-4 flex-column flex-sm-row text-center text-sm-start">
                    <div class="bg_darkprimary p-3 d-flex justify-content-center align-items-center">
                        <img src="{{asset('frontend/images/mapIcon.png')}}" alt="map" width="40" height="40">
                    </div>
                    <div>
                        <p class="fs-6 fw-bold font_montserrat mb-1">AMAZING DESTINATION</p>
                        <p class="mb-0" style="max-width: 300px;">We offer the best value, with no hidden fees.Your adventure, fairly priced, always.</p>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 mb-4 flex-column flex-sm-row text-center text-sm-start">
                    <div class="bg_darkprimary p-3 d-flex justify-content-center align-items-center">
                        <img src="{{asset('frontend/images/personIcon.png')}}" alt="person" width="40" height="40">
                    </div>
                    <div>
                        <p class="fs-6 fw-bold font_montserrat mb-1">PERSONAL SERVICES</p>
                        <p class="mb-0" style="max-width: 300px;">Tailored trips to fit your travel dreams. Your journey, made just for you.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-2 epic_img_containrer">
            <div class="splide" id="epic-img-slider">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide px-md-4" style="max-height: 85px">
                            <img src="{{asset('frontend/images/pfnImg.png')}}" alt="pfn logo" class="w-100 h-100"
                                style="object-fit: contain;">
                        </li>
                        <li class="splide__slide px-md-4" style="max-height: 85px">
                            <img src="{{asset('frontend/images/astaImg.png')}}" alt="asta logo" class="w-100 h-100"
                                style="object-fit: contain;">
                        </li>
                        <li class="splide__slide px-md-4" style="max-height: 85px">
                            <img src="{{asset('frontend/images/sustainableImg.png')}}" alt="sustainable logo" class="w-100 h-100"
                                style="object-fit: contain;">
                        </li>
                        <li class="splide__slide px-md-4" style="max-height: 85px">
                            <img src="{{asset('frontend/images/ntbImg.png')}}" alt="ntb Img" class="w-100 h-100"
                                style="object-fit: contain;">
                        </li>
                        <li class="splide__slide px-md-4" style="max-height: 85px">
                            <img src="{{asset('frontend/images/earth.png')}}" alt="earth" class="w-100 h-100"
                                style="object-fit: contain;">
                        </li>
                        <li class="splide__slide px-md-4" style="max-height: 85px">
                            <img src="{{asset('frontend/images/taan_img.png')}}" alt="taan logo" class="w-100 h-100"
                                style="object-fit: contain;">
                        </li>
                        <li class="splide__slide px-md-4" style="max-height: 85px">
                            <img src="{{asset('frontend/images/adventurestravel_img.png')}}" alt="adventures travel logo" class="w-100 h-100"
                                style="object-fit: contain;">
                        </li>
                        <li class="splide__slide px-md-4" style="max-height: 85px">
                            <img src="{{asset('frontend/images/yelp_img.png')}}" alt="yelp logo" class="w-100 h-100"
                                style="object-fit: contain;">
                        </li>
                        <li class="splide__slide px-md-4" style="max-height: 85px">
                            <img src="{{asset('frontend/images/epic_slider_img.png')}}" alt="ntb Img" class="w-100 h-100"
                                style="object-fit: contain;">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- founder -->
<section class="mb-md-5 mb-4">
    <div class="container">
        <div class="row align-items-center mb-3 mb-md-4">
            <div class="col-md-5">
                <img src="{{asset('frontend/images/devendraImg.png')}}" alt="devendra" class="img-fluid">
            </div>
            <div class="col-md-7 px-md-5">
                <div class="px-md-3">
                    <h4 class="founder_title mb-md-4 mb-3">A Heartfelt Tribute to our founder Mr. Devendra Wagle</h4>

                    <p class="mb-2 mb-md-3 pb-2 font_montserrat fs-6">
                        Mountains are bridges—between people, cultures, and dreams. Mr. Devendra Wagle, the visionary founder of Nepal Vision Treks, understood this better than anyone. His recent passing leaves us heartbroken, but his legacy shines brighter than ever.
                    </p>

                    <p class="mb-2 mb-md-3 pb-2 font_montserrat fs-6">
                        In 1992, Mr. Wagle saw the Himalayas not just as peaks but as stories waiting to be told. With passion and determination, he founded Nepal Vision Treks, turning a dream into a legacy of trust, adventure, and unforgettable experiences. He didn’t just sell treks; he sold dreams, connecting travelers to the magic of Nepal’s landscapes and culture.
                    </p>

                    <p class="mb-2 mb-md-3 pb-2 font_montserrat fs-6">
                        More than an entrepreneur, Mr. Wagle was a mentor and a friend. He believed in his team, his clients, and the power of sustainable tourism. His humility, kindness, and visionary spirit touched everyone he met. Though he is no longer with us, his legacy lives on—in the mountains he loved, the trails he created, and the values he instilled in Nepal Vision Treks. Rest in peace, Mr. Wagle. Your journey may have ended, but your vision will continue to inspire us all.
                    </p>
                </div>
            </div>
        </div>

       <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between align-items-center gap-3">
                <div>
                    <img src="{{asset('frontend/images/han.webp')}}" alt="company logo" class="img-fluid" width="140" height="85">
                </div>
                <div>
                    <img src="{{asset('frontend/images/taang.webp')}}" alt="company logo" class="img-fluid" width="140" height="85">
                </div>
                <div>
                    <img src="{{asset('frontend/images/nma.webp')}}" alt="company logo" class="img-fluid" width="140" height="85">
                </div>
                {{-- <div>
                    <img src="{{asset('frontend/images/companylogo4.png')}}" alt="company logo" class="img-fluid" width="370" height="85">
                </div> --}}
            </div>
        </div>
       </div>
    </div>
</section>


    <!-- explore us -->
    <section class="explore-section position-relative" style="
    background-image: url('{{asset('frontend/images/aboutexploreBanner.png')}}');
    background-size: cover;
    background-position: center;
    min-height: 650px;">
        <!-- Dark overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100 z-1" style='background-color: #151515;opacity: 75%'>
        </div>

        <div class="position-absolute top-0 start-0 w-100 h-100 z-3">
            <div class="container h-100 px-4">
                <div class="d-flex flex-column justify-content-center h-100">
                    <div class="text-center text-md-start">
                        <!-- Header section -->
                        <div class="travel-header mb-md-2">
                            <hr class="travel-line py-2" />
                            <p class="travel-subtitle">EXPLORE WITH US</p>
                        </div>

                        <!-- Title & description -->
                        <h4 class="head_title text-white mb-md-3 mb-2 text-center">TRAVEL, DISCOVER WITH US</h4>
                        <div class="d-flex justify-content-center mb-md-4 mb-2">
                            <p class="text-center text-white fs-6" style="max-width: 750px;">
                                Explore our curated list of the best countries to visit in 2024 and discover incredible
                                destinations waiting to be explored.
                            </p>
                        </div>

                        <!-- Info Cards -->
                        <div class="row gap-2">
                            <div class="col bg_darkOrange py-md-3 text-white explore_card">
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="pe-md-4 pe-2 explore_card_header">
                                        <img src="{{asset('frontend/images/clientIcon.png')}}" alt="client">
                                    </div>
                                    <div class="text-center">
                                        <p class="mb-0 explore_card_title">100K+</p>
                                        <p class="font_montserrat explore_card_subtitle mb-0">Satisfied Clients</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col bg_darkOrange py-md-3 text-white explore_card">
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="pe-md-4 pe-2 explore_card_header">
                                        <img src="{{asset('frontend/images/awardIcon.png')}}" alt="award">
                                    </div>
                                    <div class="text-center">
                                        <p class="mb-0 explore_card_title">27+</p>
                                        <p class="font_montserrat explore_card_subtitle mb-0">Awards Achieved</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col bg_darkOrange py-md-3 text-white explore_card">
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="pe-md-4 pe-2 explore_card_header">
                                        <img src="{{asset('frontend/images/memberIcon.png')}}" alt="member">
                                    </div>
                                    <div class="text-center">
                                        <p class="mb-0 explore_card_title">40K+</p>
                                        <p class="font_montserrat explore_card_subtitle mb-0">Active Members</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col bg_darkOrange py-md-3 text-white explore_card">
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="pe-md-4 pe-2 explore_card_header">
                                        <img src="{{asset('frontend/images/destinationIcon.png')}}" alt="destination">
                                    </div>
                                    <div class="text-center">
                                        <p class="mb-0 explore_card_title">100+</p>
                                        <p class="font_montserrat explore_card_subtitle mb-0">Tour Destinations</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Info Cards -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- recent posts -->
    <section class="mb-5 py-md-5">
        <div class="container">
            <div class="d-flex justify-content-center text-center mb-md-5 mb-4">
                <div>
                    <div class="section-header mb-md-1 d-flex justify-content-center">
                        <hr class="section-line py-2">
                        <p class="section-subtitle">OUR TEAM</p>
                    </div>
                    <h2 class='head_title mb-md-3'>MEET OUR TEAM</h2>
                    <p class='text_lightDark font_montserrat mb-0' style="max-width: 800px;">
                        Meet our team of passionate adventurers, expert guides, and travel planners—dedicated to making your journey unforgettable.
                    </p>
                </div>
            </div>

            <!-- Splide Slider -->
            <div class="recent_posts_slider position-relative mb-md-5 mb-4">
                <div class="splide" id="recentPostsSlider">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide my-4">
                                <div class="card rounded-0 border-0 hover_effect recent_post_card mx-md-2">
                                    <div class="recent_post_card_img">
                                        <img src="./images/ourteamImg1.png" alt="recent posts" class="img-fluid">
                                    </div>
                                    <div class="card-body shadow-sm px-4 py-3">
                                        <p class='fs-5 fw-bold'>Pushkar Basnet</p>
                                        <p class='mb-0 text_darkGray small'>Senior Travel Guide</p>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide my-4">
                                <div class="card rounded-0 border-0 hover_effect recent_post_card mx-md-2">
                                    <div class="recent_post_card_img">
                                        <img src="./images/ourteamImg2.png" alt="recent posts" class="img-fluid">
                                    </div>
                                    <div class="card-body shadow-sm px-4 py-3">
                                        <p class='fs-5 fw-bold'>Pushkar Basnet</p>
                                        <p class='mb-0 text_darkGray small'>Senior Travel Guide</p>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide my-4">
                                <div class="card rounded-0 border-0 hover_effect recent_post_card mx-md-2">
                                    <div class="recent_post_card_img">
                                        <img src="./images/ourteamImg3.png" alt="recent posts" class="img-fluid">
                                    </div>
                                    <div class="card-body shadow-sm px-4 py-3">
                                        <p class='fs-5 fw-bold'>Pushkar Basnet</p>
                                        <p class='mb-0 text_darkGray small'>Senior Travel Guide</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Custom Navigation Buttons -->
                <div class="splide_btn_section text-center mt-3">
                    <div class='splide_btn_prev splide_btn'>
                        <button id="custom-prev" class="splide_btn">
                            <img src="{{asset('frontend/images/pervArrow.png')}}" alt="prev" width="24" height="20"
                                style="object-fit:contain;">
                        </button>
                    </div>
                    <div class='splide_btn_next splide_btn'>
                        <button id="custom-next" class="splide_btn">
                            <img src="{{asset('frontend/images/nextArrow.png')}}" alt="next" width="24" height="20"
                                style="object-fit:contain;">
                        </button>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn_darkprimary destination-button">VIEW ALL POSTS</button>
            </div>
        </div>
    </section>


    @include('frontend.inc.testimonial')
    @include('frontend.inc.contactus')
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('frontend/style/about.css') }}">
    <style>
        #ckeditor_content img {
            max-width: 100% !important;
        }

        #ckeditor_content h1,
        #ckeditor_content h2,
        #ckeditor_content h3,
        #ckeditor_content h4,
        #ckeditor_content h5,
        #ckeditor_content h6,
        #ckeditor_content p,
        #ckeditor_content span,
        #ckeditor_content div,
        #ckeditor_content strong {
            font-family: "Mulish", serif !important;
        }
    </style>
@endpush

@push('script')
    <script>
        // Parse CKEditor content
        const editorContent = document.getElementById('ckeditor_content');
        const imagesToLazyLoad = editorContent.querySelectorAll('img');

        // Lazy load images
        const options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        function lazyLoadImage(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    observer.unobserve(img);
                }
            });
        }

        const observer = new IntersectionObserver(lazyLoadImage, options);

        imagesToLazyLoad.forEach(img => {
            img.src = placeholderImageURL; // Set placeholder image initially
            observer.observe(img);
        });
    </script>
@endpush
