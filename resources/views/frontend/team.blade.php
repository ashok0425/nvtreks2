@extends('frontend.layout.master')


@section('content')

@include('frontend.inc.banner')

<section class="mb-5">
    <div class="container">
        <div class="row">
            <!-- Team Member 1 -->
            @foreach ($teams as $team)

            <div class="col-md-4 px-md-4 mb-md-5 mb-4">
                <div class="card border-0 team_card hover_effect">
                    <img src="{{getImageUrl($team->thumbnail)}}" alt="{{$team->name}}" class="img-fluid" />
                    <div class="card-body px-3">
                        <p class="mb-0 team_card_title">{{$team->name}}</p>
                        <p class="mb-3 team_card_subtitle">{{$team->position}}</p>
                        <p class="mb-0 team_card_desc">
                            {{$team->content}}
                        </p>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>


@include('frontend.inc.socialmedia')
@include('frontend.inc.contactus')
@endsection
@push('style')

@endpush

@push('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/vue@3.3.4/dist/vue.global.prod.js"></script>



@endpush



