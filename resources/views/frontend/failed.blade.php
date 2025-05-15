@extends('frontend.layout.master')

@section('styles')
    <style>
        .thanks-div {
            background: white;
        }
    </style>
@endsection

@section('content')
@include('frontend.inc.banner')
    <section class="thanks-div my-5">

        <div class="container">

            <div class="row">

                <div
                    class="col-12 col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3 text-center custom-text-primary">
                    <h2>{{ Session::get('message') }}</h2>

                    {{-- <img class="w-25" src="{{ getImageurl('frontend/thanks.png') }}" alt="Nepalvisiotreks" /> --}}
                    <h1 class="d-block text-danger">Payment Failed</h1>
                    <p class="mb-0">If you have any queries feel free to contact us at </p>
                    <p class="mail">sales@nepalvisiontreks.com / 977-1-4424762 / +977-9851189771</p>

                    <a href="{{ route('/') }}" class="btn_lightprimary_outline btn mt-2 rounded-0 px-md-4 py-md-2">⬅ Return to home</a>
                    <a href="{{ route('deals') }}" class="btn_lightprimary_outline btn mt-2 rounded-0 px-md-4 py-md-2">Explore more ➡</a>

                </div>

            </div>

            {{-- @include('frontend.template.top_package') --}}
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
