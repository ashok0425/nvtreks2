@extends('frontend.layout.master')
@section('title')
    Destination in {{ Request::segment(3) }} | Nepal Vision Treks & Expedition
@endsection
@section('descr')
    Visit the beautiful destinations in Nepal, the home of the Himalayas, culture, and natural beauties.
@endsection
@section('keyword')
    Destination
@endsection

@section('url')
    {{ Request::url() }}
@endsection
@php
    define('PAGE', 'destination');
    $num = rand(1, 7);
@endphp
@section('content')
    <main>
        <x-page-header :title="$data->name" :route="route('destination', ['id' => $data->id, 'url' => $data->url])" :img="getImageurl('banners/' . $num . '.webp')" />





        <section class="best-place-destination">
            <div class="container-fluid">
                {{-- <div class="col-12">
                <p>
                    {!! $data->details!!}
                </p>
            </div> --}}
                <div class="heading ">
                    <h2>
                        Best Category
                    </h2>
                </div>
                <div class="row ">
                    @foreach ($categories as $destination)
                        <div class="col-lg-3 col-sm-6 my-2 ">
                            <a href="{{ route('package.category', ['url' => $destination->url]) }}"
                                class="text-decoration-none card ">
                                <div class="card-style-1 ">


                                    <div class="img ">

                                        @if ($destination->image == null)
                                            <img src="{{ getImageurl('frontend/getImageurl(s/tour-1.png') }}"
                                                alt="{{ $destination->name }}" class="img-fluid w-100 w-100">
                                        @else
                                            <img src="{{ getImageurl($destination->image) }}" alt="{{ $destination->name }}"
                                                class="img-fluid w-100">
                                        @endif

                                        <div class="places">
                                            @php
                                                $place = DB::table('packages')
                                                    ->where('category_destination_id', $destination->id)
                                                    ->where('price', '!=', 0)
                                                    ->where('status', 1)
                                                    ->get()
                                                    ->count();

                                            @endphp
                                            {{ $place }} Places
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="place-name custom-fs-25 text-dark custom-fw-700 text-center ">
                                        {{ Str::limit($destination->name, 18) }}
                                    </div>
                                </div>
                            </a>

                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section class="tour-packages ">
            <div class="container-fluid">
                <div class="heading mt-md-5 mt-2">
                    <h2>Tour Packages</h2>
                </div>
                <div class="row">
                    @foreach ($packages as $package)
                        <div class="col-lg-3 col-sm-6 ">
                            @include('frontend.template.card1', ['package' => $package])

                        </div>
                    @endforeach
                    <div class="my-2 py-4"></div>

                </div>
            </div>
        </section>


    </main>

    <div class="container-fluid my-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                {!! $data->details !!}
            </div>
        </div>
    </div>
@endsection
