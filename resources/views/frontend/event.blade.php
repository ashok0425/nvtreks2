@extends('frontend.layout.master')


@section('title')
    Activities you can perform in Nepal
@endsection
@section('descr')
    Check out the different activities you can perform while traveling to Nepal.
@endsection
@section('keyword')
    Activity
@endsection

@section('url')
    {{ Request::url() }}
@endsection


<style>
    .events .card-body {
        height: 110px;
    }
</style>
@php
    define('PAGE', 'event');
    $num = rand(1, 7);
@endphp
@section('content')
    <x-page-header title="Event" :route="route('events')" :img="getImageurl('banners/' . $num . '.webp')" />

    <section class="events">
        <div class="container">

            <div class="event-cards">
                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-md-4">
                            <div class="event-card-1 shadow">
                                <a href="{{ route('event.detail', ['id' => $event->id]) }}"
                                    class="text-decoration-none custom-text-primary">
                                    <div class="card">
                                        <div class="img-wrapper">
                                            @if ($event->image !== null)
                                                <img src="{{ getImageurl($event->image) }}" class="card-img-top"
                                                    alt="{{ $event->title }}">
                                            @else
                                                <img src="{{ getImageurl('frontend/assets/event1.png') }}"
                                                    class="card-img-top" alt="{{ $event->title }}">
                                            @endif
                                            <div class="date">
                                                <div class="today-date">
                                                    <h3>{{ carbon\carbon::parse($event->date)->format('d') }}</h3>
                                                    <p>{{ carbon\carbon::parse($event->date)->format('M') }}</p>
                                                    <p>{{ carbon\carbon::parse($event->date)->format('Y') }}</p>
                                                </div>
                                                <h3>-</h3>
                                                <div class="expire-date">
                                                    <h3>{{ carbon\carbon::parse($event->end_date)->format('d') }}</h3>
                                                    <p>{{ carbon\carbon::parse($event->end_date)->format('M') }}</p>
                                                    <p>{{ carbon\carbon::parse($event->end_date)->format('Y') }}</p>
                                                </div>
                                            </div>

                                            @php
                                                $enddate = carbon\carbon::parse($event->end_date)->format('d-m-Y');
                                                $today = carbon\carbon::parse(today())->format('d-m-Y');
                                                
                                            @endphp
                                            @if ($today > $enddate)
                                                <div class="places">
                                                    Expired
                                                </div>
                                            @endif

                                        </div>


                                        <div class="card-body">
                                            <h3 class="card-title text-dark">{{ $event->title }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
    </section>
@endsection
