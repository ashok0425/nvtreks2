@extends('frontend.layout.master')


@section('content')

@include('frontend.inc.banner')

 <!-- ultimate guide -->
 <section class="">
    <div class="container ckeditor_content">
  {!!$UsefulInfo!!}
    </div>
</section>

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
