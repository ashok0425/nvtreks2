@extends('frontend.layout.master')

@section('content')
{!! NoCaptcha::renderJs() !!}

    <div id="departureApp">
        <section class="video_section">
            <!-- navbar -->
            @include('frontend.layout.header')
            @php
            // dd($package);
                $defaultImage = getImageUrl($package->thumbnail) ?? asset('/frontend/images/galleyBanner.png'); // fallback image
                $finalImage = $defaultImage;

            @endphp
            <div class="position-absolute top-0 start-0 w-100 h-100">
                <div class="banner-container"
                    style="background-image: url({{ $finalImage }});background-size: cover;background-position: center;">
                    <div class="position-absolute top-0 start-0 w-100 h-100 z-1"
                        style='background-color: #000000;opacity: 20%'>
                    </div>
                    <div class="banner-content">
                        <h1 class="banner-title">{{ $package->name }}
                        </h1>
                    </div>
                </div>
            </div>

        </section>


        <!-- list details -->
        <section>
            <div class="mb-md-5 pb-3 position-sticky top-0 z-1 " style="z-index: 99999">
                <div class="boxShadow bg-white">
                    <div class="container py-3">
                        <!-- Tab Navigation + Book Button -->
                        <div class="d-flex flex-md-row flex-column justify-content-md-between align-items-center">
                            <ul class="nav nav_tab justify-content-center">
                                @if (!empty($package->overview))
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#overview">Overview</a>
                                    </li>
                                @endif

                                @if (!empty($package->itenaries))
                                    <li class="nav-item">
                                        <a class="nav-link" href="#itinerary">Itinerary</a>
                                    </li>
                                @endif

                                @if (!empty($package->departure_dates))
                                    <li class="nav-item">
                                        <a class="nav-link" href="#departDate">Departure Dates</a>
                                    </li>
                                @endif

                                @if (!empty($package->faqs))
                                    <li class="nav-item">
                                        <a class="nav-link" href="#faqs">FAQs</a>
                                    </li>
                                @endif

                                <li class="nav-item">
                                    <a class="nav-link" href="#reviews">Reviews</a>
                                </li>
                            </ul>

                            <a href="{{ route('booknow') }}"
                                class="btn bg_darkprimary rounded-0 py-2 px-4 fw-bold fs-6 mt-3 mt-md-0">BOOK A TRIP</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class=" mb-md-5 mb-4">
                    <h2 class='head_title mb-3'>{{ $package->name }}</h2>
                    <div class="d-flex align-items-center gap-3">

                        <p class='fs-5 fw-bold font_montserrat mb-0'>
                        <div class="d-flex align-items-center gap-1 mb-md-4 mb-3">
                            <span class="small text_darkGray"></span>
                            @for ($i = 1; $i <= $package->testimonial_avg; $i++)
                                <i class="fas fa-star text-gray text-warning"></i>
                            @endfor
                            @for ($i = 1; $i <= 5 - $package->testimonial_avg; $i++)
                                <i class="fas fa-star text-gray"></i>
                            @endfor
                            </span>
                            {{ $package->testimonial_avg }}/{{ $package->testimonial_count }}</p>
                        </div>
                    </div>
                    <div class="row align-items-end mb-md-5 mb-4">
                        <div class="mb-md-5">
                            <div class="row gap-3 gap-md-0">
                                <div class="col-md-6 d-flex d-none d-md-block">
                                     <img loading="lazy" loading='lazy'
                                        src="{{ getImageUrl($package->package_images()->first()?->image) ?? $finalImage }}"
                                        alt="{{ $package->name }}" class="img-fluid w-100 h-100 object-fit-cover">
                                </div>
                                <div class="col-md-3 d-flex flex-column d-none d-md-block">
                                     <img loading="lazy" loading='lazy'
                                        src="{{ getImageUrl($package->package_images()->skip(1)->first()?->image) ?? $finalImage }}"
                                        alt="{{ $package->name }}" class="img-fluid w-100 h-50 object-fit-cover mb-4">
                                     <img loading="lazy" loading='lazy'
                                        src="{{ getImageUrl($package->package_images()->skip(2)->first()?->image) ?? $finalImage }}"
                                        alt="{{ $package->name }}" class="img-fluid w-100 h-50 object-fit-cover">
                                </div>
                                <div class="col-md-3 d-flex">
                                    <div class="position-relative">
                                     <img loading="lazy" loading='lazy'
                                        src="{{ getImageUrl($package->package_images()->skip(3)->first()?->image) ?? $finalImage }}"
                                        alt="{{ $package->name }}" class="img-fluid w-100 h-100 object-fit-cover">

                                        <div style="position: absolute;top:85%;right:7%">
                                            <a href="{{route('gallery')}}" class="btn btn_white d-flex align-items-center boxShadow gap-2 px-3 py-2 rounded-3">
                                                <p class='mb-0'>
                                                    <i class="bi bi-grid-3x3-gap-fill fs-6 fw-bold"></i>
                                                </p>
                                                <p class='mb-0 small fw-bold'>View All Gallery</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-8 pe-md-4 order-md-1 order-2">
                            <div class="card boxShadow p-3 p-md-4 pb-md-5 mb-md-5 mb-4 border-0">
                                <div class="row align-items-center g-md-5 g-4">
                                    @if ($package->duration)
                                        <div class="col-6 col-md-4 trip_itinerary_card">
                                            <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                 <img loading="lazy" src="{{ asset('frontend/images/tripIcon.png') }}" alt="Trip Duration"
                                                    class="img-fluid" width="51" height="51" />
                                                <div class="text-md-start text-center trip_itinerary_content">
                                                    <h4 class="mb-0 border-bottom border-light-subtle">Trip Duration</h4>
                                                    <p class="mb-0 font_montserrat">{{ $package->duration }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($package->activity)
                                        <div class="col-6 col-md-4 trip_itinerary_card">
                                            <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                 <img loading="lazy" src="{{ asset('frontend/images/naturetripIcon.png') }}"
                                                    alt="Nature Of Trip" class="img-fluid" width="51" height="51" />
                                                <div class="text-md-start text-center trip_itinerary_content">
                                                    <h4 class="mb-0 border-bottom border-light-subtle">Nature Of Trip</h4>
                                                    <p class="mb-0 font_montserrat">{{ $package->activity }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($package->altitude)
                                        <div class="col-6 col-md-4 trip_itinerary_card">
                                            <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                 <img loading="lazy" src="{{ asset('frontend/images/maxaltitudeIcon.png') }}"
                                                    alt="Maximum Altitude" class="img-fluid" width="51"
                                                    height="51" />
                                                <div class="text-md-start text-center trip_itinerary_content">
                                                    <h4 class="mb-0 border-bottom border-light-subtle">Maximum Altitude</h4>
                                                    <p class="mb-0 font_montserrat">{{ $package->altitude }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($package->difficulty)
                                        <div class="col-6 col-md-4 trip_itinerary_card">
                                            <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                 <img loading="lazy" src="{{ asset('frontend/images/gradeIcon.png') }}"
                                                    alt="Difficulty Grade" class="img-fluid" width="51"
                                                    height="51" />
                                                <div class="text-md-start text-center trip_itinerary_content">
                                                    <h4 class="mb-0 border-bottom border-light-subtle">Difficulty Grade
                                                    </h4>
                                                    <p class="mb-0 font_montserrat">{{ $package->difficulty }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($package->start_end_point)
                                        <div class="col-6 col-md-4 trip_itinerary_card">
                                            <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                 <img loading="lazy" src="{{ asset('frontend/images/poinsIcon.png') }}"
                                                    alt="Start & End Point" class="img-fluid" width="51"
                                                    height="51" />
                                                <div class="text-md-start text-center trip_itinerary_content">
                                                    <h4 class="mb-0 border-bottom border-light-subtle">Start & End Point
                                                    </h4>
                                                    <p class="mb-0 font_montserrat">{{ $package->start_end_point }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($package->best_month)
                                        <div class="col-6 col-md-4 trip_itinerary_card">
                                            <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                 <img loading="lazy" src="{{ asset('frontend/images/seasonsIcon.png') }}"
                                                    alt="Best Seasons" class="img-fluid" width="51"
                                                    height="51" />
                                                <div class="text-md-start text-center trip_itinerary_content">
                                                    <h4 class="mb-0 border-bottom border-light-subtle">Best Seasons</h4>
                                                    <p class="mb-0 font_montserrat">{{ $package->best_month }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($package->meal)
                                        <div class="col-6 col-md-4 trip_itinerary_card">
                                            <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                 <img loading="lazy" src="{{ asset('frontend/images/mealsIcon.png') }}" alt="Meals"
                                                    class="img-fluid" width="51" height="51" />
                                                <div class="text-md-start text-center trip_itinerary_content">
                                                    <h4 class="mb-0 border-bottom border-light-subtle">Meals</h4>
                                                    <p class="mb-0 font_montserrat">{{ $package->meal }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($package->transport)
                                        <div class="col-6 col-md-4 trip_itinerary_card">
                                            <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                 <img loading="lazy" src="{{ asset('frontend/images/transportationIcon.png') }}"
                                                    alt="Transportation" class="img-fluid" width="51"
                                                    height="51" />
                                                <div class="text-md-start text-center trip_itinerary_content">
                                                    <h4 class="mb-0 border-bottom border-light-subtle">Transportation</h4>
                                                    <p class="mb-0 font_montserrat">{{ $package->transport }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($package->accommodation)
                                        <div class="col-6 col-md-4 trip_itinerary_card">
                                            <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                 <img loading="lazy" src="{{ asset('frontend/images/accommodationIcon.png') }}"
                                                    alt="Accommodation" class="img-fluid" width="51"
                                                    height="51" />
                                                <div class="text-md-start text-center trip_itinerary_content">
                                                    <h4 class="mb-0 border-bottom border-light-subtle">Accommodation</h4>
                                                    <p class="mb-0 font_montserrat">{{ $package->accommodation }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="card boxShadow bg_lightwhite overview p-3 p-md-4 mb-md-5 mb-4 trip_details">
                                {!! $package->overview !!}
                            </div>

                            @if ($package->routemap)
                                <div class="card boxShadow p-3 p-md-4 pb-md-5 mb-md-5 mb-4 trip_details">
                                    <h5 class="mb-md-4 mb-3">{{ $package->name }} Route</h5>
                                     <img loading="lazy" src="{{ getImageUrl($package->routemap) }}" alt="Everest camp"
                                        class="img-fluid" />
                                </div>
                            @endif


                            <div class="card boxShadow outline p-3 p-md-4 pb-md-5 mb-md-5 mb-4 trip_details bg_lightwhite"
                                id="itinerary">
                                {{-- <h5 class="mb-md-4 mb-3">Outline Itinerary</h5> --}}
                                <div>
                                    {{-- @foreach ($package->itenaries as $itenary)
                                        <div
                                            class="d-flex flex-md-row flex-column align-items-center justify-content-md-start justify-content-center text-md-start text-center gap-md-2 gap-1 border-bottom font_montserrat py-md-3 py-2 outline_itinerary_content">

                                            @php
                                                $day_text = $itenary->title; // or whatever your variable is
                                                preg_match('/^([^:]+:)(.*)/', $day_text, $matches);
                                            @endphp

                                            @if (count($matches) === 3)
                                                <strong>{{ $matches[1] }}</strong>{{ $matches[2] }}
                                            @else
                                                {{ $day_text }}
                                            @endif
                                        </div>
                                    @endforeach --}}
                                     {!!$package->outline_itinerary!!}

                                    <!-- Add more itinerary days as per the requirements -->
                                </div>
                            </div>

                            @if ($package->circuit_image)
                                <div class="pb-md-5 mb-md-5 mb-4">
                                    <div class="card boxShadow p-3 p-md-4 pb-md-5 trip_details">
                                        <h5 class="mb-md-4 mb-3">{{ $package->name }} Altitude Chart</h5>
                                         <img loading="lazy" src="{{ getImageUrl($package->circuit_image) }}"
                                            alt="Everest camp altitude chart" class="img-fluid" />
                                    </div>
                                </div>
                            @endif


                            <div class="card boxShadow detail_itinerary bg_lightwhite p-3 p-md-4 mb-md-5 mb-4 trip_details">
                                <h5 class="mb-md-5 mb-4">Detailed Itinerary</h5>
                                <p class="mb-3">{!! $package->detailed_itinerary !!}</p>
                                @foreach ($package->itenaries as $itenary)
                                    <div>
                                        @php
                                            $iteration=$loop->iteration+1
                                        @endphp
                                        <div class="d-flex align-items-center gap-3 my-md-4 my-3">
                                            <div class="position-relative">
                                                 <img loading="lazy" src="{{ asset("frontend/images/spiral-calendar-pad $iteration.png") }}"
                                                    alt="{{ $itenary->title }}" loading='lazy' width="40">

                                            </div>
                                            <h6 class="fs_18 fw-bolder mb-0 flex-grow-1 text-break">
                                                {{ $itenary->title }}
                                            </h6>
                                        </div>

                                        <div class="row">
                                            @if ($itenary->car)
                                                <div class="col-md-4 mb-3">
                                                    <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                         <img loading="lazy" src='{{ asset('frontend/images/cardIcon.png') }}'
                                                            alt='car' class='img-fluid' width='40'
                                                            height='40' />
                                                        <div class="text-md-start text-center trip_itinerary_content">
                                                            <h4 class='mb-0 border-bottom border-light-subtle'>Car</h4>
                                                            <p class='mb-0 font_montserrat'>{{ $itenary->car }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($itenary->overnight)
                                                <div class="col-md-4 mb-3">
                                                    <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                         <img loading="lazy" src='{{ asset('frontend/images/locationIcon.png') }}'
                                                            alt='overnight' class='img-fluid' width='40'
                                                            height='40' />
                                                        <div class="text-md-start text-center trip_itinerary_content">
                                                            <h4 class='mb-0 border-bottom border-light-subtle'>Overnight
                                                            </h4>
                                                            <p class='mb-0 font_montserrat'>{{ $itenary->overnight }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($itenary->meal)
                                                <div class="col-md-4 mb-3">
                                                    <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                         <img loading="lazy" src='{{ asset('frontend/images/mealsIcon.png') }}'
                                                            alt='meal' width='40' height='40'
                                                            />
                                                        <div class="text-md-start text-center trip_itinerary_content">
                                                            <h4 class='mb-0 border-bottom border-light-subtle'>Meal</h4>
                                                            <p class='mb-0 font_montserrat'>{{ $itenary->meal }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($itenary->flight)
                                                <div class="col-md-4 mb-3">
                                                    <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                         <img loading="lazy" src='{{ asset('frontend/images/flight.png') }}'
                                                            alt='meal' width='40' height='40'
                                                            />
                                                        <div class="text-md-start text-center trip_itinerary_content">
                                                            <h4 class='mb-0 border-bottom border-light-subtle'>Flight</h4>
                                                            <p class='mb-0 font_montserrat'>{{ $itenary->flight }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($itenary->distance)
                                                <div class="col-md-4 mb-3">
                                                    <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                         <img loading="lazy" src='{{ asset('frontend/images/distance.webp') }}'
                                                            alt='meal' width='40' height='40'
                                                            />
                                                        <div class="text-md-start text-center trip_itinerary_content">
                                                            <h4 class='mb-0 border-bottom border-light-subtle'>Trekking
                                                                Distance</h4>
                                                            <p class='mb-0 font_montserrat'>{{ $itenary->distance }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($itenary->walk)
                                                <div class="col-md-4 mb-3">
                                                    <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                         <img loading="lazy" src='{{ asset('frontend/images/walking.png') }}'
                                                            alt='meal' width='40' height='40'
                                                            />
                                                        <div class="text-md-start text-center trip_itinerary_content">
                                                            <h4 class='mb-0 border-bottom border-light-subtle'>Walking</h4>
                                                            <p class='mb-0 font_montserrat'>{{ $itenary->walk }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif


                                            @if ($itenary->accommodation)
                                                <div class="col-md-4 mb-3">
                                                    <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                         <img loading="lazy" src='{{ asset('frontend/images/accommodation.png') }}'
                                                            alt='meal' width='40' height='40'
                                                            />
                                                        <div class="text-md-start text-center trip_itinerary_content">
                                                            <h4 class='mb-0 border-bottom border-light-subtle'>
                                                                Accommodation</h4>
                                                            <p class='mb-0 font_montserrat'>{{ $itenary->accommodation }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif


                                            @if ($itenary->breakfast)
                                                <div class="col-md-4 mb-3">
                                                    <div class="d-flex flex-md-row flex-column align-items-center gap-2">
                                                         <img loading="lazy" src='{{ asset('frontend/images/breakfast.png') }}'
                                                            alt='meal' width='40' height='40'
                                                            />
                                                        <div class="text-md-start text-center trip_itinerary_content">
                                                            <h4 class='mb-0 border-bottom border-light-subtle'>Breakfast
                                                            </h4>
                                                            <p class='mb-0 font_montserrat'>{{ $itenary->breakfast }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                        <p class="mb-md-5 mb-4"> {{ $itenary->content }}</p>

                                         <img loading="lazy" src="{{ getImageUrl($itenary->thumbnail) }}" class='img-fluid mb-2' />
                                        {{-- <p class='mb-0'>Kathmandu International Airport</p> --}}
                                    </div>
                                @endforeach

                            </div>

                            <div class="card boxShadow p-3 p-md-4 mb-md-5 mb-4 trip_details">
                                <h5 class="mb-md-5 mb-4">Trip cost includes</h5>
                                <div class="mb-md-5 mb-4">
                                    {!! $package->include_exclude !!}
                                    <!-- Add more inclusions here as per your data -->
                                </div>
                                <h5 class="mb-md-5 mb-4">Trip cost excludes</h5>
                                <div class="">
                                    {!! $package->trip_excludes !!}

                                </div>
                            </div>


                            <div>
                                <div id="departDate" class="card boxShadow p-3 p-md-4 mb-md-5 mb-4 bg_lightwhite">
                                    <div class="mb-md-4 mb-3">
                                        <div class="section-header mb-md-1">
                                            <hr class="section-line py-2" />
                                            <p class="section-subtitle">ONGOING TRIPS</p>
                                        </div>
                                        <h2 class='head_title mb-md-3'>JOIN FIXED DEPARTURE TRIPS</h2>
                                    </div>
                                    <div class="d-flex flex-md-row flex-column justify-content-between mb-md-4 mb-3">
                                        <div>
                                            <button class="btn btn_darkprimary rounded-0 py-2 px-4 fw-bold">GROUP
                                                TRIP</button>
                                            <button class="btn staticBackdropBtn btn_darkgray rounded-0 py-2 px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="{{$package->id}}" data-payment="0" data-type="3">PRIVATE
                                                TRIP</button>
                                        </div> <!-- Month/Year Filter -->
                                        <div class="dropdown month_select mb-3">
                                            <button class="btn btn_darkprimary rounded-0 py-2 px-4 fw-bold dropdown-toggle"
                                                type="button" data-bs-toggle="dropdown">
                                                @{{ getMonthName(month) }}, @{{ year }}
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
                                                <button @click="fetchDepartures"
                                                    class="btn btn_darkprimary rounded-0 py-2 px-4 fw-bold">Filter</button>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Table -->
                                    <div class="" v-if="departures.length">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Departure Date</th>
                                                    <th>Status</th>
                                                    <th>Prices</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="departure in departures" :key="departure.id">
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
                                                            <span class="fs-6 font_montserrat fw-bolder text-success">
                                                                $@{{ departure.package.discounted_price }}
                                                            </span>
                                                            <span
                                                                class="ps-2 text-decoration-line-through text-danger small">
                                                                $@{{ departure.package.price }}
                                                            </span>
                                                        </div>
                                                        <div v-else>
                                                            <span class="fs-6 font_montserrat fw-bolder text-success">
                                                                $@{{ departure.package.price }}
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('booknow',['package'=>$package->id,'destination'=>$package->destination_id,'size'=>2]) }}"
                                                                class="btn btn_lightprimary_outline mt-2 rounded-0 px-md-4 py-md-2">JOIN
                                                                US</a>
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

                            <div class="card boxShadow mb-md-5 mb-4" id="reviews">
                                @include('frontend.inc.testimonial', [
                                    'testimonials' => $package->testimonials()->where('status', 1)
    ->whereRaw('(LENGTH(content) - LENGTH(REPLACE(content, " ", "")) + 1) < 60')
    ->orderByRaw('(LENGTH(content) - LENGTH(REPLACE(content, " ", "")) + 1) DESC')
     ->limit(5)
      ->get(),
                                ])
                            </div>

                            <div class="card boxShadow p-3 p-md-4 mb-md-5 mb-4 bg_lightwhite trip_details" id="faqs">
                                <h5 class='mb-md-4 mb-3'>FAQs</h5>
                                <div class="faqs_accordion lightwhite">
                                    <div class="accordion" id="faqAccordion">
                                        @foreach ($package->faqs as $faq)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                                    <button class="accordion-button accordion_button_title py-4"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $faq->id }}"
                                                        aria-expanded="true" aria-controls="collapse{{ $faq->id }}">
                                                        {{ $faq->question }}
                                                    </button>
                                                </h2>
                                                <div id="collapse{{ $faq->id }}"
                                                    class="accordion-collapse collapse {{ $loop->iteration == 1 ? 'show' : '' }}"
                                                    aria-labelledby="heading{{ $faq->id }}"
                                                    data-bs-parent="#faqAccordion">
                                                    <div class="accordion-body">
                                                        <p
                                                            class="accordion_body_content text_lightDark font_montserrat mb-0">
                                                            {{ $faq->answer }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ps-md-4 order-md-2 order-1">
                            @php
                            $price = $package->price;
                            $discounted = $package->discounted_price;
                            $d_percent=(int) ($discounted/$price)*100
                        @endphp
                                <div class="card boxShadow border-0 p-3 p-md-4 w-100 mb-md-5 mb-4"
                                    style="max-width: 400px;">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p class="mb-0 fs_18 fw-bold">All Inclusive Cost</p>
                                        @if ($d_percent>0)

                                        <p
                                            class="mb-0 bg-danger bg-opacity-10 text-danger rounded-3 px-3 py-2 small fw-bold">
                                            -{{$d_percent}}%
                                        </p>
                                        @endif

                                    </div>


                                    <p class="mb-md-4 mb-3 fw-bold font_montserrat text-nowrap">
                                        US
                                        @if ($discounted && $discounted < $price)
                                            <span class="fs_18 fw-bolder text-success">${{ $discounted }}</span>
                                            <span class="text-black text-decoration-line-through ms-2">
                                                <span class="text-danger">${{ $price }}</span> per
                                            </span>
                                            person
                                        @else
                                            <span class="fs_18 fw-bolder text_darkprimary">${{ $price }}</span> per
                                            person
                                        @endif
                                    </p>

                                    <div class="">
                                        <div>
                                            <!-- Form Starts -->
                                            <form action="{{ route('booknow') }}">
                                                <input type="hidden" name="package" value="{{ $package->id }}">
                                                <input type="hidden" name="destination"
                                                    value="{{ $package->destination_id }}">

                                                <label class="form-label">Pick Your Private Date</label>
                                                <div class="position-relative">
                                                    <input type="date" name="departure_date"
                                                        class="form-control outline-0" required
                                                        min="{{ date('Y-m-d') }}">
                                                </div>

                                                <!-- Group Size -->
                                                <div class="my-4">
                                                    <label class="form-label">Group Size</label>
                                                    <div class="input-group outline-0">
                                                        <button type="button" class="btn border outline-0"
                                                            @click="decreaseGroupSize">-</button>
                                                        <input type="number" name="size"
                                                            class="form-control outline-0 text-center" v-model="groupSize"
                                                            readonly>
                                                        <button type="button" class="btn border outline-0"
                                                            @click="increaseGroupSize">+</button>
                                                    </div>
                                                </div>

                                                <!-- Total Price -->
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6>Total Price</h6>
                                                    <span class="text_darkprimary fs-5 fw-bolder">US
                                                        $@{{ totalPrice }}</span>
                                                </div>

                                                <a href="{{ route('booknow',['package'=>$package->id,'destination'=>$package->destination_id,'size'=>2]) }}"
                                                    class="btn bg_darkprimary w-100 rounded-0 py-2 px-4 fw-bold fs-6 mt-3 mt-md-0">BOOK
                                                    A TRIP</a>
                                            </form>
                                            <!-- Form Ends -->

                                        </div>


                                        <div class="mt-3 text-md-start text-center">
                                            <p class="text-muted small font_montserrat mb-1">Got Queries? We’re at your
                                                service</p>
                                            <a target="_blank" href="https://api.whatsapp.com/send?phone=9779802342081"
                                                class="d-flex text-decoration-none justify-content-md-start justify-content-center">
                                                 <img loading="lazy" src="{{ asset('frontend/images/whatsapp.png') }}" alt="whatsapp"
                                                    width="24" height="24">
                                                <p class="text-muted  fs-6 fw-bold font_montserrat ms-2">+977-9802342081
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-sticky mb-md-5 mb-4" style="top: -40px;">
                                <div class="card position-relative text-white  boxShadow"
                                    style=" background-image: url('./images/touchformBanner.png'); background-size: cover; background-position: center; min-height: auto; ">
                                    <!-- Background Overlay -->
                                    <div class="position-absolute top-0 start-0 w-100 h-100 z-1"
                                        style="background-color: #2169A7; opacity: 0.75;"></div>

                                    <!-- Content - Responsive Padding -->
                                    <div class="position-relative z-3 p-4">
                                        <p class="mb-2 fs-5 fw-bold">Get in Touch</p>
                                        <p class="font_montserrat fs-6 mb-md-2 mb-2">
                                            We’d love to hear from you. Please fill out this form.
                                        </p>

                                        <form action="{{ route('contactus.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="page" value="package-detail">

                                            <!-- First Name -->
                                            <div class="mb-md-3 mb-3">
                                                <label for="firstName" class="form-label fs-6 fw-bold">
                                                    First Name <span class="text_darkOrange">*</span>
                                                </label>
                                                <input type="text" class="form-control py-2 text-muted fs-6"
                                                    id="firstName" placeholder="First Name" name="first_name" required />
                                                @error('first_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Last Name -->
                                            <div class="mb-md-3 mb-3">
                                                <label for="lastName" class="form-label fs-6 fw-bold">
                                                    Last Name <span class="text_darkOrange">*</span>
                                                </label>
                                                <input type="text" class="form-control py-2 text-muted fs-6"
                                                    id="lastName" placeholder="Last Name" name="last_name" required />
                                                @error('last_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Email -->
                                            <div class="mb-md-3 mb-3">
                                                <label for="email" class="form-label fs-6 fw-bold">
                                                    Email <span class="text_darkOrange">*</span>
                                                </label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Email" name="email" required />
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Phone Number -->
                                            <div class="mb-md-3 mb-3">
                                                <label for="phone" class="form-label fs-6 fw-bold">
                                                    Phone Number <span class="text_darkOrange">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <input type="text" id="phone" class="form-control"
                                                        placeholder="+977 12345678" name="phone" required />
                                                </div>
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Message -->
                                            <div class="mb-md-3 mb-3">
                                                <label for="message" class="form-label fs-6 fw-bold">
                                                    Message <span class="text_darkOrange">*</span>
                                                </label>
                                                <textarea id="message" rows="1" class="form-control"
                                                    placeholder="Write your message here..." name="message" required></textarea>
                                                @error('message')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Privacy Policy Checkbox -->
                                            <div class="mb-md-2 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input rounded-0" type="checkbox"
                                                        id="privacyCheck" />
                                                    <label class="form-check-label small font_montserrat" for="privacyCheck">
                                                        You agree to our friendly
                                                        <a target="_blank" href="/privacy-policy"
                                                            class="text-decoration-underline fw-bold" style="color: rgb(255, 190, 49)">
                                                            privacy policy.
                                                        </a>
                                                    </label>
                                                </div>

                                                {!! app('captcha')->display() !!}
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span class="help-block text-danger">
                                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <!-- Submit Button -->
                                            <div>
                                                <button class="btn btn_darkprimary fs-6 font_montserrat w-100 py-3 rounded-0">
                                                    SEND MESSAGE
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- SPECIAL OFFERS -->
        <section class="position-relative"
            style="
        background-image: url('{{ asset('frontend/images/specialoffer_banner.png') }}');
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
                                    <button
                                        class="btn btn_darkprimary rounded-0 px-md-3 py-md-3 fw-semibold email_signup_btn"
                                        type="button">
                                        SIGN UP NOW
                                    </button>
                                </div>
                            </div>

                            <!-- Description -->
                            <p class="text_lightwhite mb-0 fw-medium font_montserrat mx-auto mx-md-0"
                                style="max-width: 700px;">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                                tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        @if (count($package->featuredPackage))

        <!-- recent tripes -->
        <section class="mt-5 ">
            <div class="container">
                <div class="d-flex justify-content-center text-center">
                    <div>
                        <div class="section-header mb-md-1 d-flex justify-content-center">
                            <hr class="section-line py-2">
                            <p class="section-subtitle">EXOLORE GREAT PLACES</p>
                        </div>
                        <h2 class='head_title mb-md-3'>RELATED TRIPS</h2>
                        <p class='text_lightDark font_montserrat mb-0' style="max-width: 800px;">
                           Whether you're looking to explore nearby regions, extend your journey, or try a different trekking experience, these carefully curated trips are perfect companions to your current itinerary.
                        </p>
                    </div>
                </div>

                <!-- Splide Slider -->
                <div class="recent_posts_slider position-relative mt-4">
                    <div class="splide" id="recentPostsSlider" style="height: 470px;">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($package->featuredPackage()->limit(5)->get() as $package)
                                    <li class="splide__slide">
                                            @include('frontend.inc.package-card', ['package' => $package])
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                </div>

                {{-- <div class="text-center">
                    <a href="{{ route('destination', ['url' => 'nepal']) }}"
                        class="btn btn_darkprimary destination-button">VIEW ALL POSTS</a>
                </div> --}}
            </div>
        </section>
        @endif

    </section>


    @include('frontend.inc.contactus')
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('frontend/style/listDetail.css') }}">
    <style>
        .overview img,.outline img,.detail_itinerary img{
            max-width: 100%!important;
        }
        .table th,
        .table td {
            background: transparent !important;
        }

        .table th {
            text-transform: uppercase;
        }
    </style>
@endpush

@push('script')


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
                    month: {{ $month }},
                    year: {{ $year }},
                    id: {{ $package->id }},
                    departures: [],
                    years: (() => {
                        const y = new Date().getFullYear();
                        return [y, y + 1, y + 2];
                    })(),

                    // New - for form
                    selectedDate: '',
                    groupSize: 1,
                    basePrice: {{ $discounted ?? $price }}, // fallback if not set
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
                fetchDepartures() {
                    axios.get(`{{ env('APP_URL') }}/departure-date?id=${this.id}&month=${this.month}&year=${this.year}`)
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
