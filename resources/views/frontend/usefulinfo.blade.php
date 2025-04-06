@extends('frontend.layout.master')
@php
    define('PAGE', 'usefulinfo');

@endphp
@section('content')

    <section class="blog-container mt-5 pt-3 ">
        <div class="container">
            <div class="row ">
                <div class="col-md-10 offset-md-1 card border-0 shadow-sm">
                    <div class="px-md-5  ">

                        <div class="pt-5">
                            <h1 class=" line_height">
                                {!! $UsefulInfo !!}


                            </h1>

                        </div>

                </div>

            </div>
        </div>
    </div>

    </section>
@endsection

