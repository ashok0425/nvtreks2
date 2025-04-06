@extends('mail.layout')
@section('content')
    @php
        $email = DB::table('emails')
            ->where('id', $emailId)
            ->first();
    @endphp
    {!! $email->email !!}
    <br>
    <a href="{{ route('/') }}">
        @if (!empty($email->image))
            <img src="{{ getImageurl($email->image) }}" alt="subscriber image">
        @endif
    </a>
@endsection
