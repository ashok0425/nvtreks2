@extends('frontend.layout.master')
@section('content')
<section class="video_section mb-md-5 mb-4">
    @include('frontend.layout.header')
<div class="video_banner_container">

<div class="hero_video_wrapper">
<video loop muted autoPlay playsInline poster='{{asset('frontend/images/banner-thumbnail.webp')}}' class="video-banner">
    <source defer data-src='https://d2i9o55ouvfvau.cloudfront.net/uploads/nvbanner.mp4' type="video/mp4" />
</video>
</div>
<div class="position-absolute top-0 start-0 w-100 ">
    <div class="banner-container">
        <div class="position-absolute top-0 start-0 w-100 z-1"
            style='background-color: #000000;opacity: 20%'></div>
        <div class="banner-content">
            <p class="home_banner_subtitle mb-0">CELEBRATING 30 PLUS GLORIOUS YEARS OF SERVICE</p>
            <h1 class="home_banner_title mb-md-4">NEPAL</h1>
            </h1>
            <div class="home_banner_input">
                <form action="{{route('search')}}" class="w-100 d-md-block d-none">
                    <div class="">
                        <div class="input-group search_input">
                            <span class="input-group-text bg-white ps-3 pe-0 rounded-start-2 py-md-3"
                                id="basic-addon1">
                                <i class="bi bi-search fs-6 text_darkprimary"></i>

                            </span>
                        <input type="text" class="form-control border border-start-0 ps-2 py-md-3 rounded-end-2"
                    placeholder="Find your trip.."   name="keyword"/>
                        </div>
                    </div>
                </form>
                  <form action="{{route('search')}}" class="w-100 d-md-none d-block">
                        <div class="">
                            <div class="input-group search_input">
                            <input type="text" class="form-control border border-start-0 ps-2 py-md-3 rounded-start-5"
                        placeholder="Find your trip.." aria-label="search"
                        aria-describedby="basic-addon1" required name="keyword"/>
                        <button class="rounded btn_darkprimary btn btn-primary rounded-end-5">Search</button>
                            </div>
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
                    <img loading="lazy" data-src="{{getImageUrl($destinations[0]['image'])}}" alt="NEPAL" class="card-img-top rounded-3"
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
                <a href="{{route('destination',['url'=>'bhutan'])}}" >
                <div class="card destination-card  p-0 border-0 rounded-3">
                    <img loading="lazy" data-src="{{getImageUrl($destinations[3]['image'])}}" alt="BHUTAN" class="card-img-top rounded-3"
                        style="height: 455px;object-fit: cover;">
                    <div class="card-img-overlay destination-overlay">
                        <h5 class="destination-title bg_darkOrange">{{$destinations[3]['name']}}</h5>
                        <p class="destination-description">{{count($destinations[3]->packages)}} Destinations</p>
                    </div>
                </div>
                </a>
            </div>
            @endif

            <!-- Third Column with Stacked Cards -->
            <div class="col-12 col-md-5 d-flex flex-column">
                <a href="{{route('destination',['url'=>'tibet'])}}" >
                <div class="card destination-card  p-0 border-0 rounded-3 mb-3">
                    <img loading="lazy" data-src="{{getImageUrl($destinations[2]['image'])}}" alt="TIBET" class="card-img-top rounded-3"
                        style="height: 220px;object-fit: cover;">
                    <div class="card-img-overlay destination-overlay">
                        <h5 class="destination-title bg_darkOrange">{{$destinations[2]['name']}}</h5>
                        <p class="destination-description">{{count($destinations[2]->packages)}} Destinations</p>
                    </div>
                </div>

                </a>
                <a href="{{route('destination',['url'=>'india'])}}" >
                <div class="card destination-card  p-0 border-0 rounded-3">
                    <img loading="lazy" data-src="{{getImageUrl($destinations[1]['image'])}}" alt="INDIA" class="card-img-top rounded-3"
                        style="height: 220px;object-fit: cover;">
                    <div class="card-img-overlay destination-overlay">
                        <h5 class="destination-title bg_darkOrange">{{$destinations[1]['name']}}</h5>
                        <p class="destination-description">{{count($destinations[1]->packages)}} Destinations</p>
                    </div>
                </div>
                </a>
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
                <div class="">
                <div class="row destination_categories">
                    @foreach ($destination_categories as $item)
                    <div class="text-white  fw-bold text-center col-md-2 col-4">
                        <div><img loading="lazy" data-src="{{getImageUrl($item->icon)}}" alt="{{$item->name}}" style="height: 140px;object-fit:cover"></div>
                        <span>{{$item->name}}</span>
                    </div>
                    @endforeach
                </div>
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
                        <a href="{{route('package.detail',['url'=>$package->url])}}" class="text-decoration-none text-dark">
                        <img loading="lazy" data-src="{{getImageUrl($package->banner)}}" class="img-fluid w-100 rounded-top"
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
                            <p class="mb-2 fs-5 fw-bold">{{$package->name??'Experience the natural beauty of glacier'}}</p>
                            <p class="text_lightprimary fw-bold font_montserrat mb-0">
                                Price: <span class="fs-6 text-decoration-line-through text-danger"><i>{{$package->price}}</i></span>
                                <span class="text_lightprimary fs-4">{{$package->discounted_price}}</span>
                            </p>
                        </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center">
                <a href="{{route('deals')}}" class="btn btn_darkprimary destination-button">VIEW ALL OFFERS</a>
            </div>
        </div>
    </section>

    <section class="w-100 mb-md-5 mb-4" style="overflow:hidden">
    <div class=" ">
    <video     class="video-banner"
    loop muted autoPlay playsInline poster='{{asset('frontend/images/video-thumbnail.webp')}}' style="width: 100vw;padding:1rem 0;">
        <source  data-src='https://d2i9o55ouvfvau.cloudfront.net/uploads/trekking.mp4' type="video/mp4" />
    </video>
    </div>
    </section>


    <section id="departureApp" class="container">
         <div>
                                <div id="departDate" class="">
                                    <div class="mb-md-4 mb-3">
                                        <div class="section-header mb-md-1">
                                            <hr class="section-line py-2" />
                                            <p class="section-subtitle">ONGOING TRIPS</p>
                                        </div>
                                        <h2 class='head_title mb-md-3'>JOIN FIXED DEPARTURE TRIPS</h2>
                                    </div>
                                    <div class="d-flex flex-md-row flex-column justify-content-end mb-md-4 mb-3">

                                        <div class="dropdown month_select mb-3">
                                            <button class="btn btn_darkprimary rounded-0 py-2 px-4 fw-bold dropdown-toggle"
                                                type="button" data-bs-toggle="dropdown">
                                                @{{ getMonthName(month?month:mon) }}, @{{ year }}
                                            </button>
                                            <div class="dropdown-menu p-3" style="min-width: 250px;">
                                                <div class="mb-2">
                                                    <label>Select Month</label>
                                                    <select v-model="month" class="form-select">
                                                        <option v-for="m in 12" :value="m">
                                                            @{{ getMonthName(m) }}</option>
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label>Select Year</label>
                                                    <select v-model="year" class="form-select">
                                                        <option v-for="y in years" :value="y">
                                                            @{{ y }}</option>
                                                    </select>
                                                </div>
                                                <button @click="fetchDepartures(10)"
                                                    class="btn btn_darkprimary rounded-0 py-2 px-4 fw-bold">Filter</button>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Table -->
                                    <div class="" v-if="departures.length">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Trip Name</th>
                                                    <th>Departure Date</th>
                                                    <th>Status</th>
                                                    <th>Prices</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="departure in departures" :key="departure.id">
                                                    <td>@{{departure.package.name}}</td>
                                                    <td>
                                                        <span
                                                            class="trip_table_text fw-bolder">@{{ departure.package.duration }}</span><br />
                                                        <span class="fs-6 text_lightDark">
                                                            From @{{ formatDate(departure.start_date) }} -
                                                            @{{ formatEndDate(departure.start_date, departure.package.duration) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <p
                                                            class="d-flex align-items-center gap-1 mb-0 fw-bold trip_table_text">
                                                             <img loading="lazy" src="{{ asset('frontend/images/gurantedIcon.png') }}"
                                                                alt="guranted" width="24" height="24">
                                                            Guaranteed
                                                        </p>
                                                        <span class="fs-6 font_montserrat">@{{ departure.total_seats - departure.booked_seats }} Seats
                                                            Left</span>
                                                        <div class="progress">
                                                            <div class="progress-bar bg_lightprimary rounded-0"
                                                                :style="{ width: getProgress(departure) + '%' }"
                                                                role="progressbar" :aria-valuenow="getProgress(departure)"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div
                                                            v-if="departure.package.discounted_price && departure.package.discounted_price < departure.package.price">
                                                            <span class="fs-6 font_montserrat fw-bolder text_darkprimary">
                                                                $@{{ departure.package.discounted_price }}
                                                            </span>
                                                            <span
                                                                class="ps-2 text-decoration-line-through text-danger small">
                                                                $@{{ departure.package.price }}
                                                            </span>
                                                        </div>
                                                        <div v-else>
                                                            <span class="fs-6 font_montserrat fw-bolder text_darkprimary">
                                                                $@{{ departure.package.price }}
                                                            </span>
                                                        </div>
                                                        <div>
                                                        <a :href="`/book-now?package=${departure.package_id}&size=2`"
   class="btn btn_lightprimary_outline mt-2 rounded-0 px-md-4 py-md-2">
   JOIN US
</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div v-else class="text-center py-4">
                                        No departures found for @{{ getMonthName(month) }}, @{{ year }}
                                    </div>
                                </div>
                            </div>
        <div class="text-center mb-3">
                 <button id="toggleDepartures" class="btn btn_darkprimary destination-button">LOAD MORE</button>


        </div>
    </section>



        <!-- ultimate guide -->
        <section class="bg_lightwhite">
            <div class="container py-5">
                <div class="row my-md-5 align-items-center">
                    <div class="col-lg-6 col-12 text-center mb-4 mb-lg-0">
                        <a href="/about-us">
                        <img loading="lazy" data-src="{{asset('frontend/images/epicadventuresImg.png')}}" alt="Epic Adventures" class="img-fluid" />
                        </a>
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
                            <span class="mx-2"><img loading="lazy" data-src="{{asset('frontend/images/epicbagIcon.png')}}" alt="price guaranted" width="15"
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
                                <img loading="lazy" data-src="{{asset('frontend/images/priceguarantedIcon.png')}}" alt="price guaranted" width="40" height="40">
                            </div>
                            <div>
                                <p class="fs-6 fw-bold font_montserrat mb-1">BEST PRICE GUARANTEED</p>
                                <p class="mb-0" style="max-width: 300px;">We offer the best value, with no hidden fees.Your adventure, fairly priced, always.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-4 flex-column flex-sm-row text-center text-sm-start">
                            <div class="bg_darkprimary p-3 d-flex justify-content-center align-items-center">
                                <img loading="lazy" data-src="{{asset('frontend/images/mapIcon.png')}}" alt="map" width="40" height="40">
                            </div>
                            <div>
                                <p class="fs-6 fw-bold font_montserrat mb-1">AMAZING DESTINATION</p>
                                <p class="mb-0" style="max-width: 300px;">Explore breathtaking views and culture. Each trip, a story worth remembering.</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 mb-4 flex-column flex-sm-row text-center text-sm-start">
                            <div class="bg_darkprimary p-3 d-flex justify-content-center align-items-center">
                                <img loading="lazy" data-src="{{asset('frontend/images/personIcon.png')}}" alt="person" width="40" height="40">
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
                                    <img loading="lazy" data-src="{{asset('frontend/images/pfnImg.png')}}" alt="pfn logo" class="w-100 h-100"
                                        style="object-fit: contain;" >
                                </li>
                                <li class="splide__slide px-md-4" style="max-height: 85px">
                                    <img loading="lazy" data-src="{{asset('frontend/images/astaImg.png')}}" alt="asta logo" class="w-100 h-100"
                                        style="object-fit: contain;" >
                                </li>
                                <li class="splide__slide px-md-4" style="max-height: 85px">
                                    <img loading="lazy" data-src="{{asset('frontend/images/sustainableImg.png')}}" alt="sustainable logo" class="w-100 h-100"
                                        style="object-fit: contain;" >
                                </li>
                                <li class="splide__slide px-md-4" style="max-height: 85px">
                                    <img loading="lazy" data-src="{{asset('frontend/images/ntbImg.png')}}" alt="ntb Img" class="w-100 h-100"
                                        style="object-fit: contain;" >
                                </li>
                                <li class="splide__slide px-md-4" style="max-height: 85px">
                                    <img loading="lazy" data-src="{{asset('frontend/images/earth.png')}}" alt="earth" class="w-100 h-100"
                                        style="object-fit: contain;" >
                                </li>
                                <li class="splide__slide px-md-4" style="max-height: 85px">
                                    <img loading="lazy" data-src="{{asset('frontend/images/taan_img.png')}}" alt="taan logo" class="w-100 h-100"
                                        style="object-fit: contain;" >
                                </li>
                                <li class="splide__slide px-md-4" style="max-height: 85px">
                                    <img loading="lazy" data-src="{{asset('frontend/images/adventurestravel_img.png')}}" alt="adventures travel logo" class="w-100 h-100"
                                        style="object-fit: contain;" >
                                </li>
                                <li class="splide__slide px-md-4" style="max-height: 85px">
                                    <img loading="lazy" data-src="{{asset('frontend/images/yelp_img.png')}}" alt="yelp logo" class="w-100 h-100"
                                        style="object-fit: contain;" >
                                </li>
                                <li class="splide__slide px-md-4" style="max-height: 85px">
                                    <img loading="lazy" data-src="{{asset('frontend/images/epic_slider_img.png')}}" alt="ntb Img" class="w-100 h-100"
                                        style="object-fit: contain;" >
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
      <form action="{{route('subscribe')}}" method="POST">
                            <div class="input-group">

                                    @csrf
                                <input type="email"
                                    class="form-control bg-transparent border border-white text-white py-md-3 rounded-0"
                                    placeholder="Your Email Address..." required aria-label="Recipient's email" name="email"/>
                                <button class="btn btn_darkprimary rounded-0 px-md-3 fw-semibold email_signup_btn"
                                    type="button">
                                    SIGN UP NOW
                                </button>
                            </div>

                                </form>
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



    <section class='bg_lightwhite py-5 d-none d-md-block'>
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
            <div class="row align-items-center" id="gallery-frame">
                <div class="col-12 col-md mb-3 mb-md-0">
                    <div><img id="img-0" class="img-fluid" /></div>
                </div>
                <div class="col-12 col-md mb-3 mb-md-0">
                    <div class="mb-3 mb-md-4"><img id="img-1" class="img-fluid" /></div>
                    <div><img id="img-2" class="img-fluid" /></div>
                </div>
                <div class="col-12 col-md mb-3 mb-md-0">
                    <div class="mb-3 mb-md-4">
                        <img id="img-3" class="img-fluid" /></div>
                    <div><img id="img-4" class="img-fluid" /></div>
                </div>
                <div class="col-12 col-md mb-3 mb-md-0">
                    <div class="mb-3 mb-md-4"><img id="img-5" class="img-fluid" /></div>
                    <div><img id="img-6" class="img-fluid" /></div>
                </div>
                <div class="col-12 col-md">
                    <div><img id="img-7" class="img-fluid" /></div>
                </div>
            </div>
        </div>

    </section>


    <section class="splide position-relative mt-5 mt-md-0" aria-label="Special Offers Carousel" style="min-height: 550px;" id="splideMissed">
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
                                    <h2 class="head_title text-white  text-center">THE ONES YOU ALMOST MISSED</h2>
                                    <p class="text-white fs-6 mb-4 fw-bold text-center">
                                        Tired of same suggestions? Here are some very underrated trips for you.
                                    </p>
                                    <h2 class="fw-bold text-white my-4 pt-5">{{$package->name}}</h2>
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
                    <div class="mt-5 mt-md-0 section-header mb-md-1 d-flex justify-content-center">
                        <hr class="section-line py-2">
                        <p class="section-subtitle ">FROM OUR BLOG</p>
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
                                <div class="card rounded-0 border-0 hover_effect recent_post_card mx-md-2" >
                                    <div class="recent_post_card_img">
                                        <img loading="lazy" data-src="{{getImageUrl($blog->thumbnail)}}" alt="{{$blog->title}}" class="img-fluid" style="height:290px">
                                    </div>
                                    <div class="card-body shadow-sm px-4 py-3" style="height:160px">
                                        <p class='fs-5 fw-bold'>{!! strip_tags(Str::limit($blog->title,180))!!}</p>
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
                            <img loading="lazy" data-src="{{asset('frontend/images/pervArrow.png')}}" alt="prev" width="24" height="20"
                                style="object-fit:contain;">
                        </button>
                    </div>
                    <div class='splide_btn_next splide_btn'>
                        <button id="custom-next" class="splide_btn">
                            <img loading="lazy" data-src="{{asset('frontend/images/nextArrow.png')}}" alt="next" width="24" height="20"
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
</div>

    @include('frontend.inc.escape')
    @include('frontend.inc.socialmedia')
    @include('frontend.inc.testimonial')
    @include('frontend.inc.faq')
    @include('frontend.inc.contactus')

@endsection
@push('style')
<style>
    @media (max-width: 768px) {
        .destination_categories img{
            width: 100px;
        }
        .destination_categories span{
            font-size: 14px!important;
        }
    }
    #gallery-frame img{
        height: 200px!important;
        width: 260px!important;
        object-fit: cover;
    }
     #gallery-frame #img-3,#img-4{
        height: 280px!important;
    }
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
    const toggleBtn = document.getElementById('toggleDepartures');
    let expanded = false;

    toggleBtn?.addEventListener('click', function () {
        const extraRows = document.querySelectorAll('.extra-row');

        if (!expanded) {
            // Show extra rows
            extraRows.forEach(row => row.classList.remove('d-none'));
            toggleBtn.textContent = 'SHOW LESS';
        } else {
            // Hide extra rows
            extraRows.forEach(row => row.classList.add('d-none'));
            toggleBtn.textContent = 'LOAD MORE';
            window.scrollTo({ top: document.querySelector('.trip_table').offsetTop - 150, behavior: 'smooth' });
        }

        expanded = !expanded;
    });
</script>


<script>


    const allImages = @json($gallery_images);
    const baseUrl = "https://d2i9o55ouvfvau.cloudfront.net/public"; // Adjust as needed



    const imageIds = ['img-0','img-1','img-2','img-3','img-4','img-5','img-6','img-7'];

    let currentIndex = 0;

    function getImageUrl(path) {
        return baseUrl + '/' + path;
    }

    function updateImages() {
        for (let i = 0; i < imageIds.length; i++) {
            const imgEl = document.getElementById(imageIds[i]);
            const image = allImages[currentIndex + i];
            console.log(image);
            if (image) {
                imgEl.src = getImageUrl(image);
            } else {
                const rand = Math.floor(Math.random() * 8) + 1; // Random number from 1 to 8
            imgEl.src = `{{ asset('frontend/images') }}/travelphotogallerImg${rand}.png`;
            }
        }
console.log(currentIndex);
        currentIndex += 8;
        if (currentIndex >= allImages.length) {
            currentIndex = 0;
        }
    }

    // Initial load
   setTimeout(() => {
    updateImages();
   }, 1000);

    // Rotate every 5 seconds
    setInterval(updateImages, 7000);

</script>

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


  <!-- Vue 3 CDN -->
    <script src="https://unpkg.com/vue@3.4.21/dist/vue.global.prod.js"></script>
    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vue-toastification@2.0.0-beta.12/dist/index.css" />
    <script src="https://cdn.jsdelivr.net/npm/vue-toastification@2.0.0-beta.12/dist/index.umd.min.js"></script>

    <script>
        const {
            createApp
        } = Vue;

        createApp({
            data() {
                return {
                    // Existing
                    month: '',
                    mon: {{$month}},

                    year: {{ $year }},
                    id: '',
                    departures: [],
                    years: (() => {
                        const y = new Date().getFullYear();
                        return [y, y + 1, y + 2];
                    })(),

                    // New - for form
                    selectedDate: '',
                    groupSize: 1,
                    basePrice: '', // fallback if not set
                };
            },
            computed: {
                totalPrice() {
                    return this.basePrice * this.groupSize;
                }
            },
            mounted() {
                this.fetchDepartures();
            },
            methods: {
                // Existing methods
                getMonthName(month) {
                    return new Date(2000, month - 1, 1).toLocaleString('default', {
                        month: 'long'
                    });
                },
                formatDate(dateStr) {
                    const date = new Date(dateStr);
                    return `${date.getDate()} ${date.toLocaleString('default', { month: 'long' })}`;
                },
                formatEndDate(startDate, duration) {
                    let days = parseInt(duration.match(/\d+/)?.[0] || 0);
                    let end = new Date(startDate);
                    end.setDate(end.getDate() + days - 1);
                    return `${end.getDate()} ${end.toLocaleString('default', { month: 'long' })}, ${end.getFullYear()}`;
                },
                getProgress(dep) {
                    return dep.total_seats > 0 ? Math.round((dep.booked_seats / dep.total_seats) * 100) : 0;
                },
                fetchDepartures(limit=5) {
                    axios.get(`/fetch-date?id=${this.id}&month=${this.month}&limit=${limit}&year=${this.year}`)
                        .then(res => {
                            this.departures = res.data.departures;
                        })
                        .catch(err => console.error(err));
                },


                increaseGroupSize() {
                    this.groupSize++;
                },
                decreaseGroupSize() {
                    if (this.groupSize > 1) {
                        this.groupSize--;
                    }
                },
                submitForm() {
                    const formData = {
                        date: this.selectedDate,
                        groupSize: this.groupSize,
                        totalPrice: this.totalPrice
                    };

                    console.log('Form submitted:', formData);

                    // Submit form via axios
                    axios.post('/api/book', formData)
                        .then(response => alert("Success"))
                        .catch(error => alert("Failed"));
                }
            }
        }).mount('#departureApp');
    </script>
@endpush
