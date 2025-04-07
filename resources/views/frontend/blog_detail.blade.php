@extends('frontend.layout.master')


@section('content')
    <section class="video_section mb-md-5 mb-4">
        <!-- navbar -->
        @include('frontend.layout.header')
        @php
            $defaultImage = asset('/frontend/images/everestbaseBanner.png'); // fallback image
            $finalImage = getImageUrl($blog->thumbnail) ?? $defaultImage;

        @endphp
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <div class="banner-container"
                style="background-image: url({{ $finalImage }});background-size: cover;background-position: center;">
                <div class="position-absolute top-0 start-0 w-100 h-100 z-1" style='background-color: #000000;opacity: 20%'>
                </div>
                <div class="banner-content">
                    <h1 class="banner-title">{{ $blog->title }}
                    </h1>
                </div>
            </div>
        </div>

    </section>


    <section class='mb-5'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-8'>
                    <p class='mb-0 small text_darkGray'>Nepal vision |
                        {{ Carbon\Carbon::parse($blog->created_at)->format('d/m/Y') }}</p>
                    <div class="mt-5" id="ckeditor_content">
                        @php

                            // Find the position of the first occurrence of '#@#'
                            $startPos = strpos($blog->long_description, '#faq');

                            if ($startPos !== false) {
                                // Find the position of the second occurrence of '#@#' after the first one
                                $endPos = strpos($blog->long_description, '#faq', $startPos + 3);

                                if ($endPos !== false) {
                                    // Extract the substring between the two markers
                                    $content = substr($blog->long_description, $startPos + 3, $endPos - $startPos - 3);
                                } else {
                                    // If no second marker found, consider until the end of the content
                                    $content = substr($blog->long_description, $startPos + 3);
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
                                            $html .=
                                                "<h2 class='accordion-header' id='heading" .
                                                ($key + 1) .
                                                "'>
                                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse'
                                            data-bs-target='#collapse" .
                                                ($key + 1) .
                                                "' aria-expanded='true'
                                            aria-controls='collapse" .
                                                ($key + 1) .
                                                "'>
                                            " .
                                                strip_tags($itenary) .
                                                "
                                        </button>
                                    </h2>";
                                        @endphp
                                    @else
                                        @php
                                            $html .=
                                                "<div id='collapse" .
                                                $key .
                                                "' class='accordion-collapse collapse'
                                        aria-labelledby='heading" .
                                                $key .
                                                "' data-bs-parent='#accordionExample'>
                                        <div class='accordion-body m-0  bg-transparent'>
                                            " .
                                                strip_tags($itenary) .
                                                "
                                        </div>
                                    </div>";
                                        @endphp
                                    @endif

                                    @php
                                        $html .= '</div>';
                                    @endphp
                                @endif
                            @endforeach
                            @php
                                $html .= '</div>';

                            @endphp
                            @php
                                $pattern = '/#faq.*?#faq/';
                                $newText = preg_replace($pattern, $html, $blog->long_description);
                            @endphp

                            {!! $newText !!}
                        @else
                            {!! $blog->long_description !!}
                        @endif
                    </div>
                    <div class="d-flex mt-5 flex-md-row flex-column  justify-content-between gap-3 mb-md-0 mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <p class='mb-0'>
                                <i class='bi bi-chevron-left fs-3 fw-bold text_darkprimary fw-bold'></i>
                            </p>
                            <a href="{{ route('blog.detail', ['url' => $prev->slug]) }}" class="text-decoration-none">
                                <p class='small font_montserrat mb-0' style="color: #F56960;">Previous</p>
                                <p class='font_montserrat fw-semibold mb-0 text-dark'>{{ $prev->title }}</p>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <a class="text-end text-decoration-none" href="{{ route('blog.detail', ['url' => $next->slug]) }}">
                                <p class='small font_montserrat mb-0' style="color: #F56960;">Next</p>
                                <p class='font_montserrat fw-semibold mb-0 text-dark'>{{ $next->title }}</p>
                            </a>
                            <p class='mb-0'>
                                <i class='bi bi-chevron-right fs-3 fw-bold text_darkprimary fw-bold'></i>
                            </p>
                        </div>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='px-md-4'>
                        <form action="{{route('blog')}}" method="get">
                        <div class='input-group search_input mb-md-5 mb-3'>
                            <span class='input-group-text bg-transparent ps-3 pe-0 rounded-0'><i
                                class="bi bi-search"></i></span>
                        <input type='search' class='form-control border border-start-0 ps-2 py-3 rounded-0'
                            placeholder='Search for blogs.....' name="keyword" value="{{request()->query('keyword')}}" />
                        </div>
                    </form>

                        <div class='text-center mb-md-5 mb-3'>
                            <button class='btn btn_outline_darkprimary fw-bold rounded-0 px-3'>RECENT POSTS</button>
                        </div>
                        <div class='mb-md-5 mb-3'>
                            <!-- Repeat this block for recent posts -->
                            @foreach ($recentBlogs as $blog)
                                <div class='card border-0 mb-3'>
                                    <a href="{{ route('blog.detail', ['url' => $blog->slug]) }}"
                                        class="text-decoration-none text-dark">
                                        <div class='row align-items-center'>
                                            <div class='col-md-4'>
                                                <img src='{{ getImageUrl($blog->thumbnail) }}' alt='{{ $blog->title }}'
                                                    class='img-fluid' />
                                            </div>
                                            <div class='col-md-8'>
                                                <p class='mb-0 fs-6 fw-bold'>{{ $blog->title }}</p>
                                                <p class='mb-0 small text_darkGray'>Nepal vision |
                                                    {{ Carbon\Carbon::parse($blog->created_at)->format('d/m/Y') }}</p>
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
                                <a href='{{ setting()->facebook }}'><img src='{{ asset('frontend/images/fb_logo.png') }}'
                                        alt='fb' class='img-fluid' width='28' height='28' /></a>
                                <a href='{{ setting()->instagram }}'><img
                                        src='{{ asset('frontend/images/instagram.png') }}' alt='symbol' class='img-fluid'
                                        width='28' height='28' /></a>
                                {{-- <a href='#{{setting()->pinterest}}'><img src='{{asset('frontend/images/pinterest_logo.png')}}' alt='pinterest' class='img-fluid' --}}
                                {{-- width='28' height='28' /></a> --}}
                                {{-- <a href='{{setting()->whatsapp}}'><img src='{{asset('frontend/images/whatsapp_logo.png')}}' alt='whatsapp' class='img-fluid' --}}
                                {{-- width='28' height='28' /></a> --}}
                                <a href='{{ setting()->linkedin }}'><img
                                        src='{{ asset('frontend/images/linkedin_logo.png') }}' alt='linkedin'
                                        class='img-fluid' width='28' height='28' /></a>
                                <a href='{{ setting()->twitter }}'><img src='{{ asset('frontend/images/x_logo.png') }}'
                                        alt='x' class='img-fluid' width='28' height='28' /></a>

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
    <link rel="stylesheet" href="{{ asset('frontend/style/about.css') }}">
    <style>
        #ckeditor_content img {
            max-width: 100% !important;
        }

        #ckeditor_content h1,
        #ckeditor_content h2,
        #ckeditor_content h3,
        #ckeditor_content h4,
        #ckeditor_content h5,
        #ckeditor_content h6,
        #ckeditor_content p,
        #ckeditor_content span,
        #ckeditor_content div,
        #ckeditor_content strong {
            font-family: "Mulish", serif !important;
        }
    </style>
@endpush

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
@endpush
