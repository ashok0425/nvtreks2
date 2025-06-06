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
       .small-font {
    font-size: 80px; /* Adjust this size as needed */
}
        .trip_table_text{
            font-size: 18px!important;
        }
    .ribbon {
        position: absolute;
        top: -15px;
        right: -50px;
        background-color: #e63946;
        color: white;
        padding: 4px 8px 4px 12px;
        font-size: 10px;
        font-weight: bold;
        animation: blink 1s infinite;
        z-index: 10;

        /* Left arrow shape */
        clip-path: polygon(10% 50%, 0 0, 100% 0, 100% 100%, 0 100%, 10% 50%);
    }

    /* Blink animation */
    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.4; }
    }



        .splide__arrow{
            background:none!important;
            font-size: 30px;
            color: #fff!important;
        }

        .splide__arrow svg{
            fill: #fff!important;
        }
        .splide__arrow.splide__arrow--next{
            right:-70px;

        }
#searchOverlay {
    transition: opacity 0.3s ease;
}

        .splide__arrow.splide__arrow--prev{
            left:-70px;

        }
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

@media (max-width: 768px) {
    .small-font{
        font-size: 45px;
    }
}
    </style>
@stack('style')

</head>

<body>

    @yield('content')
    <footer class="footer bg-dark text-white">
        <div class="bg-black py-md-5 py-5">
            <div class="container-fluid py-md-5 my-md-4">
                <div class="row">
                    <!-- About Nepal Vision -->
                    <div class="col-md-4">
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <h5 class="footer_border_start ps-2">ABOUT NEPAL VISION</h5>
                        </div>
                        <p class="py-md-3 py-2 mb-0 text_lightgray font_montserrat">
                            At Nepal Vision, we craft life-changing journeys with heart.From the Himalayas to hidden valleys, every trek is personal,guided by passion, trust, and years of experience.
                        </p>
                        <div class="d-flex flex-wrap justify-content-between py-md-3 py-2 gap-3">
                         <div>
                            <img src="{{asset('frontend/images/tripadvisorimg.png')}}" alt="Tripadvisor" class="img-fluid" width="95">
                         </div>
<div>
    <img src="{{asset('frontend/images/afar.jpg')}}" alt="Tripadvisor" class="img-fluid" width="70">

</div>
                           <div>
                            <img src="{{asset('frontend/images/thenewyorktimesimg.png')}}" alt="The New York Times" class="img-fluid"
                            width="160">
                           </div>
                        </div>
                        <p class="py-md-3 py-2">
                            <a href="/about-us"
                                class="text-decoration-none font_mulish px-2 footer_border_end footer-link">About Us</a>
                            <a href="/blogs"
                                class="text-decoration-none font_mulish px-2 footer_border_end footer-link">Blogs</a>
                            <a href="/useful-info"
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
                            Get in touch with Nepal Vision— your next adventure starts here.
                        </p>
                        <p class="contact_info mb-2"><span class="pe-2"><img src="{{asset('frontend/images/phoneIcon.png')}}" alt="location"
                                    width="14" height="14"></span>{{setting()->phone}}</p>
                        <p class="contact_info mb-2"><span class="pe-2"><img src="{{asset('frontend/images/messageIcon.png')}}"
                                    alt="location" width="16" height="16"></span>{{setting()->email}}</p>
                        <p class="contact_info mb-2"><span class="pe-2"><img src="{{asset('frontend/images/locationIcon.png')}}"
                                    alt="location" width="16" height="16"></span>{{setting()->address}}</p>

                    </div>

                    <!-- Recent Posts -->
                    <div class="col-md-2">
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <h5 class="footer_border_start ps-2">RECENT POSTS</h5>
                        </div>
                       @foreach (App\Models\Blog::limit(4)->latest()->where('display_homepage',1)->get() as $blog)
                       <p class=" fs-6  font_montserrat border-bottom border-dark-subtle pb-3">
                       <a href="{{ route('blog.detail', ['url' => $blog->slug]) }}" class="text-light text-decoration-none"> {{$blog->title}}</a>
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
                            Subscribe to Nepal Vision – stay inspired for your next journey.
                        </p>
                         <form action="{{route('subscribe')}}" method="POST">
                            @csrf
                            <input type="email" class="form-control mb-4 rounded-0 py-md-3 py-2"
                                placeholder="Your Email..." required name="email">
                            <button type="submit"
                                class="btn btn_darkprimary w-100 py-md-3 py-2 rounded-0 fw-semibold">SUBSCRIBE
                                NOW</button>
                        </form>


 <div class='text-center text-md-start my-3 mb-0 mt-5' >
                                        <a href='{{ setting()->facebook }}' class="mx-2 text-decoration-none">
                                            <img src="{{asset('frontend/images/facebook.webp')}}" alt="" ></a>
                                        <a href='{{ setting()->instagram }}' class="mx-2 text-decoration-none">
                                            <img src="{{asset('frontend/images/instagram.webp')}}" alt="" >
                                        </a>

                                        <a href='{{ setting()->linkedin }}' class="mx-2 text-decoration-none">
                                            <img src="{{asset('frontend/images/linkedin.webp')}}" alt="" >
                                        </a>
                                        <a href='{{ setting()->youtube }}' class="mx-2 text-decoration-none"><img src="{{asset('frontend/images/youtube.webp')}}" alt="" ></a>

                                         <a href='{{ setting()->pinterest }}' class="mx-2 text-decoration-none"><img src="{{asset('frontend/images/pinterest.webp')}}" alt="" ></a>

                                    </div>
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
                        <p class="mb-0">Copyright © {{date('Y')}} Nepal Vision Treks.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>



  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <div>
            <div class="section-header mb-md-1">
                <hr class="section-line py-2" />
                <p class="section-subtitle">ONGOING TRIPS</p>
            </div>
            <h2 class='mb-md-3 h3 fw-bold'>JOIN FIXED DEPARTURE TRIPS</h2>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('booknow.store')}}" method="post">
            @csrf
            <input type="hidden" name="type" id="type">
        <div class="modal-body">
            <div class="form-group mb-3">
                <input type="text" name="name" class="form-control rounded-0 text-muted" placeholder="Full name">
            </div>
             <div class="form-group mb-3">
                <input type="email" name="email" class="form-control rounded-0 text-muted" placeholder="Email Address">
            </div>
             <div class="form-group mb-3">
                <input type="number" name="phone" class="form-control rounded-0 text-muted" placeholder="Phone number">
            </div>
             <div class="form-group mb-3" id="date">
                <input type="date" name="departure_date" class="form-control rounded-0 text-muted" placeholder="date">
            </div>
             <div class="form-group mb-3" id="size">
                <input type="number" name="size" class="form-control rounded-0 text-muted" placeholder="Group Size">
            </div>
             <div class="form-group mb-3">
                <select name="package_id" id="packageSelect" class="form-select form-control rounded-0">
                    <option value="">select package</option>
                    @foreach (App\Models\Package::where('status',1)->where('price','!=',null)->select('id','name')->get() as $package)
                        <option value="{{$package->id}}">{{$package->name}}</option>
                    @endforeach
                </select>
            </div>
             <div class="form-group mb-3">
                <input type="number" name="amount" id="amountInput" class="form-control rounded-0 text-muted" placeholder="Amount want to pay (USD)">
            </div>
              <div class="form-group mb-3">
                <textarea name="message" id="" class="form-control rounded-0" rows="2" placeholder="Anything we should consider for your trip?"></textarea>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary destination-button" data-bs-dismiss="modal">Close</button>
           <button  class="btn btn_darkprimary destination-button">Submit</button>

        </div>
        </form>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- Splide.js JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    {{-- toastr --}}
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
    document.getElementById('openSearch').addEventListener('click', function () {
        document.getElementById('searchOverlay').classList.remove('d-none');
    });

    document.getElementById('closeSearch').addEventListener('click', function () {
        document.getElementById('searchOverlay').classList.add('d-none');
    });
</script>
<script>
$(document).ready(function () {
    $(document).on('click','.staticBackdropBtn', function () {
        let packageId = $(this).data('id');
        let payment = $(this).data('payment');
        let type = $(this).data('type');


        // Set the selected package
        $('#packageSelect').val(packageId);
        $('#type').val(type);


        // Check if payment is required
        if (payment == 1) {
            // Set and show the amount input
            $('#amountInput').closest('.form-group').show();
                $('#size').closest('.form-group').hide();
            $('#date').closest('.form-group').hide();
        } else {
            // Clear and hide the amount input
            $('#amountInput').closest('.form-group').hide();
            $('#size').closest('.form-group').show();
            $('#date').closest('.form-group').show();

        }
    });

});
</script>

    <script>
        window.addEventListener('DOMContentLoaded', function () {
            const videos = document.querySelectorAll('.video-banner');
           videos.forEach(video => {
             const source = video.querySelector('source');
            source.src = source.getAttribute('data-src');
            video.load(); // Trigger loading the new src
            })


             const images = document.querySelectorAll('img[data-src]');
            images.forEach(img => {
                img.src = img.getAttribute('data-src');
        });

        });
    </script>
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
            let image_slider=document.getElementById('image-slider');
            if (image_slider) {
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
            let contact_info_container=document.getElementById('contact_info_container');
            if (contact_info_container) {
            var splide = new Splide("#contact_info_container", {
                type: "loop",
                perPage: 3,
                perMove: 1,
                gap: "1rem",
                pagination: false,
                arrows: true,
                autoWidth: false,
                focus: "center",
                breakpoints: {
                    1200: { perPage: 3, gap: "1rem" },
                    992: { perPage: 2, gap: "1.5rem" },
                    768: { perPage: 1, arrows: false,},
                },
            }).mount();

        }
        });


        document.addEventListener("DOMContentLoaded", function () {
            let testimonialSlider=document.getElementById('testimonialSlider');
            if (testimonialSlider) {
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
