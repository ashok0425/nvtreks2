@extends('frontend.layout.master')


@section('content')
    <section class="video_section mb-md-5 mb-4">
        <!-- navbar -->
        @include('frontend.layout.header')
        @php
            $defaultImage = asset('/frontend/images/privacyBanner.png'); // fallback image
            $finalImage = $defaultImage;

        @endphp
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <div class="banner-container"
                style="background-image: url({{ $finalImage }});background-size: cover;background-position: center;">
                <div class="position-absolute top-0 start-0 w-100 h-100 z-1" style='background-color: #000000;opacity: 20%'>
                </div>
                <div class="banner-content">
                    <h1 class="banner-title">PRIVACY POLICY

                    </h1>
                </div>
            </div>
        </div>

    </section>

    <section>
        <div class="container mb-md-5 mb-4">
            <div class="mb-md-5 mb-4">
                <p class='mb-md-3 mb-2 font_montserrat'>Welcome to Nepal Trek Vision, your trusted partner for an
                    unforgettable holiday trip. When booking with us, we kindly ask you to read through our booking
                    procedures carefully. Booking a trip includes certain terms and conditions for the products and
                    services provided by Nepal Trek Vision Pvt. Ltd. and establishes a legal agreement between you and
                    our company.</p>

                <p class='mb-md-5 mb-4 font_montserrat'>Booking a trip contains essential details regarding your tour
                    and trek with Nepal Trek Vision Pvt. Ltd. Please be mindful that traveling in the Himalayan region
                    comes with its challenges. While we take every precaution for your safety, unforeseen events such as
                    injuries, serious illnesses, or emergencies requiring helicopter rescue may occur. Additionally,
                    there may be risks of losses or damages. In such cases, all associated costs will need to be borne
                    by you, as outlined in our agreement. Therefore, it is crucial to thoroughly read and understand all
                    procedures before confirming your booking with us. Your confirmation indicates your acceptance of
                    all terms and conditions.</p>

                <h5 class='fw-bolder fs-4 mb-md-3 mb-2'>1. The Contract</h5>
                <p class='mb-0 fw-medium fs_18 font_montserrat'>By booking a trip with Nepal Trek Vision, you agree to
                    the following Terms and Conditions, which define the relationship between you (the client) and Nepal
                    Trek Vision Pvt. Ltd. (referred to as "The Company"), Registered Company Number [Your Registration
                    Number]. These Terms and Conditions, along with our cancellation policy and limitations of
                    liability, form the basis of a legally binding agreement between both parties. To avoid
                    misunderstandings or disputes, we urge you to thoroughly review this document.</p>
                <p class='mb-md-3 mb-2 fw-medium fs_18 font_montserrat'>The Booking Terms and Conditions outline key
                    information regarding your trip and serve as the foundation for your legal relationship with Nepal
                    Trek Vision. We expect all clients to read and fully understand these Terms before confirming their
                    booking. By proceeding with your booking, you confirm that you have read, understood, and accepted
                    these Terms. If you are booking on behalf of others, you confirm that you have the authority to
                    accept these Terms on their behalf.</p>
                <p class='mb-0 fw-bold fs_18'>Important Remarks:</p>
                <p class='fw-medium fs_18 font_montserrat'>These Terms and Conditions apply only when booking directly
                    with Nepal Trek Vision. If you book through a third-party agent or another provider, their Terms and
                    Conditions will take precedence. Therefore, we kindly advise you to familiarize yourself with all
                    relevant conditions before finalizing your booking.</p>
            </div>
            <div class="mb-md-5 mb-4">
                <h5 class='fw-bolder fs-4 mb-md-3 mb-2'>1. The Contract</h5>
                <p class='mb-0 fw-medium fs_18 font_montserrat'>By booking a trip with Nepal Trek Vision, you agree to
                    the following Terms and Conditions, which define the relationship between you (the client) and Nepal
                    Trek Vision Pvt. Ltd. (referred to as "The Company"), Registered Company Number [Your Registration
                    Number]. These Terms and Conditions, along with our cancellation policy and limitations of
                    liability, form the basis of a legally binding agreement between both parties. To avoid
                    misunderstandings or disputes, we urge you to thoroughly review this document.</p>
                <p class='mb-md-3 mb-2 fw-medium fs_18 font_montserrat'>The Booking Terms and Conditions outline key
                    information regarding your trip and serve as the foundation for your legal relationship with Nepal
                    Trek Vision. We expect all clients to read and fully understand these Terms before confirming their
                    booking. By proceeding with your booking, you confirm that you have read, understood, and accepted
                    these Terms. If you are booking on behalf of others, you confirm that you have the authority to
                    accept these Terms on their behalf.</p>
                <p class='mb-0 fw-bold fs_18'>Important Remarks:</p>
                <p class='fw-medium fs_18 font_montserrat'>These Terms and Conditions apply only when booking directly
                    with Nepal Trek Vision. If you book through a third-party agent or another provider, their Terms and
                    Conditions will take precedence. Therefore, we kindly advise you to familiarize yourself with all
                    relevant conditions before finalizing your booking.</p>
            </div>
            <div class="mb-md-5 mb-4">
                <h5 class='fw-bolder fs-4 mb-md-3 mb-2'>1. The Contract</h5>
                <p class='mb-0 fw-medium fs_18 font_montserrat'>By booking a trip with Nepal Trek Vision, you agree to
                    the following Terms and Conditions, which define the relationship between you (the client) and Nepal
                    Trek Vision Pvt. Ltd. (referred to as "The Company"), Registered Company Number [Your Registration
                    Number]. These Terms and Conditions, along with our cancellation policy and limitations of
                    liability, form the basis of a legally binding agreement between both parties. To avoid
                    misunderstandings or disputes, we urge you to thoroughly review this document.</p>
                <p class='mb-md-3 mb-2 fw-medium fs_18 font_montserrat'>The Booking Terms and Conditions outline key
                    information regarding your trip and serve as the foundation for your legal relationship with Nepal
                    Trek Vision. We expect all clients to read and fully understand these Terms before confirming their
                    booking. By proceeding with your booking, you confirm that you have read, understood, and accepted
                    these Terms. If you are booking on behalf of others, you confirm that you have the authority to
                    accept these Terms on their behalf.</p>
                <p class='mb-0 fw-bold fs_18'>Important Remarks:</p>
                <p class='fw-medium fs_18 font_montserrat'>These Terms and Conditions apply only when booking directly
                    with Nepal Trek Vision. If you book through a third-party agent or another provider, their Terms and
                    Conditions will take precedence. Therefore, we kindly advise you to familiarize yourself with all
                    relevant conditions before finalizing your booking.</p>
            </div>
            <div class="mb-md-5 mb-4">
                <h5 class='fw-bolder fs-4 mb-md-3 mb-2'>1. The Contract</h5>
                <p class='mb-0 fw-medium fs_18 font_montserrat'>By booking a trip with Nepal Trek Vision, you agree to
                    the following Terms and Conditions, which define the relationship between you (the client) and Nepal
                    Trek Vision Pvt. Ltd. (referred to as "The Company"), Registered Company Number [Your Registration
                    Number]. These Terms and Conditions, along with our cancellation policy and limitations of
                    liability, form the basis of a legally binding agreement between both parties. To avoid
                    misunderstandings or disputes, we urge you to thoroughly review this document.</p>
                <p class='mb-md-3 mb-2 fw-medium fs_18 font_montserrat'>The Booking Terms and Conditions outline key
                    information regarding your trip and serve as the foundation for your legal relationship with Nepal
                    Trek Vision. We expect all clients to read and fully understand these Terms before confirming their
                    booking. By proceeding with your booking, you confirm that you have read, understood, and accepted
                    these Terms. If you are booking on behalf of others, you confirm that you have the authority to
                    accept these Terms on their behalf.</p>
                <p class='mb-0 fw-bold fs_18'>Important Remarks:</p>
                <p class='fw-medium fs_18 font_montserrat'>These Terms and Conditions apply only when booking directly
                    with Nepal Trek Vision. If you book through a third-party agent or another provider, their Terms and
                    Conditions will take precedence. Therefore, we kindly advise you to familiarize yourself with all
                    relevant conditions before finalizing your booking.</p>
            </div>
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
