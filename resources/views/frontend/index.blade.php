@extends('frontend.layout.master')
@section('content')
<section class="video_section mb-md-5 mb-4">
    @include('frontend.layout.header')
<div class="video_banner_container ">
    @php
    $banner = App\Models\MainSlider::where('status',1)->where('link', request()->path())->first();
@endphp

<video loop muted autoPlay playsInline poster='{{asset('frontend/images/herobgvideo.mp4')}}' class="video-banner">
    <source src='{{asset('frontend/images/herobgvideo.mp4')}}' type="video/mp4" />
</video>
<div class="position-absolute top-0 start-0 w-100 h-100">
    <div class="banner-container">
        <div class="position-absolute top-0 start-0 w-100 h-100 z-1"
            style='background-color: #000000;opacity: 20%'></div>
        <div class="banner-content">
            <p class="home_banner_subtitle mb-0">CELEBRATING 30 PLUS GLORIOUS YEARS OF SERVICE</p>
            <h1 class="home_banner_title mb-md-4">NEPAL</h1>
            </h1>
            <div class="home_banner_input">
                <form action="{{route('search')}}" class="w-100">

                <div class="input-group search_input">
                    <span class="input-group-text bg-white ps-3 pe-0 rounded-start-2 py-md-3"
                        id="basic-addon1">
                        <i class="bi bi-search fs-6 text_darkprimary"></i>

                    </span>
                        <input type="text" class="form-control border border-start-0 ps-2 py-md-3 rounded-end-2"
                        placeholder="Find your trip.." aria-label="search"
                        aria-describedby="basic-addon1" required name="keyword"/>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<section class="container my-5">
    <!-- Section Heading -->
    <div class="row align-items-center mb-md-5 mb-3">
        <div class="col-md-7">
            <div class="section-header">
                <hr class="section-line py-2">
                <p class="section-subtitle">POPULAR DESTINATION</p>
            </div>
            <h2 class="head_title">TOP NOTCH DESTINATIONS</h2>
        </div>
        <div class="col-md-5">
            <p class="section-description">
                Discover the top places to visit with Nepal Vision <br> —handpicked destinations full of beauty, culture, <br> and adventure.
            </p>
        </div>
    </div>

    <!-- Destination Grid -->
    <div class="row g-3">
        <!-- First Two Columns -->
        <div class="col-12 col-md">
            <a href="{{route('destination',['url'=>'nepal'])}}" >
            <div class="card destination-card  p-0 border-0 rounded-3">
                <img src="{{getImageUrl($destinations[0]['image'])}}" alt="NEPAL" class="card-img-top rounded-3"
                    style="height: 455px;object-fit: cover;">
                <div class="card-img-overlay destination-overlay">
                    <h5 class="destination-title bg_darkOrange">{{$destinations[0]['name']}}</h5>
                    <p class="destination-description">{{count($destinations[0]->packages)}} Destinations</p>
                </div>
            </div>
        </a>
        </div>
@if (isset($destinations[3]))

        <div class="col-12 col-md">
            <div class="card destination-card  p-0 border-0 rounded-3">
                <img src="{{getImageUrl($destinations[3]['image'])}}" alt="BHUTAN" class="card-img-top rounded-3"
                    style="height: 455px;object-fit: cover;">
                <div class="card-img-overlay destination-overlay">
                    <h5 class="destination-title bg_darkOrange">{{$destinations[3]['name']}}</h5>
                    <p class="destination-description">{{count($destinations[3]->packages)}} Destinations</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Third Column with Stacked Cards -->
        <div class="col-12 col-md-5 d-flex flex-column">
            <div class="card destination-card  p-0 border-0 rounded-3 mb-3">
                <img src="{{getImageUrl($destinations[2]['image'])}}" alt="TIBET" class="card-img-top rounded-3"
                    style="height: 220px;object-fit: cover;">
                <div class="card-img-overlay destination-overlay">
                    <h5 class="destination-title bg_darkOrange">{{$destinations[2]['name']}}</h5>
                    <p class="destination-description">{{count($destinations[2]->packages)}} Destinations</p>
                </div>
            </div>

            <div class="card destination-card  p-0 border-0 rounded-3">
                <img src="{{getImageUrl($destinations[1]['image'])}}" alt="INDIA" class="card-img-top rounded-3"
                    style="height: 220px;object-fit: cover;">
                <div class="card-img-overlay destination-overlay">
                    <h5 class="destination-title bg_darkOrange">{{$destinations[1]['name']}}</h5>
                    <p class="destination-description">{{count($destinations[1]->packages)}} Destinations</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Button -->
    {{-- <div class="text-center mt-4">
        <button class="btn btn_darkprimary destination-button">MORE DESTINATIONS</button>
    </div> --}}
</section>

<section class="bg_lightwhite">
    <div class="container py-md-5 py-4">
        <div class="d-flex justify-content-center text-center mb-md-5 pb-md-5 mb-4">
            <div>
                <div class="section-header mb-md-1 d-flex justify-content-center">
                    <hr class="section-line py-2">
                    <p class="section-subtitle">EXPLORE GREAT PLACES</p>
                </div>
                <h2 class="head_title mb-md-3">POPULAR PACKAGES</h2>
                <p class="text_lightDark font_montserrat mb-0" style="max-width: 800px;">
                    Explore handpicked trekking and tour packages across destinations—designed for <br> unforgettable experiences and meaningful adventures.
                </p>
            </div>
        </div>

        <div class="row g-4 mb-4 pb-md-5">

            @foreach ($popular_packages as $package)
            <div class="col-12 col-sm-6 col-md-4">
               @include('frontend.inc.package-card',['package'=>$package])
            </div>
            @endforeach


        </div>

        <!-- Button -->
        <div class="text-center mt-4">
            <a href="{{route('search')}}" class="btn btn_darkprimary destination-button">VIEW ALL PACKAGES</a>
        </div>
    </div>
</section>



<section class="position-relative"
style="background-image: url({{asset('frontend/images/travelcategoriesImg.jpg')}}); background-size: cover; background-position: center; min-height: 550px;">
<div class="position-absolute top-0 start-0 w-100 h-100 bg_blackoverlay"></div>
<div class="position-absolute top-0 start-0 w-100 h-100">
    <div class="container h-100">
        <div class="py-5 d-flex flex-column justify-content-between h-100">

            <!-- Header -->
            <div class="text-center">
                <div class="travel-header mb-md-2">
                    <hr class="travel-line py-2">
                    <p class="travel-subtitle">POPULAR DESTINATION</p>
                </div>
                <h4 class="head_title text-white mb-3">TRAVEL CATEGORIES</h4>
                <div class="d-flex justify-content-center align-items-center text-white">
                    <i class="fas fa-circle fs-6 fw-bold mx-1"></i>
                    <i class="fas fa-circle fs-6 fw-bold mx-1"></i>
                    <i class="fas fa-circle fs-6 fw-bold mx-1"></i>
                    <i class="fas fa-circle fs-6 fw-bold mx-1"></i>
                    <i class="fas fa-suitcase-rolling fs-4 fw-bold mx-1"></i> <!-- TravelBag Icon -->
                    <i class="fas fa-circle fs-6 fw-bold mx-1"></i>
                    <i class="fas fa-circle fs-6 fw-bold mx-1"></i>
                    <i class="fas fa-circle fs-6 fw-bold mx-1"></i>
                    <i class="fas fa-circle fs-6 fw-bold mx-1"></i>
                </div>
            </div>

            <!-- Categories -->
            <div class="d-flex flex-wrap justify-content-md-between justify-content-center gap-2">
                @foreach ($destination_categories as $item)
                <div class="text-white fs-5 fw-bold text-center">
                    <div><img src="{{getImageUrl($item->icon)}}" alt="{{$item->name}}" width="140"></div>
                    {{$item->name}}
                </div>
                @endforeach

            </div>

        </div>
    </div>
</div>
</section>

<section class="bg_lightwhite py-5">
    <div class="container">
        <div class="d-flex justify-content-center text-center mb-md-5 pb-md-5 mb-4">
            <div class="">
                <div class="section-header mb-md-1 d-flex justify-content-center">
                    <hr class="section-line py-2" />
                    <p class="section-subtitle">TRAVEL OFFERS & DISCOUNTS</p>
                </div>
                <h2 class='head_title mb-md-3'>SPECIAL TRAVEL OFFER</h2>
                <p class='text_lightDark font_montserrat mb-0' style='max-width: 800px;'>
                    Take advantage of our limited-time travel offers and explore the Himalayas with unbeatable <br> value—crafted just for you.
                </p>
            </div>
        </div>

        <div class="row g-4 mb-4 pb-md-5">

            @foreach ($discounted_packages as $package)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card border-0 bg-white shadow rounded-3 hover_effect position-relative">
                    <img src="{{getImageUrl($package->thumbnail)}}" class="img-fluid w-100 rounded-top"
                        alt="{{$package->price}}" style="height: 400px;object-fit:cover">
                        <div class="discount-badge">
                            @php
                                $discount=(($package->price-$package->discounted_price)*100)/$package->price
                            @endphp
                            <div
                                class="bg_darkOrange d-flex justify-content-center align-items-center flex-column font_mulish rounded-circle fs-6 fw-bold text-white">
                                <p class="my-0">{{(int)$discount}}%</p>
                                <p class="fs-6 fw-semibold my-0">off</p>
                            </div>
                        </div>

                    <div class="card-details">
                        <p class="mb-2 fw-bolder text_darkprimary">{{$package->destination->name}}</p>
                        <p class="mb-2 fs-5 fw-bold">{{$package->slogan??'Experience the natural beauty of glacier'}}</p>
                        <p class="text_lightprimary fw-bold font_montserrat mb-0">
                            Price: <span class="fs-5 text-decoration-line-through text-secondary"><i>{{$package->price}}</i></span>
                            <span class="text_lightprimary fs-4">{{$package->discounted_price}}</span>
                        </p>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{route('deals')}}" class="btn btn_darkprimary destination-button">VIEW ALL OFFERS</a>
        </div>
    </div>
</section>

<section class="video_section mb-md-5 mb-4">
<div class="video_banner_container ">
    @php
    $banner = App\Models\MainSlider::where('status',1)->where('link', request()->path())->first();
@endphp

<video loop muted autoPlay playsInline poster='{{asset('frontend/images/herobgvideo.mp4')}}' class="video-banner">
    <source src='{{asset('frontend/images/herobgvideo.mp4')}}' type="video/mp4" />
</video>
<div class="position-absolute top-0 start-0 w-100 h-100">
    <div class="banner-container">
        <div class="position-absolute top-0 start-0 w-100 h-100 z-1"
            style='background-color: #000000;opacity: 70%'></div>
        <div class="banner-content">
           <img src="{{asset('frontend/images/play-icon.webp')}}" alt="Nepalvision play" width="80">
            </div>
        </div>
    </div>
</div>
</div>
</section>


<section>
    <div class="container pt-md-5 mt-md-5 mt-4">
        <div class="row align-items-center">
            <div class="col-md-9">
                <div class="section-header mb-md-1">
                    <hr class="section-line py-2" />
                    <p class="section-subtitle">ONGOING TRIPS</p>
                </div>
                <h2 class='head_title mb-md-3'>JOIN FIXED DEPARTURE TRIPS</h2>
            </div>
            <div class="col-md-3 text-end">
                <div class="dropdown month_select">
                    <button class="month_select btn_darkprimary destination-button dropdown-toggle border-0" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Carbon\Carbon::create(null, $month)->format('F') }}, {{ $year }}
                    </button>
                    <div class="dropdown-menu" style="min-width: 250px;">
                        <form class="px-4 py-3" action="{{ url('/#departures') }}" method="GET">
                            <div class="mb-3">
                                <label for="monthSelect" class="form-label">SELECT MONTH, YEAR</label>
                                <select class="form-select" id="monthSelect" name="month">
                                    @foreach (range(1, 12) as $m)
                                        <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                                            {{ Carbon\Carbon::create(null, $m)->format('F') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="yearSelect" class="form-label">Year</label>
                                <select class="form-select" id="yearSelect" name="year">
                                    @php
                                        $currentYear = date('Y');
                                        $endYear = $currentYear + 2;
                                    @endphp
                                    @for ($y = $currentYear; $y <= $endYear; $y++)
                                        <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>
                                            {{ $y }}</option>
                                    @endfor
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table trip_table">
                <thead>
                    <tr>
                        <th>Trip Name</th>
                        <th>Departure Date</th>
                        <th>Status</th>
                        <th>Prices</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($departures as $departure)

                    <tr>
                        <td class='trip_table_text fw-bold'>{{Str::limit($departure->package->name,25)}}</td>
                        <td>
                            <span class='trip_table_text fw-bolder'>{{$departure->package->duration}}</span><br />

                            <span class='fs-6 text_lightDark'>
                                From {{ date("j F", strtotime($departure->start_date)) }} -
                                @if($departure->package->duration)
                                    @php
                                        $durationDays = (int) filter_var($departure->package->duration, FILTER_SANITIZE_NUMBER_INT);
                                    @endphp
                                    {{ date('j F, Y', strtotime($departure->start_date . ' + ' . ($durationDays - 1) . ' days')) }}
                                @else
                                    {{ date("j F", strtotime($departure->start_date)) }}
                                @endif
                            </span>


                        </td>
                        <td>
                            <p class="d-flex align-items-center gap-1 mb-0 fw-bold trip_table_text">
                                <img src="{{asset('frontend/images/gurantedIcon.png')}}" alt="guranted" width="24"
                                    height="24">Guaranteed
                            </p>
                            @php
                            $totalSeats = $departure->total_seats; // Total available seats
                            $bookedSeats = $departure->booked_seats; // Seats that are already booked
                            $seatsLeft = $totalSeats - $bookedSeats; // Calculate remaining seats

                            // Calculate progress bar width
                            $progressPercentage = ($totalSeats > 0) ? round(($bookedSeats / $totalSeats) * 100) : 0;
                        @endphp

                        <span class='fs-6 font_montserrat'>{{ $seatsLeft }} Seat{{ $seatsLeft > 1 ? 's' : '' }} Left</span>
                        <div class="progress">
                            <div class="progress-bar bg_lightprimary rounded-0" role="progressbar"
                                style="width: {{ $progressPercentage }}%"
                                aria-valuenow="{{ $progressPercentage }}" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                        </td>
                        <td>
                            <span class="fs-6 font_montserrat fw-bolder">${{$departure->package->discounted_price}}</span>
                            <span
                                class="original-price ps-2 text-decoration-line-through text-danger small">${{$departure->package->price}}</span>
                            <div>
                                <button class="btn btn_lightprimary_outline mt-2 rounded-0 px-md-4 py-md-2">JOIN
                                    US</button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            No departures found for {{ Carbon\Carbon::create(null, $month)->format('F') }},
                            {{ $year }}
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
    </div>
</section>



    <!-- ultimate guide -->
    <section class="bg_lightwhite">
        <div class="container py-5">
            <div class="row my-md-5 align-items-center">
                <div class="col-lg-6 col-12 text-center mb-4 mb-lg-0">
                    <img src="{{asset('frontend/images/epicadventuresImg.png')}}" alt="Epic Adventures" class="img-fluid" loading='lazy'/>
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
                        Discover the top places to visit with Nepal Vision <br> —handpicked destinations full of beauty, culture, and <br> adventure.
                    </p>
                    <div class="d-flex align-items-center gap-3 mb-4 flex-column flex-sm-row text-center text-sm-start">
                        <div class="bg_darkprimary p-3 d-flex justify-content-center align-items-center">
                            <img src="{{asset('frontend/images/priceguarantedIcon.png')}}" alt="price guaranted" width="40" height="40">
                        </div>
                        <div>
                            <p class="fs-6 fw-bold font_montserrat mb-1">BEST PRICE GUARANTEED</p>
                            <p class="mb-0" style="max-width: 300px;">We offer the best value, with no hidden fees.Your adventure, fairly priced, always.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-4 flex-column flex-sm-row text-center text-sm-start">
                        <div class="bg_darkprimary p-3 d-flex justify-content-center align-items-center">
                            <img src="{{asset('frontend/images/mapIcon.png')}}" alt="map" width="40" height="40">
                        </div>
                        <div>
                            <p class="fs-6 fw-bold font_montserrat mb-1">AMAZING DESTINATION</p>
                            <p class="mb-0" style="max-width: 300px;">Explore breathtaking views and culture. Each trip, a story worth remembering.</p>
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
                                    style="object-fit: contain;" loading='lazy'>
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="{{asset('frontend/images/astaImg.png')}}" alt="asta logo" class="w-100 h-100"
                                    style="object-fit: contain;" loading='lazy'>
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="{{asset('frontend/images/sustainableImg.png')}}" alt="sustainable logo" class="w-100 h-100"
                                    style="object-fit: contain;" loading='lazy'>
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="{{asset('frontend/images/ntbImg.png')}}" alt="ntb Img" class="w-100 h-100"
                                    style="object-fit: contain;" loading='lazy'>
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="{{asset('frontend/images/earth.png')}}" alt="earth" class="w-100 h-100"
                                    style="object-fit: contain;" loading='lazy'>
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="{{asset('frontend/images/taan_img.png')}}" alt="taan logo" class="w-100 h-100"
                                    style="object-fit: contain;" loading='lazy'>
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="{{asset('frontend/images/adventurestravel_img.png')}}" alt="adventures travel logo" class="w-100 h-100"
                                    style="object-fit: contain;" loading='lazy'>
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="{{asset('frontend/images/yelp_img.png')}}" alt="yelp logo" class="w-100 h-100"
                                    style="object-fit: contain;" loading='lazy'>
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="{{asset('frontend/images/epic_slider_img.png')}}" alt="ntb Img" class="w-100 h-100"
                                    style="object-fit: contain;" loading='lazy'>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="position-relative" style="
    background-image: url({{asset('frontend/images/specialoffer_banner.png')}});
    background-size: cover;
    background-position: center;
    min-height: 550px;
">
    <!-- Dark overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background-color: #151515; opacity: 75%;">
    </div>

    <div class="position-absolute top-0 start-0 w-100 h-100 z-3">
        <div class="container h-100">
            <div class="d-flex flex-column justify-content-center h-100">
                <div class="text-center text-md-start">
                    <!-- Header section -->
                    <div class="d-flex column justify-content-start">
                        <div class="travel-header mb-md-2">
                            <hr class="travel-line py-2" />
                            <p class="travel-subtitle">HOLIDAY PACKAGE OFFER</p>
                        </div>
                    </div>

                    <!-- Title & description -->
                    <h4 class="head_title text-white mb-3">GET SPECIAL OFFERS</h4>
                    <p class="text-white fs-6 mb-4 fw-bold mx-auto mx-md-0" style="max-width: 580px;">
                        Sign up now to receive hot special offers and information about the
                        best tour packages, updates, and discounts!
                    </p>

                    <!-- Email input -->
                    <div class="email_input mb-4 mx-auto mx-md-0" style="max-width: 650px;">
                        <div class="input-group">
                            <input type="email"
                                class="form-control bg-transparent border border-white text-white py-md-3 rounded-0"
                                placeholder="Your Email Address..." aria-label="Recipient's email" />
                            <button class="btn btn_darkprimary rounded-0 px-md-3 fw-semibold email_signup_btn"
                                type="button">
                                SIGN UP NOW
                            </button>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text_lightwhite mb-0 fw-medium font_montserrat mx-auto mx-md-0"
                        style="max-width: 700px;">
                        Subscribe to receive exclusive deals, destination highlights, and insider travel tips delivered straight to your inbox.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>



<section class='bg_lightwhite py-5'>
    <div class="d-flex justify-content-center text-center mb-4">
        <div class="">
            <div class="section-header mb-md-1 d-flex justify-content-center">
                <hr class="section-line py-2" />
                <p class="section-subtitle">OUR TOUR GALLERY</p>
            </div>
            <h2 class='head_title mb-md-3 text-uppercase'>Traveler's Photo Gallery</h2>
            <p class='text_lightDark font_montserrat mb-0' style="max-width: 800px;">
                See the Himalayas through the eyes of our travelers—authentic moments, epic landscapes, and unforgettable memories.
            </p>
        </div>
    </div>
    <div class="mx-md-5 mx-3">
        <div class="row align-items-center">
            <div class="col-12 col-md mb-3 mb-md-0">
                <div class="">
                    <img src="{{getImageUrl($galleries[0]->image)??asset('frontend/images/travelphotogallerImg8.png')}}" alt="travelphotogallerImg1" class='img-fluid'  loading='lazy' />
                </div>
            </div>
            <div class="col-12 col-md mb-3 mb-md-0">
                <div class="mb-3 mb-md-4">
                    <img src="{{getImageUrl($galleries[2]->image)??asset('frontend/images/travelphotogallerImg7.png')}}" alt="travelphotogallerImg1" class='img-fluid' loading='lazy' />
                </div>
                <div class="">
                    <img src="{{getImageUrl($galleries[5]->image)??asset('frontend/images/travelphotogallerImg6.png')}}" alt="travelphotogallerImg1" class='img-fluid' loading='lazy' />
                </div>
            </div>
            <div class="col-12 col-md mb-3 mb-md-0">
                <div class="mb-3 mb-md-4">
                    <div class="splide" id="traveler-slider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <img src="{{getImageUrl($galleries[1]->image)??asset('frontend/images/travelphotogallerImg1.png')}}" alt="travelphotogallerImg1" class='img-fluid' loading='lazy' />
                                </li>
                                <li class="splide__slide">
                                    <img src="{{getImageUrl($galleries[4]->image)??asset('frontend/images/travelphotogallerImg4.png')}}" alt="travelphotogallerImg4" class='img-fluid' loading='lazy' />
                                </li>
                                <li class="splide__slide">
                                    <img src="{{getImageUrl($galleries[3]->image)??asset('frontend/images/travelphotogallerImg3.png')}}" alt="travelphotogallerImg3" class='img-fluid' loading='lazy' />
                                </li>
                                <li class="splide__slide">
                                    <img src="{{getImageUrl($galleries[2]->image)??asset('frontend/images/travelphotogallerImg8.png')}}" alt="travelphotogallerImg1" class='img-fluid' loading='lazy' />
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="">
                    <img src="{{getImageUrl($galleries[7]->image)??asset('frontend/images/travelphotogallerImg2.png')}}" alt="travelphotogallerImg1" class='img-fluid' loading='lazy' />
                </div>
            </div>
            <div class="col-12 col-md mb-3 mb-md-0">
                <div class="mb-3 mb-md-4">
                    <img src="{{getImageUrl($galleries[3]->image)??asset('frontend/images/travelphotogallerImg3.png')}}" alt="travelphotogallerImg1" class='img-fluid' loading='lazy' />
                </div>
                <div class="">
                    <img src="{{asset(getImageUrl($galleries[5]->image)??'frontend/images/travelphotogallerImg4.png')}}" alt="travelphotogallerImg1" class='img-fluid' loading='lazy' />
                </div>
            </div>
            <div class="col-12 col-md">
                <div class="">
                    <img src="{{asset('frontend/images/travelphotogallerImg5.png')}}" alt="travelphotogallerImg1" class='img-fluid' loading='lazy' />
                </div>
            </div>
        </div>
    </div>
</section>


<section class="splide position-relative" aria-label="Special Offers Carousel" style="min-height: 550px;" id="splideMissed">
    <div class="splide__track h-100">
        <ul class="splide__list h-100">

            @foreach ($missed_packages as $package)

            <!-- Slide 1 -->
            <li class="splide__slide position-relative h-100" style="
                background-image: url('{{ getImageUrl($package->thumbnail) }}');
                background-size: cover;
                background-position: center;
                min-height: 550px;
            ">
                <!-- Dark overlay -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: #151515; opacity: 75%; z-index: 1;"></div>

                <div class="position-relative z-3 h-100">
                    <div class="container h-100">
                        <div class="d-flex flex-column justify-content-center h-100 py-5">
                            <div class="text-center text-md-start">
                                <h2 class="head_title text-white mb-5 mx-md-5 mx-md-0">THE ONES YOU ALMOST MISSED</h2>
                                <p class="text-white fs-6 mb-4 fw-bold mx-auto mx-md-0 mt-5 pt-4" style="max-width: 900px;">
                                    Tired of same suggestions? Here are some very underrated trips for you.
                                </p>
                                <h2 class="fw-bold text-white my-4">{{$package->name}}</h2>
                                <p class="text_lightwhite mb-0 font_montserrat mx-auto mx-md-0" style="max-width: 1000px;">
                                    {{$package->short_description}}
                                </p>
                            </div>
                        </div>
                        <a href="{{route('package.detail',['url'=>$package->url])}}" class="btn btn_darkprimary destination-button">VIEW DETAILS</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

</section>


  <!-- recent posts -->
  <section class="mb-5 py-md-5">
    <div class="container">
        <div class="d-flex justify-content-center text-center mb-md-5 mb-4">
            <div>
                <div class="section-header mb-md-1 d-flex justify-content-center">
                    <hr class="section-line py-2">
                    <p class="section-subtitle">FROM OUR BLOG</p>
                </div>
                <h2 class='head_title mb-md-3'>OUR RECENT POSTS</h2>
                <p class='text_lightDark font_montserrat mb-0' style="max-width: 800px;">
                    From expert tips to inspiring stories, explore our latest blog posts and dive deeper into your next adventure.
                </p>
            </div>
        </div>

        <!-- Splide Slider -->
        <div class="recent_posts_slider position-relative mb-md-5 mb-4">
            <div class="splide" id="recentPostsSlider">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($blogs as $blog)
                        <li class="splide__slide my-4">
                            <a href="{{ route('blog.detail', ['url' => $blog->slug]) }}" class="text-decoration-none">
                            <div class="card rounded-0 border-0 hover_effect recent_post_card mx-md-2">
                                <div class="recent_post_card_img">
                                    <img src="{{getImageUrl($blog->thumbnail)}}" alt="{{$blog->title}}" class="img-fluid">
                                </div>
                                <div class="card-body shadow-sm px-4 py-3">
                                    <p class='fs-5 fw-bold'>{!! strip_tags(Str::limit($blog->title,400))!!}</p>
                                    <p class='mb-0 text_darkGray small'>{{Carbon\Carbon::parse($blog->created_at)->format('F d, Y')}}</p>
                                </div>
                            </div>
                        </a>
                        </li>
                        @endforeach


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
            <a href="{{route('blog')}}" class="btn btn_darkprimary destination-button">VIEW ALL POSTS</a>
        </div>
    </div>
</section>

    @include('frontend.inc.escape')
    @include('frontend.inc.socialmedia')
    @include('frontend.inc.testimonial')
    @include('frontend.inc.faq')
    @include('frontend.inc.contactus')

@endsection
@push('style')
<style>
   #splideMissed .splide__pagination {
        position: absolute;
        bottom: 10px;
        right: 100px;
        justify-content: flex-end;
    }

    #splideMissed .splide__pagination__page {
      width: 40px;
      height: 14px;
      margin: 0 6px;
      border-radius: 20px;
      background: #999;
      opacity: 0.6;
      transition: all 0.3s ease;
    }

    /* Active dot - make it blue */
    #splideMissed .splide__pagination__page.is-active {
      background: #007BFF; /* Bootstrap Blue */
      transform: scale(1.2);
      opacity: 1;
    }

    </style>

@endpush
@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('#splideMissed', {
            type: 'loop',
            autoplay: true,
            interval: 5000,
            pagination: true,
            arrows: false,
        }).mount();
    });
</script>
@endpush
