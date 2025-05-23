@extends('frontend.layout.master')


@section('content')

@include('frontend.inc.banner')
@php
$defaultImage = asset('/frontend/images/about_banner.png'); // fallback image
$finalImage = $defaultImage;
@endphp

<section class="container">
    @foreach ($packages as $package)
    <div class="mb-md-5 mb-4">
        <h2 class="head_title">{{$package->name}}</h2>
        <p class="mb-3 font_montserrat fs-6">Explore our curated list of the best countries to visit in 2024 and
            discover incredible destinations waiting to be explored</p>
        <div class="row gap-3 gap-md-0">
            <div class="col-md-6 d-flex">
                <img data-src="{{getImageUrl($package->package_images()->first()?->image)??$finalImage}}" alt="{{$package->name}}"
                    class="img-fluid w-100 h-100 object-fit-cover">
            </div>
            <div class="col-md-3 d-flex flex-column">
                <img data-src="{{getImageUrl($package->package_images()->skip(1)->first()?->image)??$finalImage}}" alt="{{$package->name}}"
                    class="img-fluid w-100 h-50 object-fit-cover mb-4">
                <img data-src="{{getImageUrl($package->package_images()->skip(2)->first()?->image)??$finalImage}}" alt="{{$package->name}}"
                    class="img-fluid w-100 h-50 object-fit-cover">
            </div>
            <div class="col-md-3 d-flex">
                <img data-src="{{getImageUrl($package->package_images()->skip(3)->first()?->image)??$finalImage}}" alt="{{$package->name}}"
                    class="img-fluid w-100 h-100 object-fit-cover">
            </div>
        </div>
    </div>
    @endforeach

</section>
    @include('frontend.inc.contactus')
@endsection
@push('style')

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
