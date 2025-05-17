@extends('frontend.layout.master')


@section('content')

@include('frontend.inc.banner')


<section class='mb-5'>
    <div class='container'>
        <div class='row'>
            <div class='col-md-8'>
                <div class='row g-md-5 g-4 mb-md-4 mb-3'>
                    <!-- Repeat this block for each item -->
                    @foreach ($blogs as $blog)
                    <div class='col-md-6'>
                        <a href='{{route('blog.detail',['url'=>$blog->slug])}}' class="text-decoration-none">
                        <div class='card border-0 hover_effect' style="height: 520px">
                            <img src='{{getImageUrl($blog->thumbnail)}}' alt='{{$blog->title}}' class='img-fluid' style="height:200px;width:100%;object-fit:cover"/>
                            <div class='card-body'>
                                <p class='popular_card_head mb-2'>{{Str::limit($blog->title,100)}}</p>
                                <p class='small text_darkGray font_montserrat mb-3'>Nepal vision | {{Carbon\Carbon::parse($blog->created_at)->format('d/m/Y')}}</p>
                                <p class='fs-6 font_montserrat text_darkGray'>{!!Str::limit(strip_tags($blog->long_description),60)!!}</p>
                                <a  class='text_darkprimary text_darkGray fs-6 text-decoration-none fw-semibold'>CONTINUE
                                    READING..</a>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach


                    <!-- End of repeated block -->
                </div>
                <div>
                    {{ $blogs->withQueryString()->links() }}
                </div>
            </div>
            <div class='col-md-4'>
                <div class='px-md-4'>
                    <form action="{{route('blog')}}" method="get">
                    <div class='input-group search_input mb-md-5 mb-3'>
                         <span class='input-group-text bg-transparent ps-3 pe-0 rounded-0'><i
                             class="bi bi-search"></i></span>
                     <input type='search' class='form-control border border-start-0 ps-2 py-3 rounded-0'
                         placeholder='Search for blogs.....' name="keyword" value="{{request()->query('keyword')}}"/>
                     </div>
                    </form>

                    <div class='text-center mb-md-5 mb-3'>
                        <button class='btn btn_outline_darkprimary fw-bold rounded-0 px-3'>RECENT POSTS</button>
                    </div>
                    <div class='mb-md-5 mb-3'>
                        <!-- Repeat this block for recent posts -->
                        @foreach ($recentBlogs as $blog)
                        <div class='card border-0 mb-3'>
                            <a href="{{route('blog.detail',['url'=>$blog->slug])}}" class="text-decoration-none text-dark">
                            <div class='row align-items-center'>
                                <div class='col-md-4'>
                                    <img src='{{getImageUrl($blog->thumbnail)}}' alt='{{$blog->title}}' class='img-fluid' />
                                </div>
                                <div class='col-md-8'>
                                    <p class='mb-0 fs-6 fw-bold'>{{$blog->title}}</p>
                                    <p class='mb-0 small text_darkGray'>Nepal vision | {{Carbon\Carbon::parse($blog->created_at)->format('d/m/Y')}}</p>
                                </div>
                            </div>
                        </a>
                        </div>
                        @endforeach

                        <!-- End of repeated block -->
                    </div>
                    <div class='text-center mb-md-4 mb-3'>
                        <button class='btn btn_outline_darkprimary fw-bold rounded-0 px-3'>FOLLOW US ON</button>
                    </div>
                    <div class='d-flex justify-content-center'>
                        <div class='d-flex gap-3' style='max-width: 220px;'>
                            <a href='{{setting()->facebook}}'><img src='{{asset('frontend/images/fb_logo.png')}}' alt='fb' class='img-fluid' width='28'
                                    height='28' /></a>
                                    <a href='{{setting()->instagram}}'><img src='{{asset('frontend/images/instagram.png')}}' alt='symbol' class='img-fluid'
                                        width='28' height='28' /></a>
                            {{-- <a href='#{{setting()->pinterest}}'><img src='{{asset('frontend/images/pinterest_logo.png')}}' alt='pinterest' class='img-fluid' --}}
                                    {{-- width='28' height='28' /></a> --}}
                            {{-- <a href='{{setting()->whatsapp}}'><img src='{{asset('frontend/images/whatsapp_logo.png')}}' alt='whatsapp' class='img-fluid' --}}
                                    {{-- width='28' height='28' /></a> --}}
                            <a href='{{setting()->linkedin}}'><img src='{{asset('frontend/images/linkedin_logo.png')}}' alt='linkedin' class='img-fluid'
                                    width='28' height='28' /></a>
                            <a href='{{setting()->twitter}}'><img src='{{asset('frontend/images/x_logo.png')}}' alt='x' class='img-fluid' width='28'
                                    height='28' /></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('frontend.inc.escape')
@include('frontend.inc.testimonial')
@include('frontend.inc.contactus')
@endsection
@push('style')

@endpush

@push('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/vue@3.3.4/dist/vue.global.prod.js"></script>



@endpush



