@extends('frontend.layout.master')
@php
    define('PAGE', 'destination');
    $num = rand(1, 7);
@endphp
@section('styles')
    <style>
        .thanks-div {
            background: white;
        }
    </style>
@endsection

@section('content')
    <section class="thanks-div my-5">

        <div class="container">

            <div class="row">

                <div
                    class="col-12 col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3 text-center custom-text-primary">
                    <h2>{{ Session::get('message') }}</h2>
                    <img class="w-25" src="{{ getFilepath('frontend/thanks.png') }}" alt="Nepalvisiotreks" />
                    <span class="d-block">We will get back to you as soon as possibe</span>
                    <p class="mb-0">If you have any queries feel free to contact us at </p>
                    <p class="mail">sales@nepalvisiontreks.com / 977-1-4424762 / +977 9802342081</p>

                    <a href="{{ route('/') }}" class="btn btn-primary">⬅ Return to home</a>
                    <a href="{{ route('package.all') }}" class="btn btn-primary">Explore more ➡</a>

                </div>

            </div>

            @include('frontend.template.top_package')
        </div>

    </section>
@endsection
@section('styles')
    <style>
        .thanks-div img {
            width: 200px;
        }
    </style>
@endsection
