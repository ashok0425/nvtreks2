@extends('frontend.layout.master')

@php
    $agent = new \Jenssegers\Agent\Agent();
@endphp
@if ($agent->isMobile())
    @section('title')
        {{ $blog->mobile_title }}
    @endsection
    @section('descr')
        {{ $blog->mobile_description }}
    @endsection
    @section('keyword')
        {{ $blog->mobile_keyword }}
    @endsection
@else
    @section('title')
        {{ $blog->meta_title }}
    @endsection
    @section('descr')
        {{ $blog->meta_description }}
    @endsection
    @section('keyword')
        {{ $blog->keywords }}
    @endsection
@endif
@section('img')
    {{ getImageurl($blog->guid) }}
@endsection
@section('url')
    {{ Request::url() }}
@endsection
@php
    define('PAGE', 'blog');
@endphp

@section('content')
    <style>
        .attachment {
            display: none;
        }


        .blog-img{
            height: 83vh !important;
            background:url("{{ getImageurl($blog->cover_image) }}") center center no-repeat rgba(0, 0, 0, .3);
            background-size: cover;
            background-blend-mode: multiply;
           position: relative;
        }
        .blog_title{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            color:#fff;
            font-weight: 700;
            font-size: 35px;
        }

        /*.blog_content_image img{*/
        /*    width: 45%!important;*/

        /*}*/


        .bot-nav .container {
            border: 0px;
            padding: 0px;
        }

        .line_height {
            line-height: 50px !important;
            font-size: 27px !important;
        }
        #social-links ul li{
            list-style: none!important;
            font-size: 35px;
            margin: 0 10px;
        }
        #social-links ul{
            margin-left: 0;
            padding-left: 0;
            display: flex;
            align-items: baseline;
        }

        #social-links ul li .fa-whatsapp{
color: green;
        }
        #social-links ul li .fa-linkedin{
color: #0a66c2;
        }

        #social-links ul li .twitter{
margin-top: -3px;
        }
        @media screen and (max-width: 600px){
table.rg-table td {
text-align: left!important;
}
.blog-img{
    height: 40vh!important;
}
.blog_title{
    font-weight: 600;
    font-size: 24px;
}
}
.right_card{
    position: sticky;
    top: 100px;
}
.recent_title{
    font-weight: 600;
    font-size: 18px!important;
}

.recent_text{
    font-weight: 500;
    font-size: 15px!important;
}

    </style>
    <section class="blog-img">

        <div class="blog_title text-center text-uppercase">
            <p> {{$blog->post_title}} </p>

        </div>
    </section>
    <section class="blog-container mt-5 ">
        <div class="container">
            <div class="row ">
                <div class="col-md-8">
                               <div class="d-flex mb-2">
                                <span><i class="fas fa-calendar"></i> <strong>Published:</strong>  {{ carbon\carbon::parse($blog->post_date)->format('d M Y') }}</span>
                                &nbsp; | &nbsp;
                                <span><i class="fas fa-calendar"></i> <strong>Last updated:</strong>  {{ carbon\carbon::parse($blog->post_date)->format('d M Y') }}</span>
                               </div>
                               <div>
                                {{-- Share::page(url()->current())
                                ->facebook()
                                ->twitter()
                                ->linkedin()
                                ->whatsapp() --}}
<div id="social-links">
<ul><li><a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" class="social-button " id="" title="" rel=""><span class="fab fa-facebook-square"></span></a></li>
    <li><a href="https://twitter.com/intent/tweet?text=Default+share+text&amp;url={{url()->current()}}" class="social-button twitter" id="" title="" rel=""><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="41" height="41" viewBox="0 0 55 55">
        <path d="M 11 4 C 7.134 4 4 7.134 4 11 L 4 39 C 4 42.866 7.134 46 11 46 L 39 46 C 42.866 46 46 42.866 46 39 L 46 11 C 46 7.134 42.866 4 39 4 L 11 4 z M 13.085938 13 L 21.023438 13 L 26.660156 21.009766 L 33.5 13 L 36 13 L 27.789062 22.613281 L 37.914062 37 L 29.978516 37 L 23.4375 27.707031 L 15.5 37 L 13 37 L 22.308594 26.103516 L 13.085938 13 z M 16.914062 15 L 31.021484 35 L 34.085938 35 L 19.978516 15 L 16.914062 15 z"></path>
        </svg></a></li>
    <li><a href="https://www.linkedin.com/sharing/share-offsite?mini=true&amp;url={{url()->current()}}&amp;title=Default+share+text&amp;summary=" class="social-button " id="" title="" rel=""><span class="fab fa-linkedin"></span></a></li>
    <li><a target="_blank" href="https://wa.me/?text={{url()->current()}}" class="social-button " id="" title="" rel=""><span class="fab fa-whatsapp"></span></a></li></ul>
</div>
                               </div>

                               <div class="mt-5" id="ckeditor_content">
                                @php

// Find the position of the first occurrence of '#@#'
$startPos = strpos($blog->post_content, '#faq');

if ($startPos !== false) {
    // Find the position of the second occurrence of '#@#' after the first one
    $endPos = strpos($blog->post_content, '#faq', $startPos + 3);

    if ($endPos !== false) {
        // Extract the substring between the two markers
        $content = substr($blog->post_content, $startPos + 3, $endPos - $startPos - 3);
    } else {
        // If no second marker found, consider until the end of the content
        $content = substr($blog->post_content, $startPos + 3);
    }
} else {
    // If no start marker found, set content to an empty string
    $content = '';
}
                                $faqs = explode('#@#', $content);
                                @endphp

                                @if (count($faqs))
                                    @php
                                $html = "<div class='accordion bg-transparent' id='accordionExample'>";
                                    @endphp

                            @foreach ($faqs as $key => $itenary)
                                @if ($key != 0)
                                    @php
                                        $html .= "<div class='accordion-item mb-1'>";
                                    @endphp

                                    @if ($key % 2 != 0)
                                        @php
                                            $html .= "<h2 class='accordion-header' id='heading" . ($key + 1) . "'>
                                                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse'
                                                            data-bs-target='#collapse" . ($key + 1) . "' aria-expanded='true'
                                                            aria-controls='collapse" . ($key + 1) . "'>
                                                            " . strip_tags($itenary) . "
                                                        </button>
                                                    </h2>";
                                        @endphp
                                    @else
                                        @php
                                            $html .= "<div id='collapse" . $key . "' class='accordion-collapse collapse'
                                                        aria-labelledby='heading" . $key . "' data-bs-parent='#accordionExample'>
                                                        <div class='accordion-body m-0  bg-transparent'>
                                                            " . strip_tags($itenary) . "
                                                        </div>
                                                    </div>";
                                        @endphp
                                    @endif

                                    @php
                                        $html .= "</div>";
                                    @endphp
                                @endif
                            @endforeach
@php
                            $html .= "</div>";

@endphp
                            @php
                                $pattern = '/#faq.*?#faq/';
                                $newText = preg_replace($pattern, $html, $blog->post_content);
                            @endphp

                            {!! $newText !!}


                               @else
                               {!!$blog->post_content!!}
                            @endif
                        </div>

                            </div>
                            <div class="col-md-4">
                                @php
                                    $blogs=App\Models\Blog::latest('post_date')->where('id','!=',$blog->ID)->limit(4)->get();
                                @endphp
                           <div class="card border-0 rounded-0 bg-gray  mx-md-5 mx-0 right_card">
                            <div class="card-body">
                                <div class="mb-3 recent_title">
                                   Recent Blogs
                                </div>
                                @foreach ($blogs as $item)
                                   <div class="mb-3">
                                    <img src="{{getImageurl($item->guid)}}" alt="" class="img-fluid">
                                    <p class="mt-3 text-center recent_text">
                                        <a href="{{ route('blog.detail', ['url' => $item->url]) }}" class="text-dark text-decoration-none">{{$item->post_title}}</a></p>
                                   </div>
                                @endforeach
                            <div>

                            </div>
                            </div>
                           </div>
                            </div>

            </div>

                <div class="bot-nav my-4">
                    <div class="container  ">
                        <div class="row px-md-5 px-2 mx-md-5 mx-2">
                            <div class="col-md-9">
                                <a href="{{ route('blog') }}"><i class="fas fa-long-arrow-alt-left"></i> Back to Blogs</a>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-5">
                                        <a href="{{ route('blog.detail', ['url' => $prev->url]) }}"><i
                                                class="fas fa-long-arrow-alt-left"></i> Previous Blog</a>
                                    </div>
                                    <div class="col-2">|</div>
                                    <div class="col-5">
                                        <a href="{{ route('blog.detail', ['url' => $next->url]) }}"> Next Blog <i
                                                class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<div class="mt-3">
    @php
      $features=DB::table('packages')->join('package_featured','packages.id','package_featured.featured_id')->select('packages.*')->where('status',1)->limit(4)->get();

    @endphp
    <section class="packages">
        <div class="container-fluid">
            <div class="heading my-5">
                <h2 class='my-0 py-0 custom-fs-22'>Featured Packages</h2>
            </div>
            <div class="row">
                @foreach ($features as $packaged)
                    <div class="col-md-3 col-sm-4">
                        @include('frontend.template.card1', ['package' => $packaged])
                    </div>
                @endforeach

            </div>
        </div>
    </section>
</div>



        </div>
    </section>
@endsection


@push('script')

<script>
    // Parse CKEditor content
const editorContent = document.getElementById('ckeditor_content');
const imagesToLazyLoad = editorContent.querySelectorAll('img');

// Lazy load images
const options = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1
};

function lazyLoadImage(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            observer.unobserve(img);
        }
    });
}

const observer = new IntersectionObserver(lazyLoadImage, options);

imagesToLazyLoad.forEach(img => {
    img.src = placeholderImageURL; // Set placeholder image initially
    observer.observe(img);
});

</script>

    {{--
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Hotel",
        "name": "{{$place->name}}",
        "description": "{{ Str::limit($place->description, 120) }}",
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "IN",
            "addressLocality": "{{$place->address}}",
            "addressRegion": "{{$place->address}}",
            "postalCode": "602000",
            "streetAddress": "Technikerstrasse 21"},
        "telephone": "+91 9958277997",
        "photo" :"{{getImageurl($gallery)}}",
        "starRating": {
            "@type": "Rating",
            "ratingValue": "4.3"},
        "image" :"{{getImageurl($gallery)}}",
         "priceRange": "₹1000"
    }</script> --}}
@endpush
