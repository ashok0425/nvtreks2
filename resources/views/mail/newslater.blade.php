@extends('mail.layout')
@section('content')
    @php
        $page = DB::table('websites')->first();
        
    @endphp


    {!! $page->subscribe_text !!}
    <br>
    <a href="{{ route('/') }}">

        <img src="{{ getImageurl($page->subscribe_image) }}" alt="">
    </a>
@endsection
