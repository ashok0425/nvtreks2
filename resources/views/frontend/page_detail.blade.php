@extends('frontend.layout.master')
@section('title')
    {{ $data->meta_title }}
@endsection
@section('descr')
    {{ $data->meta_description }}
@endsection
@section('keyword')
    {{ $data->keyword }}
@endsection

@section('url')
    {{ Request::url() }}
@endsection
@php
    define('PAGE', 'about');
    $num = rand(1, 7);
@endphp
<style>
    .articel2 .row {
        border-radius: 15px;

    }

    .right-artile {
        margin-top: 20px !important;
    }
</style>
@section('content')
    <x-page-header :title="$data->title" :route="route('cms.detail', ['page' => $page])" :img="getImageurl('banners/' . $num . '.webp')" />

    <section class="articel2 ">
        <div class="container">
            <div class="row my-5 shadow p-md-3 p-1 bg-white">

                <div class="col-lg-12">
                    <div class="right-artile ">

                        <h1 class="text-center">{{ $data->title }}</h1>
                        <div>
                            {!! $data->content !!}
                        </div>

                    </div>

                    <br>


                    <a href="{{ route('/') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </div>

        </div>
    </section>
@endsection
