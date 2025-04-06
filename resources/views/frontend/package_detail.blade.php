@php
    $agent = new \Jenssegers\Agent\Agent();
@endphp
@if ($agent->isMobile())
    @section('title')
        {{ $package->country($country) != null ? $package->country($country)->pivot->mobile_meta_title : $package->mobile_meta_title }}
    @endsection
    @section('descr')
        {{ $package->country($country) != null ? $package->country($country)->pivot->mobile_meta_description : $package->mobile_meta_description }}
    @endsection
    @section('keyword')
        {{ $package->country($country) != null ? $package->country($country)->pivot->mobile_meta_keyword : $package->mobile_meta_keyword }}
    @endsection
@else
    @section('title')
        {{ $package->country($country) != null ? $package->country($country)->pivot->page_title : $package->page_title }}
    @endsection
    @section('descr')
        {{ $package->country($country) != null ? $package->country($country)->pivot->meta_description : $package->meta_description }}
    @endsection
    @section('keyword')
        {{ $package->country($country) != null ? $package->country($country)->pivot->meta_keywords : $package->meta_keywords }}
    @endsection

@endif
@section('img')
    {{ getImageurl($package->thumbnail) }}
@endsection
@section('url')
    {{ Request::url() }}
@endsection

@extends('frontend.layout.master')
@php
    define('PAGE', 'destination');
@endphp
<style>
    .sticky-position {
        position: sticky;
        top: 50px;
    }
    .accordion-button:not(.collapsed){
        background: #fff!important;
        color: #000!important;

    }

    .about-trip .head .nav-link {
        font-weight: 500;
        font-size: 18px;
        color: #fff !important;
    }

    #about_trip {
        position: sticky !important;
        top: 50px !important;
        z-index: 99;
    }

    .about-trip .head .nav-link i {
        font-size: 17px;
    }

    .border_bottom {
        border-bottom: 2px solid rgb(99, 99, 99);
    }

    .about-trip .head .nav-link.active {
        color: rgb(42, 135, 183) !important;
    }

    .about-trip .head {
        background: rgb(42, 135, 183) !important;
    }

    .about-trip ul li {
        outline: none !important;
        border: none;
    }

    .btn_sm {
        /* border-radius: 10px; */
    }

    .at-icon-wrapper {
        width: 38px !important;
        height: 38px !important;
        line-height: 38px !important;

    }

    .at-icon-wrapper svg {
        width: 38px !important;
        height: 38px !important;

    }

    .boder-0 {
        border: 0px !important
    }




    @media only screen and (max-width: 600px) {
        #about_trip {
            top: 0px !important;
        }

    }
</style>

{!! NoCaptcha::renderJs() !!}
@section('content')
    <link rel="alternate" hreflang="en-np" href="{{ url("package-detail/$url") }}" />

    @foreach ($countries as $item)
        <link rel="alternate" hreflang="en-{{ $item->slug }}" href="{{ url("$item->slug/package-detail/$url") }}" />
    @endforeach
    <div class=" px-0 mx-0">
        <main>
            <section class="trip-desc my-3 my-md-0">
                <div class="container">
                    <div class="row">
                        {{-- 1st col staart  --}}
                        <div class="col-md-9 my-1">
                            @php
                                $packages_id = $package->id;
                                $arr = trim($package->country($country) != null ? $package->country($country)->pivot->name : $package->name);
                                // return isset() ? $arr[0] : $string;
                            @endphp
                            {{-- banner section start  --}}
                            <div class="my-2">
                                <h1 class="custom-text-primary custom-fs-25 mb-2">
                                    {{ $package->country($country) != null ? $package->country($country)->pivot->name : $package->name }}
                                </h1>

                                <section class="hero2">
                                    @if (empty($package->thumbnail))
                                        <img data-src="{{ getImageurl('frontend/getImageurl(s/hero4.webp') }}"
                                            class="lazy" alt="cover image" width="2000" height="300">
                                    @else
                                        <img data-src="{{ getImageurl($package->thumbnail) }}" alt="cover image"
                                            class="lazy" width="2000" height="300">
                                    @endif

                                </section>
                            </div>

                            <div class="book-now mx-0 card  shadow-sm bg_secondary  px-5 py-2 d-md-none d-md-block">
                                @if (!empty($package->duration))
                                    <div class="col-12 py-2">
                                        <strong class='my-0 py-0'>Duration</strong>
                                        <p class='my-0 py-0'>{{ $package->duration }} </p>
                                    </div>
                                @endif
                                @if (!empty($package->activity))
                                    <div class="col-12 py-2">
                                        <strong class='my-0 py-0'>Trip Type</strong>
                                        <p class='my-0 py-0'>{{ $package->activity }}</p>
                                    </div>
                                @endif
                                @if (!empty($package->difficulty))
                                    <div class="col-12 py-2">
                                        <strong class='my-0 py-0'>Difficuilty</strong>
                                        <p class='my-0 py-0'>
                                            {{ $package->difficulty }}
                                        </p>
                                    </div>
                                @endif

                                @if (!empty($package->meals))
                                    <div class="col-12 py-2">
                                        <strong class='my-0 py-0'>Meal & Accommodation</strong>
                                        <p class='my-0 py-0'>
                                            {{ $package->meals }}
                                        </p>
                                    </div>
                                @endif

                                @if (!empty($package->group_size))
                                    <div class="col-12 py-2">
                                        <strong class='my-0 py-0'>Group Size</strong>
                                        <p class='my-0 py-0'>
                                            {{ $package->group_size }}
                                        </p>
                                    </div>
                                @endif

                                @if (!empty($package->transport))
                                    <div class="col-12 py-2">
                                        <strong class='my-0 py-0'>Transport</strong>
                                        <p class='my-0 py-0'>
                                            {{ $package->transport }}
                                        </p>
                                    </div>
                                @endif

                                @if (!empty($package->arrival))
                                    <div class="col-12 py-2">
                                        <strong class='my-0 py-0'>Arrival On</strong>
                                        <p class='my-0 py-0'>
                                            {{ $package->arrival }}
                                        </p>
                                    </div>
                                @endif


                                @if (!empty($package->departure_from))
                                    <div class="col-12 py-2">
                                        <strong class='my-0 py-0'>Departure From</strong>
                                        <p class='my-0 py-0'>
                                            {{ $package->departure_from }}
                                        </p>
                                    </div>
                                @endif


                                @if (!empty($package->operation))
                                    <div class="col-12 py-2">
                                        <strong class='my-0 py-0'>Operation</strong>
                                        <p class='my-0 py-0'>
                                            {{ $package->operation }}
                                        </p>
                                    </div>
                                @endif

                                @if (!empty($package->route_detail))
                                    <div class="col-12 py-2">
                                        <strong class='my-0 py-0'>Route Detail</strong>
                                        <p class='my-0 py-0'>
                                            {{ $package->route_detail }}
                                        </p>
                                    </div>
                                @endif


                                @if (!empty($package->best_month))
                                    <div class="col-12 py-2">
                                        <strong class='my-0 py-0'>Best Month</strong>
                                        <p class='my-0 py-0'>
                                            {{ $package->best_month }}
                                        </p>
                                    </div>
                                @endif



                                <div class="col-12 py-2">
                                    <strong class='my-0 py-0'>Review</strong>
                                    <p class='my-0 py-0'>
                                    <div class="rating">
                                        @for ($i = 1; $i <= $package->rating; $i++)
                                            <i class="fas fa-star text-warning"></i>
                                        @endfor
                                        @for ($i = 1; $i <= 5 - $package->rating; $i++)
                                            <i class="fas fa-star text-gray"></i>
                                        @endfor
                                    </div>
                                    </p>
                                </div>

                                @if ($package->country($country) !== null && $package->country($country)->pivot->price != null)
                                    @if (!empty($package->discounted_price))
                                        <div class="col-12 py-2">

                                            <strong class='my-0 py-0'> Price</strong>
                                            <strong class='my-0 py-0 custom-fs-25 custom-fw-700'>
                                                {{ $package->country($country)->pivot->currency }}<span
                                                    class="text-danger "><s>
                                                        {{ $package->country($country)->pivot->price }}</s> </span>

                                                <span class="text-success">
                                                    {{ $package->country($country)->pivot->offer_price }}
                                                </span>
                                            </strong>
                                        </div>
                                    @else
                                        <div class="col-12 py-2">

                                            <strong class='my-0 py-0'>Price</strong>

                                            <span class="custom-text-primary">
                                                <strong class="text-dark custom-fs-25 custom-fw-700">

                                                    {{ $package->country($country)->pivot->currency }}
                                                    {{ $package->country($country)->pivot->price }}
                                                </strong>
                                                Per Person</span>

                                        </div>
                                    @endif
                                @else
                                    @if (!empty($package->discounted_price))
                                        <div class="col-12 py-2">

                                            <strong class='my-0 py-0'> Price</strong>
                                            <strong class='my-0 py-0 custom-fs-25 custom-fw-700'>
                                                US <span class="text-danger "><s>${{ $package->price }}</s> </span>

                                                <span class="text-success">${{ $package->discounted_price }} </span>
                                            </strong>
                                        </div>
                                    @else
                                        <div class="col-12 py-2">

                                            <strong class='my-0 py-0'>Price</strong>

                                            <span class="custom-text-primary">
                                                <strong class="text-dark custom-fs-25 custom-fw-700">

                                                    USD ${{ $package->price }}
                                                </strong>
                                                Per Person</span>

                                        </div>
                                    @endif
                                @endif



                                <div class="row">
                                    <div class="col-md-12 col-12 py-2">
                                        <a class="btn btn-primary w-100"
                                            href="{{ route('booknow', ['url' => $package->url, 'cu' => $package->country($country) != null ? $package->country($country)->pivot->currency : 'USD']) }}">Book
                                            Now</a>
                                    </div>
                                </div>

                            </div>
                            <div class="d-none d-md-block">

                                <table class="table table-bordered table-geninfo mb-0  w-100">
                                    <tbody>
                                        @if ($package->activity || $package->fitness_level)
                                            <tr>
                                                @if ($package->activity)
                                                    <td> <i class="fas fa-map"></i> <strong>Activities:</strong></td>
                                                    <td>{{ $package->activity }}</td>
                                                @endif
                                                @if ($package->fitness_level)
                                                    <td> <i class="fas fa-heartbeat"></i> <strong>Fitness Level:</strong>
                                                    </td>
                                                    <td>{{ $package->fitness_level }}</td>
                                                @endif
                                            </tr>
                                        @endif
                                        <tr>
                                            @if ($package->max_altitude)
                                                <td> <i class="fas fa-signal"></i> <strong>Max Elevation:</strong></td>
                                                <td>{{ $package->max_altitude }}</td>
                                            @endif
                                            @if ($package->transport)
                                                <td> <i class="fas fa-bus"></i> <strong>Transportation:</strong></td>
                                                <td>{{ $package->transport }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            @if ($package->best_month)
                                                <td> <i class="fas fa-calendar"></i> <strong>Best Month:</strong></td>
                                                <td>{{ $package->best_month }}</td>
                                            @endif
                                            @if ($package->group_size)
                                                <td> <i class="fas fa-users"></i> <strong>Group Size:</strong></td>
                                                <td>{{ $package->group_size }}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            @if ($package->arrival)
                                                <td> <i class="fas fa-location-arrow"></i> <strong>Arrival on:</strong></td>
                                                <td>{{ $package->arrival }}</td>
                                            @endif
                                            @if ($package->departure_from)
                                                <td> <i class="fas fa-space-shuttle"></i> <strong>Departure from:</strong>
                                                </td>
                                                <td>{{ $package->departure_from }}</td>
                                            @endif
                                        </tr>
                                        @if ($package->meals)
                                            <tr>
                                                <td class="border-top-0"> <i class="fas fa-utensils"></i>
                                                    <strong>Meal:</strong>
                                                </td>
                                                <td class="border-top-0">{{ $package->meals }}</td>

                                                <td class="border-top-0"> <i class="fas fa-clock"></i>
                                                    <strong>Duration:</strong>
                                                </td>
                                                <td class="border-top-0">{{ $package->duration }}</td>


                                            </tr>
                                        @endif
                                        <tr>
                                            @if ($package->room)
                                                <td class="border-top-0"> <i class="fas fa-bed"></i>
                                                    <strong>Accommodation:</strong>
                                                </td>
                                                <td class="border-top-0">{{ $package->room }}</td>
                                            @endif

                                            <td class="border-top-0"> <i class="fas fa-comments-dollar"></i>
                                                <strong>Price:</strong>
                                            </td>
                                            <td class="border-top-0  ">
                                                @if ($package->country($country) != null && $package->country($country)->pivot->price != null)
                                                    <sub><small class="custom-fs-16">
                                                            {{ $package->country($country)->pivot->currency }}</small>
                                                    </sub>
                                                    <strong class="custom-fs-22 ">
                                                        {{ $package->country($country)->pivot->offer_price ? $package->country($country)->pivot->offer_price : $package->country($country)->pivot->price }}</strong>
                                                @else
                                                    <sub><small class="custom-fs-16">USD</small> </sub>
                                                    <strong class="custom-fs-22 ">
                                                        {{ $package->discounted_price ? $package->discounted_price : $package->price }}</strong>
                                                @endif

                                                <sub> <small class="custom-fs-16">per person</small></sub></strong>
                                            </td>

                                        </tr>


                                    </tbody>
                                </table>
                            </div>

                            {{-- banner section End  --}}

                            {{-- we accept section start --}}
                            <div class="my-2 card  shadow-sm bg_secondary  p-3 pb-2 d-block d-md-none">
                                <div class="row">
                                    <div class="col-md-8">
                                        <strong class="custom-fs-18">All inclusive cost</strong>
                                        @if ($package->country($country) !== null && $package->country($country)->pivot->price != null)
                                            <strong
                                                class="custom-fs-19"><sub>{{ $package->country($country)->pivot->currency }}</sub>
                                                <strong class="custom-fs-25">
                                                    {{ $package->country($country)->pivot->offer_price ? $package->country($country)->pivot->offer_price : $package->country($country)->pivot->price }}</strong>
                                                <sub>per person</sub></strong>
                                        @else
                                            <strong class="custom-fs-19"><sub>USD</sub> <strong class="custom-fs-25">
                                                    {{ $package->discounted_price ? $package->discounted_price : $package->price }}</strong>
                                                <sub>per person</sub></strong>
                                        @endif

                                        <div>

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <img src="{{ getImageurl('best_price.png') }}" alt="Bes price"
                                            class="img-fluid">

                                    </div>
                                    <div class="col-12 mt-3">
                                        <p class="border_bottom text-center custom-fs-16  custom-fw-700 w-75 m-auto">We
                                            support online payment</p>


                                        <p class="mt-2 mb-0 custom-fs-14">
                                            <span><i class="fas fa-edit custom-text-primary"></i> Customize this trip as
                                                per
                                                your need.</span>
                                        </p>
                                        <p class="mt-1 mb-0 custom-fs-14">
                                            <span><i class="fas fa-users custom-text-primary"></i> Big groups are adjusted
                                                accordingly.</span>
                                        </p>

                                        <p class="mt-1 mb-0 custom-fs-14">
                                            <span><i class="fas fa-tag custom-text-primary"></i> Adjust your budget
                                                depending on your need.</span>
                                        </p>




                                        <p class="mt-1 mb-0 custom-fs-14">
                                            <span><i class="fas fa-calendar custom-text-primary"></i> You can schedule your
                                                own departure dates.</span>
                                        </p>



                                        <div class="col-md-12 col-12 mt-3">
                                            <a class="btn btn-primary w-100"
                                                href="{{ route('booknow', ['url' => $package->url, 'cu' => $package->country($country) != null ? $package->country($country)->pivot->currency : 'USD']) }}">Book
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- we accept section end --}}

                            {{-- Enquiry form start --}}
                            <div class="card  shadow-sm bg_secondary  sticky-div   py-0 d-block d-md-none">
                                <div class="card-header border-white custom-bg-primary">
                                    <p class="mb-0 text-white custom-fw-500 ">Send us your queries or requests:</p>
                                </div>
                                <div class="card-body py-1">
                                    <form action="{{ route('enquery.post') }}" method="post" id="demo-form">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $package->id }}" name="booking">
                                        <input type="hidden"
                                            value="{{ $package->country($country) != null ? $package->country($country)->pivot->name : $package->name }}"
                                            name="package_name">

                                        <input type="hidden" value="1" name="no_participants">
                                        <input type="hidden" value="1" name="agent">
                                        <input type="hidden" value="{{ date('d-m-Y') }}" name="expected_date">


                                        <div class="row">
                                            <div class="col-12 my-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Full Name" name="name" required />
                                                </div>
                                            </div>
                                            <div class="col-12 my-2">
                                                <div class="form-group">
                                                    <input type="email" class="form-control"
                                                        placeholder="Enter Email Address" name="email" required />
                                                </div>
                                            </div>

                                            <div class="col-12 my-2">
                                                <div class="form-group">
                                                    <input type="number" class="form-control"
                                                        placeholder="Enter Phone Number" name="phone" required />
                                                </div>
                                            </div>

                                            <div class="col-12 my-2">
                                                <div class="form-group">
                                                    <textarea name="comment" class="form-control" placeholder="Enter your message" id="message" required></textarea>

                                                </div>
                                            </div>
                                            <div class="col-12 mt-2">
                                                {!! app('captcha')->display() !!}
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span class="help-block text-danger">
                                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                    </span>
                                                @endif
                                                <p>
                                                    <i>Your information will never be shared with anyone outside our
                                                        company. </i>
                                                </p>
                                                <div class="form-group mb-0 text-left">
                                                    <button type="submit" class="btn btn-primary  btn-sm"
                                                        data-callback='onSubmit' data-action='submit'>Enquire Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- Enquiry form end  --}}

                            <div>
                                <div class="about-trip" id="about_trip">
                                    <div class="head">
                                        <ul class="nav nav-tabs d-flex justify-content-around">
                                            <li class="nav-item">
                                                <a class="nav-link " href="#home">
                                                    Overview

                                                    <i class="fas fa-binoculars"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item " role="presentation">
                                                <a class="nav-link  font-weight-700 " href="#profile" role="tab">
                                                    Itinerary

                                                    <i class="fas fa-map-marker"></i>
                                                </a>
                                            </li>

                                            <li class="nav-item " role="presentation">
                                                <a class="nav-link  font-weight-700" href="#datePrice">

                                                    Departure Date
                                                    <i class="fas fa-calendar"></i>
                                                </a>
                                            </li>

                                            @if (!empty($package->faq))
                                                <li class="nav-item " role="presentation">
                                                    <a class="nav-link  font-weight-700" href="#faq">
                                                        Faq
                                                        <i class="fas fa-question"></i>
                                                    </a>
                                                </li>
                                            @endif



                                            @if (!empty($package->equiment))
                                                <li class="nav-item " role="presentation">
                                                    <a class="nav-link  font-weight-700 " data-bs-toggle="tab"
                                                        href="#equiment">Equiment

                                                        <i class="fab fa-wrench"></i>
                                                    </a>
                                                </li>
                                            @endif

                                            <li class="nav-item " role="presentation">
                                                <a class="nav-link  font-weight-700" href="#review"> Review
                                                    <i class="fas fa-comment"></i>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div id="home">
                                    <h2 class="custom-text-primary mt-5">Overview
                                    </h2>
                                    <div class="mt-2">
                                        {!! $package->country($country) != null ? $package->country($country)->pivot->overview : $package->overview !!}
                                        {!! $package->country($country) != null
                                            ? $package->country($country)->pivot->outline_itinerary
                                            : $package->outline_itinerary !!}
                                        {!! $package->country($country) != null
                                            ? $package->country($country)->pivot->include_exclude
                                            : $package->include_exclude !!}
                                        {!! $package->country($country) != null
                                            ? $package->country($country)->pivot->trip_excludes
                                            : $package->trip_excludes !!}
                                    </div>
                                </div>

                                <div class="routemap my-4">
                                    @if ($package->map_title)
                                        <h3 class="custom-text-primary">{{ $package->map_title }}</h3>
                                        <img src="{{ getImageurl($package->routemap) }}" alt="{{ $package->map_title }}"
                                            class="img-fluid">
                                    @endif
                                </div>

                                <div id="profile">
                                    <h2 class="custom-text-primary mt-5">Itinerary
                                    </h2>
                                    <div class="mt-2">

                                        @php
                                            $itenary = $package->detailed_itinerary;
                                        @endphp
                                        @if ($package->country($country) != null)
                                            $itenary=$package->country($country)->pivot->detailed_itinerary;
                                        @endif

                                        @php
                                            $itenaries = explode('#@#', $itenary);
                                            $i = 1;
                                        @endphp
                                        <div class="">

                                            <div class="accordion bg-transparent" id="accordionExample">
                                                @foreach ($itenaries as $key => $itenary)
                                                    @if ($key != 0)
                                                        <div class="accordion-item mb-1">
                                                            @if ($key % 2 != 0)
                                                                <h2 class="accordion-header"
                                                                    id="heading{{ $key + 1 }}">
                                                                    <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse{{ $key + 1 }}"
                                                                        aria-expanded="true"
                                                                        aria-controls="collapse{{ $key + 1 }}">
                                                                        {!! strip_tags($itenary) !!}
                                                                    </button>
                                                                </h2>
                                                            @else
                                                                <div id="collapse{{ $key }}"
                                                                    class="accordion-collapse collapse"
                                                                    aria-labelledby="heading{{ $key }}"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body m-0  bg-transparent">
                                                                        {!! strip_tags($itenary) !!}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="routemap my-4">
                                    @if ($package->circuit_image)
                                        <h3 class="custom-text-primary"> {{ $package->circuit_title }}</h3>
                                        <img src="{{ getImageurl($package->circuit_image) }}"
                                            alt="{{ $package->circuit_title }}" class="img-fluid">
                                    @endif
                                </div>

                                @if (!empty($package->faq))
                                    <div id="faq">
                                        <h2 class="custom-text-primary mt-5">FAQ
                                        </h2>
                                        <div class="mt-2">
                                            @php
                                                $faq = $package->faq;
                                            @endphp
                                            @if ($package->country($country) != null)
                                                $faq=$package->country($country)->pivot->faq;
                                            @endif

                                            @php
                                                $faqs = explode('#@#', $faq);
                                                $i = 1;
                                            @endphp
                                            <div class="">

                                                <div class="accordion bg-transparent" id="accordionExample">
                                                    @foreach ($faqs as $key => $faq)
                                                        @if ($key != 0)
                                                            <div class="accordion-item mb-1">
                                                                @if ($key % 2 != 0)
                                                                    <h2 class="accordion-header"
                                                                        id="heading{{ $key + 1 }}">
                                                                        <button class="accordion-button collapsed" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapse{{ $key + 1 }}"
                                                                            aria-expanded="true"
                                                                            aria-controls="collapse{{ $key + 1 }}">
                                                                            {!! strip_tags($faq) !!}
                                                                        </button>
                                                                    </h2>
                                                                @else
                                                                    <div id="collapse{{ $key }}"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="heading{{ $key }}"
                                                                        data-bs-parent="#accordionExample">
                                                                        <div class="accordion-body m-0  bg-transparent">
                                                                            {!! strip_tags($faq) !!}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($package->equiment)
                                    <div id="equiment">
                                        <h2 class="custom-text-primary mt-5">Equiment
                                        </h2>
                                        <div class="mt-2">
                                            {!! $package->equiment !!}
                                        </div>
                                    </div>
                                @endif
                                <div id="datePrice">
                                    <h2 class="custom-text-primary mt-5">Departure Date
                                    </h2>
                                    <strong class="mt-2">Departure dates for {!! $package->country($country) != null ? $package->country($country)->pivot->name : $package->name !!}</strong>
                                    <p>We provide a series of fixed departure trek, tour and expeditions in Nepal, Bhutan,
                                        Tibet and India. If you are single and wishing to be with a group, you can join our
                                        fixed departure schedule. If the schedule dates are not convenient for you, contact
                                        us & let us know; we are more than happy to customize our trips to suit your needs.
                                        If any individuals or group doesn’t want to join with our other group, we can
                                        operate as per your wish and requirement. We are ground operator of these Himalayan
                                        destination and able to arrange your trip as per your interested date and choice.
                                    </p>
                                    <form>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>Check out all the available dates</p>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6 col-lg-4">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">
                                                                <i class="fa mx-1 fa-calendar  custom-text-primary"></i>
                                                            </span>
                                                            <select class="form-control select-year"
                                                                aria-describedby="basic-addon1">
                                                                <option value="{{ date('Y') }}">Select Dates</option>
                                                                <option value="{{ date('Y') }}" selected>
                                                                    {{ date('Y') }}
                                                                </option>
                                                                <option value="{{ date('Y') + 1 }}">{{ date('Y') + 1 }}
                                                                </option>
                                                                <option value="{{ date('Y') + 2 }}">{{ date('Y') + 2 }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-lg-4">
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="basic-addon2">
                                                                <i class="fa mx-1 fa-calendar  custom-text-primary"></i>
                                                            </span>
                                                            <select class="form-control" id="select-month"
                                                                aria-describedby="basic-addon2">
                                                                <option value="1">Jan</option>
                                                                <option value="2">Feb</option>
                                                                <option value="3">Mar</option>
                                                                <option value="4">Apr</option>
                                                                <option value="5">May</option>
                                                                <option value="6">June</option>
                                                                <option value="7">July</option>
                                                                <option value="8">Aug</option>
                                                                <option value="9">Sep</option>
                                                                <option value="10">Oct</option>
                                                                <option value="11">Nov</option>
                                                                <option value="12">Dec</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">Start Date</th>
                                                <th scope="col">Finish Date</th>
                                                <th scope="col">Availability</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="ajaxloadmoredeparture">
                                        </tbody>
                                    </table>
                                </div>

                                <div id="review" class="mt-5">

                                    @include('frontend.template.package_detail_testimonial')
                                </div>

                                @if(count($package->gallery))
                                <div class="mt-5">
                                    @include('frontend.template.gallery')
                                </div>
                                @endif
                            </div>
                        </div>


                        {{-- 1st col end  --}}

                        {{-- 1st col staart  --}}
                        <div class="col-md-3 px-md-0 mx-md-0 my-5 ">
                            <div class="mt-1"></div>
                            {{-- we accept section start --}}
                            <div class="my-2  card  shadow-sm bg_secondary  p-3 pb-2 d-none d-md-block">
                                <div class="row">
                                    <div class="col-md-8">
                                        <strong class="custom-fs-18">All inclusive cost</strong>
                                        @if ($package->country($country) !== null && $package->country($country)->pivot->price != null)
                                            <strong
                                                class="custom-fs-19"><sub>{{ $package->country($country)->pivot->currency }}</sub>
                                                <strong class="custom-fs-25">
                                                    {{ $package->country($country)->pivot->offer_price ? $package->country($country)->pivot->offer_price : $package->country($country)->pivot->price }}</strong>
                                                <sub>per person</sub></strong>
                                        @else
                                            <strong class="custom-fs-19"><sub>USD</sub> <strong class="custom-fs-25">
                                                    {{ $package->discounted_price ? $package->discounted_price : $package->price }}</strong>
                                                <sub>per person</sub></strong>
                                        @endif
                                        <div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ getImageurl('best_price.png') }}" alt="Bes price"
                                            class="img-fluid">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <p class="border_bottom text-center custom-fs-16  custom-fw-700 w-75 m-auto">We
                                            support online payment</p>
                                        <p class="mt-2 mb-0 custom-fs-14">
                                            <span><i class="fas fa-edit custom-text-primary"></i> Customize this trip as
                                                per your need.</span>
                                        </p>
                                        <p class="mt-1 mb-0 custom-fs-14">
                                            <span><i class="fas fa-users custom-text-primary"></i> Big groups are adjusted
                                                accordingly.</span>
                                        </p>
                                        <p class="mt-1 mb-0 custom-fs-14">
                                            <span><i class="fas fa-tag custom-text-primary"></i> Adjust your budget
                                                depending on your need.</span>
                                        </p>
                                        <p class="mt-1 mb-0 custom-fs-14">
                                            <span><i class="fas fa-calendar custom-text-primary"></i> You can schedule your
                                                own departure dates.</span>
                                        </p>
                                        <div class="col-md-12 col-12 mt-3">
                                            <a class="btn btn-primary w-100"
                                                href="{{ route('booknow', ['url' => $package->url, 'cu' => $package->country($country) != null ? $package->country($country)->pivot->currency : 'USD']) }}">Book
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- we accept section end --}}

                            <div class="sticky-position">
                                {{-- Enquiry form start --}}
                                <div class="card  shadow-sm bg_secondary  sticky-div   py-0 d-none d-md-block">
                                    <div class="card-header border-white custom-bg-primary">
                                        <p class="mb-0 text-white custom-fw-500 ">Send us your queries or requests:</p>
                                    </div>
                                    <div class="card-body py-1">
                                        <form action="{{ route('enquery.post') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $package->id }}" name="booking">
                                            <input type="hidden"
                                                value="{{ $package->country($country) != null ? $package->country($country)->pivot->name : $package->name }}"
                                                name="package_name">
                                            <input type="hidden" value="1" name="no_participants">
                                            <input type="hidden" value="1" name="agent">
                                            <input type="hidden" value="{{ date('d-m-Y') }}" name="expected_date">
                                            <div class="row">
                                                <div class="col-12 my-2">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Full Name" name="name" required />
                                                    </div>
                                                </div>
                                                <div class="col-12 my-2">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control"
                                                            placeholder="Enter Email Address" name="email" required />
                                                    </div>
                                                </div>

                                                <div class="col-12 my-2">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control"
                                                            placeholder="Enter Phone Number" name="phone" required />
                                                    </div>
                                                </div>

                                                <div class="col-12 my-2">
                                                    <div class="form-group">
                                                        <textarea name="comment" class="form-control" placeholder="Enter your message" id="message" required></textarea>

                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    {!! app('captcha')->display() !!}
                                                    @if ($errors->has('g-recaptcha-response'))
                                                        <span class="help-block text-danger">
                                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                        </span>
                                                    @endif
                                                    <p>
                                                        <i>Your information will never be shared with anyone outside our
                                                            company. </i>

                                                    </p>
                                                    <div class="form-group mb-0 text-left mt-1">
                                                        <button type="submit" class="btn btn-primary  btn-sm">Enquire
                                                            Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                {{-- Enquiry form end  --}}


                                <div class="card  shadow-sm bg_secondary    my-2 ">
                                    <div class="card-body ">
                                        <div class="d-flex justify-content-around flex-md-row flex-column">
                                            <div class="my-1 mx-1 ">
                                                <a href="#"class=" btn btn-primary  text-decoration-none text-light  d-flex align-items-center justify-content-center"
                                                    data-bs-toggle="modal" data-bs-target="#customize">
                                                    Customize</a>
                                            </div>
                                            <div class="my-1 mx-1">
                                                <a href="{{ route('print', $package->id) }}"
                                                    class=" btn btn-primary   text-decoration-none text-light btn_sm d-flex align-items-center justify-content-center">
                                                    Print </a>
                                            </div>
                                            <div class="my-1 mx-1">
                                                <a href=""
                                                    class=" btn btn-primary   text-decoration-none text-light  d-flex align-items-center justify-content-center copy_link">
                                                    Copy </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- we accept section start --}}
                                <div class="my-2  card">
                                    <strong class="custom-bg-primary text-white custom-fs-19 py-2 px-2"> We Accept</strong>
                                    <div class="p-2">
                                        <img src="{{ getImageurl('weaccept.webp') }}" alt="we accept" class="img-fluid">
                                    </div>
                                </div>
                                {{-- we accept section end --}}

                                {{--  Trip advesior start --}}
                                <div class="my-2  card  shadow-sm bg_secondary  p-3">
                                    <div class="">
                                        <img src="{{ getImageurl('trip2.webp') }}" alt="Trip advisor" class="img-fluid">
                                    </div>
                                    <div class="text">
                                        <p class="mt-2 mb-1 font-weight-400 custom-fs-16">
                                            Speak to one of our travel consultants:
                                        </p>
                                        <p class="mt-2 mb-1 font-weight-400 custom-fs-16">
                                            Call Us (24/7): <strong class="custom-text-primary">
                                                +977-9802342081
                                            </strong>
                                        </p>
                                        <p class="mt-2 mb-1 font-weight-400 custom-fs-16">
                                            WhatsApp (24/7): <strong class="custom-text-primary">
                                                +977-9802342081
                                            </strong>

                                        </p>
                                    </div>
                                </div>
                                {{--  Trip advesior End --}}
                            </div>
                        </div>
                        {{-- 2nd col end  --}}
                    </div>
                </div>
            </section>
            @if (count($features) > 0)
                <section class="packages">
                    <div class="container">
                        <div class="heading my-5">
                            <h2 class='my-0 py-0 custom-fs-22'>Featured Packages</h2>
                        </div>
                        <div class="row">
                            @foreach ($features as $packaged)
                                <div class="col-md-3 col-sm-4">
                                    @include('frontend.template.card1', ['package' => $packaged])
                                </div>
                            @endforeach

                        </div>
                    </div>
                </section>
            @endif
        </main>

        {{-- video Model  --}}
        <!-- Modal -->
        <div class="modal fade border-0" id="video" tabindex="-1" aria-labelledby="videoy" aria-hidden="true">
            <div class="modal-dialog modal-md border-0">
                <div class="modal-content bg-transparent border-0">
                    <div class="modal-header bg-transparent border-0">
                        <button type="button" class="btn-close text-light  text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-transparent">

                        {{-- <div style="width:200px!important;">
                            {!! $package->video !!}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Enquery Model  --}}
        <!-- Modal -->
        <div class="modal fade " id="enquery" tabindex="-1" aria-labelledby="enquery" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <p class="custom-text-18 custom-fw-700 my-0 py-0">Enquire Us</p>
                            <small>
                                Required Field <span class="text-danger">*</span>
                            </small>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        @php
                            $agents = DB::connection('mysql2')
                                ->table('users')
                                ->where('email_verified_at', '!=', null)
                                ->get();
                        @endphp
                        <div class="card-body">
                            <form action="{{ route('enquery.post') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $package->id }}" name="booking">
                                <div class="form-group row my-3">
                                    <div for="tripName" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500">
                                        Full Name<span class="text-danger">*</span>: </div>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter you full name" required>
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <div for="tripName" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500">
                                        Email<span class="text-danger">*</span>: </div>
                                    <div class="col-md-8">
                                        <input type="text" name="email" class="form-control"
                                            placeholder="Enter your email address" required>
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <div for="tripName" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500">
                                        Phone: </div>
                                    <div class="col-md-8">
                                        <input type="number" name="phone" class="form-control"
                                            placeholder="Mobile Number">
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <div for="tripdate" class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500">
                                        Expected Date:</div>
                                    <div class="col-md-8">

                                        <input type="text" class="form-control" id="datepicker" name="expected_date"
                                            placeholder="Enter date"
                                            @if (!empty($data)) value="{{ $date }}" @endif
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <div for="travellers"
                                        class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500">Number Of
                                        Travellers<span class="text-danger">*</span>:</div>
                                    <div class="col-md-8">

                                        <select name="no_participants" class="form-select form-control" required>
                                            <?php for($i=1; $i<=20; $i++){ ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <div for="travellers"
                                        class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500">How did you find
                                        us?<span class="text-danger">*</span>:</div>
                                    <div class="col-md-8">

                                        <select name="agent" class="form-select form-control" required>
                                            @foreach ($agents as $agent)
                                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row my-3">
                                    <div for="travellers"
                                        class="col-md-4  custom-text-primary custom-fs-18 custom-fw-500">Your Mesage<span
                                            class="text-danger">*</span>:</div>
                                    <div class="col-md-8">

                                        <textarea name="comment" class="form-control" placeholder="Enter your message" id="message" required></textarea>
                                    </div>
                                </div>

                                <div class="mt-2 text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Enquire now</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        {{-- Customization  Model  --}}
        <!-- Modal -->
        <div class="modal fade " id="customize" tabindex="-1" aria-labelledby="customize" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <p class="custom-text-18 custom-fw-700 my-0 py-0">Customize Package</p>
                            <small>
                                Required Field <span class="text-danger">*</span>
                            </small>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        @php
                            $agents = DB::connection('mysql2')
                                ->table('users')
                                ->where('email_verified_at', '!=', null)
                                ->get();
                        @endphp
                        <div class="card-body">
                            <form method="post" action="{{ route('enquery.post') }}" class="non-rounded-form">

                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6 my-2">

                                        <div class="form-group">

                                            <label for="name">Full Name<span class="text-danger">*</span></label>

                                            <input type="text" name="name" class="form-control"
                                                placeholder="Enter your full name" id="name" required>

                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-6 col-md-12 col-lg-6 my-2">
                                        <div class="form-group">
                                            <label for="email">Email<span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control"
                                                placeholder="Enter your email address" id="email" required>
                                        </div>
                                    </div>

                                    @if ($package)
                                        <input type="hidden" name="subject" class="form-control"
                                            placeholder="Enter your subject" id="subject" value="Customize Trip">
                                        <input type="hidden" name="package_name" class="form-control"
                                            placeholder="Enter your subject" id="subject"
                                            value="{{ $package->country($country) != null ? $package->country($country)->pivot->name : $package->name }}">
                                        <div class="col-12 col-sm-6 col-md-12 col-lg-6 my-2 {{-- swapped-element --}}">
                                            <div class="form-group">
                                                <label for="country">Select Country<span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="country" name="country" required>
                                                    <option disabled="disabled" selected="selected"> Select your country
                                                    </option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran (Islamic Republic)">Iran (Islamic Republic)
                                                    </option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Korea (South)">Korea (South)</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libyan Arab Jamahiriy">Libyan Arab Jamahiriy</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Trinidad And Tobago">Trinidad And Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="VietNam">VietNam</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Yugoslavia">Yugoslavia</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6 col-md-12 col-lg-6 my-2 {{-- swapped-element --}}">

                                            <div class="form-group">

                                                <label for="participants">No Of Participants</label>

                                                <input type="number" name="no_participants" class="form-control"
                                                    placeholder="Enter number of participants" id="participants">

                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-6 col-md-12 col-lg-6 my-2 {{-- swapped-element --}}">

                                            <div class="form-group">

                                                <label for="travelDate">Expected Travel Date<span
                                                        class="text-danger">*</span></label>

                                                <input type="text" name="expected_date"
                                                    class="form-control date-picker"
                                                    placeholder="Enter your expected travel date" id="travelDate"
                                                    required>

                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-6 col-md-12 col-lg-6 my-2 {{-- swapped-element --}}">

                                            <div class="form-group">

                                                <label for="contactNumber">Contact Number<span
                                                        class="text-danger">*</span></label>

                                                <input type="text" name="phone" class="form-control"
                                                    placeholder="Enter your contact address" id="contactNumber" required>

                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 my-2 {{-- swapped-element --}}">


                                            <div class="form-group">
                                                <label for="How did you find us?">How did you find us?<span
                                                        class="text-danger">*</span></label>
                                                <select name="agent" class="form-control" required>
                                                    {{--  <option value="Past Traveller">Past Traveller</option>
                <option value="Search Engine">Search Engine</option> --}}
                                                    {{-- <option value="Agent">Agent</option> --}}
                                                    @foreach ($agents as $agent)
                                                        <option value="{{ $agent->id }}">{{ $agent->name }}
                                                        </option>
                                                    @endforeach
                                                    {{-- <option value="Anjan Shrestha">Anjan Shrestha</option> --}}
                                                </select>

                                            </div>

                                        </div>
                                    @endif



                                    <div class="col-12">

                                        <div class="form-group">

                                            <label for="message">Your Message<span class="text-danger">*</span></label>

                                            <textarea name="comment" class="form-control" placeholder="Enter your message" id="message" required></textarea>

                                        </div>

                                    </div>
                                    <input type="hidden" name="booking" value="{{ $package->id }}">
                                    <div class="col-12">

                                        <div class="form-group">

                                            <button type="submit" class="btn btn-primary mt-2">Submit <i
                                                    class="fa fa-paper-plane"></i></button>

                                        </div>

                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <input id="current_url" type="hidden" value="{{ url()->current() }}">



    @endsection

    @push('scripts')
        <script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "Product",
    "name": "Nepal Vision Treks",
    "image": " {{ getImageurl($package->image) }}",
    "description": " {{ $package->descr }}",
    "brand": {
      "@type": "Brand",
      "name": "{{ $package->country($country)!=null ? $package->country($country)->pivot->name: $package->name}}"
    },
    "offers": {
      "@type": "Offer",
      "url": "{{url()->current()}}",
      "priceCurrency": "USD",
      "price": "{{$package->discounted_price?$package->discounted_price:$package->price}}",
      "priceValidUntil": "{{today()->addDay(45)}}",
      "availability": "https://schema.org/InStock",
      "itemCondition": "https://schema.org/NewCondition"
    },
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "5",
      "bestRating": "5",
      "worstRating": "4",
      "ratingCount": "8",
      "reviewCount": "12"
    },
    "review": {
      "@type": "Review",
      "name": "Amazing Experience",
      "reviewBody": "The moment our guides met us at the airport, we knew we made the right choice in choosing Nepal Visions. Everything that happened after that reinforced that Nepal Visions was the best choice, from our first meeting with Chet to the departure dinner at the end. As you can see by this photo above, we became a family. Our guides Kashar and Giri helped us realize a lifelong dream of trekking in the shadow of Mt. Everest. Their expertise in trekking kept us all very healthy so we could enjoy every step. At Nepal Visions – you are treated like family! Albert Lepore EBC Trek - 20 Days: April - May, 2012 7868 S. Hill Drive Littleton, USA Email - al.lepore@aeroastro.com",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5",
        "worstRating": "4"
      },
      "datePublished": "{{today()->subDay(10)}}",
      "author": {"@type": "Person", "name": "Np"},
      "publisher": {"@type": "Organization", "name": "Albert Lepore"}
    }
  }
  </script>


        <script type="text/javascript" src="https://www.viralpatel.net/demo/jquery/jquery.shorten.1.0.js"></script>

        <script>
            $(document).ready(function() {

                $(".comment").shorten({
                    "showChars": 450,
                    "moreText": "See More",
                    "lessText": "See Less",
                });

            });
        </script>



        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript">
            $(function() {

                $("#datepicker").datepicker();
                $("#travelDate").datepicker();


            });
        </script>

        <script>
            function adjustMonths() {
                var thisYear = new Date().getFullYear() + "";
                var thisMonth = new Date().getMonth() + 1 + "";
                var selectedYear = $(".select-year").val();
                if (thisMonth.length == 1) {
                    thisMonth = "0" + thisMonth;
                }

                var yearAndMonth = parseInt(thisYear + thisMonth);

                $('#select-month option').each(function() {

                    var selectMonth = $(this).prop('value');

                    if (selectMonth.length == 1) {
                        selectMonth = "0" + selectMonth;
                    }

                    if (parseInt(selectedYear + selectMonth) < yearAndMonth) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }

                });

                $("#select-month option").prop(':selected', false);

                $('#select-month option').each(function() {
                    if ($(this).css('display') != 'none') {
                        $(this).prop("selected", true);
                        return false;
                    }
                });

            }

            $(document).ready(function() {
                adjustMonths();

                $('.select-year').change(function() {
                    adjustMonths();
                })

            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                ajaxdate();
                $("#select-month, .select-year").change(function(e) {
                    e.preventDefault();
                    $('#ajaxloader').show();
                    // console.log('changed');
                    ajaxdate();
                });

                function ajaxdate() {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('departure') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        data: {
                            packageid: {{ $packages_id }},
                            year: $(".select-year").val(),
                            month: $("#select-month").val()
                        },
                        success: function(data) {
                            $(".ajaxloadmoredeparture").empty();
                            $(".ajaxloadmoredeparture").append(data);
                            $('#ajaxloader').hide();

                        }
                    });
                }
            });
        </script>
    @endpush
    @push('style')
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    @endpush

    @push('scripts')
        <script>
            $('.copy_link').click(function(e) {
                e.preventDefault()

                let copyText = $('#current_url').val()
                const cb = navigator.clipboard;
                cb.writeText(copyText).then(() => alert('Link copied'));


            })
            //         $('.nav-tabs .nav-item').click(function(){
            //             console.log($("#myTabContent").offset());
            //             $([document.documentElement, document.body]).animate({
            //     scrollTop: $("#myTabContent").offset().top
            // }, 100);
            //         })
        </script>
    @endpush
