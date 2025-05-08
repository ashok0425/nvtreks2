@extends('frontend.layout.master')


@section('content')

@include('frontend.inc.banner')
<section class="mb-md-5 mb-4">
    <div class="container ">
        <div class="d-flex justify-content-center w-100">
            <div class="" style='max-width: 520px;width: 100%;'>
                <div class="text-center">
                    <i class="bi bi-check-circle-fill checkIcon mb-3"></i>
                    <p class="fs-4 fw-bolder mb-2">We will get back to you as soon as possible</p>

                    <p class="text_lightDark fs-6 font_montserrat mb-2 text-wrap">
                        If you have any queries, feel free to contact us at
                    </p>
                    <p class="text_lightDark fs-6 font_montserrat mb-3 text-wrap">
                        sales@nepalvisiontreks.com / +977 9802342080 / +977 1 4701537
                    </p>

                    <div class="d-flex flex-column flex-md-row justify-content-md-between gap-2">
                        <a href="{{route('/')}}"
                            class="btn btn_darkprimary rounded-0 px-4 py-3 text-decoration-none d-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-arrow-left fs-5 fw-bold"></i> RETURN TO HOME
                        </a>
                        <a href="{{route('destination',['url'=>'nepal'])}}"
                            class="btn btn_darkprimary rounded-0 px-4 py-3 text-decoration-none d-flex align-items-center justify-content-center gap-2">
                            EXPLORE MORE <i class="bi bi-arrow-right fs-5 fw-bold"></i>
                        </a>
                    </div>
                </div>
            </div>
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



