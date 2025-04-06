@extends('frontend.layout.master')
@section('title')
    Destination in Nepal | Nepal Vision Treks & Expedition
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


<style>
    @media screen and (max-width: 768px) {
        .side-collapse-container {
            width: 100%;
            position: relative;
            left: 0;
            transition: left .4s;
            z-index: 999999999 !important;

        }

        .side-collapse {
            top: 0px;
            bottom: 0;
            left: 0;
            width: 300px;
            position: absolute;
            overflow: hidden;
            transition: width .4s;
            z-index: 999999;
        }

        .side-collapse .navbar-collapse {
            left: 0 !important;
        }

        .side-collapse.in {
            width: 0;
        }
    }

    .mobile_filter .side-collapse .col-12 {
        text-align: left !important
    }

    .mobile_filter .side-collapse .filter {
        position: sticky !important;
    }
</style>

@section('content')
    @if ($data == null)
        <x-page-header title="Trip available for  {{ $keyword }} " route="#" :img="getImageurl('banners/' . $num . '.webp')" />
    @else
        <x-page-header title="Trip available for{{ $data->name }} " route="#" :img="getImageurl('banners/' . $num . '.webp')" />
    @endif



    <section class="search-desc">
        <div class="container">

            <div class="mobile_filter d-block d-md-none">

                <div class="row mt-2">
                    <div class="col-10">
                        <h2 class="pt-1 custom-text-primary custom-fs-25 custom-fw-600 ">Filter</h2>
                    </div>
                    <div class="col-2 text-right">
                        <button data-toggle="collapse-side" data-target=".side-collapse"
                            data-target-2=".side-collapse-container" type="button"
                            class="navbar-toggle pull-left btn btn-primary py-5"><span class="icon-bar"> <i
                                    class="fas fa-filter fa-2x "></i></button>
                    </div>
                </div>
                <div class="navbar-inverse side-collapse in">
                    <nav role="navigation" class="navbar-collapse">

                        <div class="filter d-block d-md-none">
                            <div class="d-flex justify-content-evenly align-items-center">
                                <h3>Filter </h3>
                                <a href="#" class="text-dark " data-toggle="collapse-side"
                                    data-target=".side-collapse" data-target-2=".side-collapse-container"><i
                                        class="fas fa-times fa-2x"></i></a>
                            </div>
                            <div class="type">
                                <p>
                                    <button class="btn" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapseExample">
                                        Trip Type <i class="fas fa-sort-down"></i>
                                    </button>
                                </p>
                                <div class="collapse" id="collapse1">
                                    <div class="card card-body">
                                        @foreach ($categories as $category)
                                            <div class="row">
                                                <div class="col-12 text-left">
                                                    <input type="radio" name="category"
                                                        id="mobile_triptype{{ $category->id }}" class="mobile_categories"
                                                        value="{{ $category->id }}">
                                                    <label
                                                        for="mobile_triptype{{ $category->id }}">{{ Str::limit($category->name, 20) }}</label>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                            <div class="type">
                                <p>
                                    <button class="btn" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapseExample">
                                        Trip Length <i class="fas fa-sort-down"></i>
                                    </button>
                                </p>
                                <div class="collapse " id="collapse2">
                                    <div class="card card-body">
                                        @foreach ($durations as $duration)
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="radio" name="durations"
                                                        id="mobile_triptype_dur{{ $duration->duration }}"
                                                        class="mobile_durations" value="{{ $duration->duration }}">
                                                    <label
                                                        for="mobile_triptype_dur{{ $duration->duration }}">{{ Str::limit($duration->duration, 20) }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="type">
                                <p>
                                    <button class="btn" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapseExample">
                                        Activity Type <i class="fas fa-sort-down"></i>
                                    </button>
                                </p>
                                <div class="collapse show" id="collapse3">
                                    <div class="card card-body">
                                        @foreach ($activities as $activity)
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="radio" name="activities"
                                                        id="mobile_triptype_act{{ $activity->activity }}"
                                                        class="mobile_activities" value="{{ $activity->activity }}">
                                                    <label
                                                        for="mobile_triptype_act{{ $activity->activity }}">{{ Str::limit($activity->activity, 20) }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                        </div>
                    </nav>
                </div>
            </div>


            <div class="row">
                <div class="col-md-3">
                    <div class="filter d-none d-md-block">
                        <h3>Filter Trips</h3>
                        <div class="type">
                            <p>
                                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    Trip Type <i class="fas fa-sort-down"></i>
                                </button>
                            </p>
                            <div class="collapse" id="collapse1">
                                <div class="card card-body">
                                    @foreach ($categories as $category)
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="radio" name="category"
                                                    id="lap_triptype_cat{{ $category->id }}" class="categories"
                                                    value="{{ $category->id }}">
                                                <label
                                                    for="lap_triptype_cat{{ $category->id }}">{{ Str::limit($category->name, 20) }}</label>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                        <div class="type">
                            <p>
                                <button class="btn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapseExample">
                                    Trip Length <i class="fas fa-sort-down"></i>
                                </button>
                            </p>
                            <div class="collapse" id="collapse2">
                                <div class="card card-body">
                                    @foreach ($durations as $duration)
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="radio" name="durations"
                                                    id="lap_triptype_dur{{ $duration->duration }}" class="durations"
                                                    value="{{ $duration->duration }}">
                                                <label
                                                    for="lap_triptype_dur{{ $duration->duration }}">{{ Str::limit($duration->duration, 20) }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="type">
                            <p>
                                <button class="btn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapseExample">
                                    Activity Type <i class="fas fa-sort-down"></i>
                                </button>
                            </p>
                            <div class="collapse" id="collapse3">
                                <div class="card card-body">
                                    @foreach ($activities as $activity)
                                        <div class="row">
                                            <div class="col-12">
                                                <input type="radio" name="activities"
                                                    id="lap_triptype_act{{ $activity->activity }}" class="activities"
                                                    value="{{ $activity->activity }}">
                                                <label
                                                    for="lap_triptype_act{{ $activity->activity }}">{{ Str::limit($activity->activity, 20) }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-9">

                    <div class="row package_data">
                        @if (count($packages) > 0)
                            @foreach ($packages as $package)
                                <div class="col-md-4 col-sm-6 col-12">
                                    @include('frontend.template.card1', ['package' => $package])

                                </div>
                            @endforeach
                        @else
                            <div class="text-center custom-text-primary mt-5">
                                <h2>No package found</h2>
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </section>



@endsection
@push('scripts')
    <script>
        function getData() {
            let category = $('.categories:checked').val();
            let activity = $('.activities:checked').val();
            let duration = $('.durations:checked').val();
            let obj = {
                category: category,
                activity: activity,
                duration: duration,
                // destination:{{ $data ? $data->id : 8 }},
            }
            $('.package_data').html('')


            $.ajax({
                url: '{{ url('get-ajax-package') }}/',
                type: 'GET',
                data: obj,
                success: function(data) {
                    $('.package_data').html(data)
                }

            })


        }

        $('.categories').click(function() {
            getData()
        })

        $('.activities').click(function() {
            getData()
        })
        $('.durations').click(function() {
            getData()
        })



        $('.mobile_categories').click(function() {
            getData()
        })

        $('.mobile_activities').click(function() {
            getData()
        })
        $('.mobile_durations').click(function() {
            getData()
        })


        $(document).ready(function() {
            var sideslider = $('[data-toggle=collapse-side]');
            var sel = sideslider.attr('data-target');
            var sel2 = sideslider.attr('data-target-2');
            sideslider.click(function(event) {
                $(sel).toggleClass('in');
                $(sel2).toggleClass('out');
            });
        });
    </script>
@endpush
