<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('frontend.inc.seo_block')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Splide.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link defer rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="{{asset('frontend/style/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/style/footer.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/style/app.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/style/home.css')}}">
   {{-- toastr --}}
   <link defer rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        /* Ensure that the dropdown menu shows on hover */
.nav-item.dropdown:hover > .dropdown-menu {
    display: block; /* Show the menu on hover */
    visibility: visible; /* Make sure it's visible */
    opacity: 1; /* Ensure it has opacity for visibility */
}
.nav-item .dropdown-item{
    position: relative;
}
/* Adjust the submenu (child dropdown) to appear to the right */
.nav-item .dropdown-menu .sub {
    display: none; /* Hide the child menu by default */
    position: absolute; /* Position it absolutely */
    left: 100%; /* Position it to the right of the parent menu */
    top: 0;
}

/* Show the child menu (sub-menu) when hovering over the parent */
.nav-item .dropdown-item:hover > .sub {
    display: block; /* Show the submenu on hover */
    visibility: visible; /* Make sure it's visible */
    opacity: 1; /* Ensure it has opacity */
}

/* Optional: You can adjust the transition for smooth visibility change */
.dropdown-menu {
    transition: visibility 0.3s, opacity 0.3s ease-in-out;
}
.sub {
    transition: visibility 0.3s, opacity 0.3s ease-in-out;
}
    </style>
@stack('style')

</head>

<body>

    @yield('content')
    <footer class="footer bg-dark text-white">
        <div class="bg-black py-md-5 py-5">
            <div class="container py-md-5 my-md-4">
                <div class="row">
                    <!-- About Nepal Vision -->
                    <div class="col-md-3">
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <h5 class="footer_border_start ps-2">ABOUT NEPAL VISION</h5>
                        </div>
                        <p class="py-md-3 py-2 mb-0 text_lightgray font_montserrat">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                            ullamcorper mattis, pulvinar dapibus leo.
                        </p>
                        <div class="d-flex flex-wrap justify-content-between py-md-3 py-2 gap-3">
                            <img src="{{asset('frontend/images/tripadvisorimg.png')}}" alt="Tripadvisor" class="img-fluid" width="95">
                            <img src="{{asset('frontend/images/thenewyorktimesimg.png')}}" alt="The New York Times" class="img-fluid"
                                width="160">
                        </div>
                        <p class="py-md-3 py-2">
                            <a href="/about-us"
                                class="text-decoration-none font_mulish px-2 footer_border_end footer-link">About Us</a>
                            <a href="/blogs"
                                class="text-decoration-none font_mulish px-2 footer_border_end footer-link">Blogs</a>
                            <a href="/usefulinfo"
                                class="text-decoration-none font_mulish px-2 footer-link">Information</a>
                        </p>
                        <p>
                            <a href="/privacy-policy"
                                class="text-decoration-none font_mulish px-2 footer_border_end footer-link">Privacy
                                Policy</a>
                            <a href="/terms-conditions" class="text-decoration-none font_mulish px-2 footer-link">Terms
                                & Conditions</a>
                        </p>
                    </div>

                    <!-- Contact Us -->
                    <div class="col-md-3">
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <h5 class="footer_border_start ps-2">CONTACT US</h5>
                        </div>
                        <p class="py-md-3 py-2 text_lightgray font_montserrat">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <p class="contact_info mb-2"><span class="pe-2"><img src="{{asset('frontend/images/phoneIcon.png')}}" alt="location"
                                    width="14" height="14"></span>{{setting()->phone}}</p>
                        <p class="contact_info mb-2"><span class="pe-2"><img src="{{asset('frontend/images/messageIcon.png')}}"
                                    alt="location" width="16" height="16"></span>{{setting()->email}}</p>
                        <p class="contact_info mb-2"><span class="pe-2"><img src="{{asset('frontend/images/locationIcon.png')}}"
                                    alt="location" width="16" height="16"></span>{{setting()->address}}</p>
                    </div>

                    <!-- Recent Posts -->
                    <div class="col-md-3">
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <h5 class="footer_border_start ps-2">RECENT POSTS</h5>
                        </div>
                       @foreach (App\Models\Blog::limit(4)->latest()->where('display_homepage',1)->get() as $blog)
                       <p class=" fs-6 fw-semibold font_montserrat border-bottom border-dark-subtle pb-3">
                       <a href="" class="text-light text-decoration-none"> {{$blog->post_title}}</a>
                        {{-- <small class="fw-light text_lightgray font_montserrat">{{$blog->}}</small> --}}
                    </p>
                       @endforeach

                    </div>

                    <!-- Subscribe Us -->
                    <div class="col-md-3">
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <h5 class="footer_border_start ps-2">SUBSCRIBE US</h5>
                        </div>
                        <p class="py-md-3 py-2 mb-0 text_lightgray font_montserrat">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <form>
                            <input type="email" class="form-control mb-4 rounded-0 py-md-3 py-2"
                                placeholder="Your Email..." required>
                            <button type="submit"
                                class="btn btn_darkprimary w-100 py-md-3 py-2 rounded-0 fw-semibold">SUBSCRIBE
                                NOW</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Section -->
        <div class="text-center py-md-3 py-2" style="background-color: #0D0C0C;">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-md-between justify-content-center align-items-center">
                    <div>
                        <a class="navbar-brand" href="/">
                            <img src="{{asset('frontend/images/logo_white.png')}}" alt="Nepal Vision" style="width: 180px; height: 61px;">
                        </a>
                    </div>
                    <div>
                        <p class="mb-0">Copyright © 2025 Nepal Vision Treks.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- Splide.js JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    {{-- toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- toastr --}}
    <script>
        @if (Session::has('messege')) //toatser
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
            }
        @endif
    </script>
    @stack('script')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let traveler_slider=document.getElementById('traveler-slider');
            if (traveler_slider) {

            new Splide('#traveler-slider', {
                type: 'loop',
                perPage: 1,
                autoplay: true,
                interval: 2000, // Adjust auto-scroll speed (ms)
                pauseOnHover: false,
                pauseOnFocus: false,
                arrows: false,
                pagination: false,
            }).mount();
        }

        });

        document.addEventListener('DOMContentLoaded', function () {
            let testimonial_slider=document.getElementById('testimonial-slider');
            if (testimonial_slider) {
            new Splide('#image-slider', {
                type: 'loop',
                perPage: 5,
                autoplay: true,
                interval: 2000, // Adjust auto-scroll speed (ms)
                pauseOnHover: false,
                pauseOnFocus: false,
                arrows: false,
                pagination: false,
            }).mount();
        }
        });

        document.addEventListener('DOMContentLoaded', function () {
            let epic_img_slider=document.getElementById('epic-img-slider');
            if(epic_img_slider){
            new Splide('#epic-img-slider', {
                type: 'loop',
                perPage: 5,
                autoplay: true,
                interval: 2000, // Adjust auto-scroll speed (ms)
                pauseOnHover: false,
                pauseOnFocus: false,
                arrows: false,
                pagination: false,
            }).mount();
        }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let recentPostsSlider=document.getElementById('recentPostsSlider');
            if (recentPostsSlider) {
            var splide = new Splide("#recentPostsSlider", {
                type: "loop",
                perPage: 3,
                perMove: 1,
                gap: "1rem",
                pagination: false,
                arrows: false,
                autoWidth: false,
                focus: "center",
                breakpoints: {
                    1200: { perPage: 3, gap: "1rem" },
                    992: { perPage: 2, gap: "1.5rem" },
                    768: { perPage: 1 },
                },
            }).mount();

            // Custom button navigation
            document.getElementById("custom-prev").addEventListener("click", function () {
                splide.go("-1");
            });

            document.getElementById("custom-next").addEventListener("click", function () {
                splide.go("+1");
            });
        }
        });


        document.addEventListener("DOMContentLoaded", function () {
            let recentPostsSlider=document.getElementById('testimonialSlider');
            if (recentPostsSlider) {
            var splide = new Splide("#testimonialSlider", {
                type: "loop",
                perPage: 1,
                perMove: 1,
                gap: "1rem",
                pagination: true,
                arrows: false,
                autoWidth: false,
                focus: "center",
            }).mount();
        }
        });
    </script>

</body>

</html>
