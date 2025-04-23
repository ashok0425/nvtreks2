@extends('frontend.layout.master')


@section('content')

@include('frontend.inc.banner')

<section class='mb-5'>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="section-header">
                    <hr class="section-line py-2" />
                    <p class="section-subtitle">POPULAR DESTINATION</p>
                </div>
                <h2 class="head_title mb-3 text-md-start text-center">CONTACT US TO GET MORE INFO</h2>
                <p class='section-description mb-4'>Explore our curated list of the best countries to visit in 2024
                    and discover incredible destinations waiting to be explored</p>
                <form >
                    <input type="hidden" name="page" value="contact">
                    @csrf
                    <input type="hidden" name="source" value="{{request()->query('utm_source')}}">
                    <div class="mb-3 mb-md-4">
                        <input type="text" class="form-control rounded-0 py-3" id="exampleInput1"
                            placeholder='Your Name*' required name="name"/>
                    </div>
                    <div class="mb-3 mb-md-3">
                        <input type="email" class="form-control rounded-0 py-3" id="exampleInput1"
                            placeholder='Your Email*' required name="email" />
                    </div>
                    <div class="mb-3 mb-md-5">
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="5"
                            placeholder='Your Message*' required name="message"></textarea>
                    </div>
                    <div>
                        <button class='btn btn_darkprimary rounded-0 py-2 py-md-3 px-3 px-md-4 fw-semibold'>SUBMIT
                            MESSAGE</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 px-md-5">
                <p class='mb-3 fs-4 fw-bolder text-md-start text-center'>Need help? Feel free to contact us!</p>
                <p class='mb-md-5 mb-3 font_montserrat fs-6 text_lightDark text-md-start text-center'>Lorem ipsum
                    dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis,
                    pulvinar dapibus leo.</p>
                <div class="d-flex align-items-center gap-3 mb-4 flex-column flex-sm-row text-center text-sm-start">
                    <div class="bg_darkprimary p-3 d-flex justify-content-center align-items-center">
                        <img src="{{asset('frontend/images/locationIcon.svg')}}" alt="location">
                    </div>
                    <div>
                        <p class='fs-6 fw-bold font_montserrat mb-1'>Location Address</p>
                        <p class="mb-0" style="max-width: 300px;">{{setting()->address}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 mb-4 flex-column flex-sm-row text-center text-sm-start">
                    <div class="bg_darkprimary p-3 d-flex justify-content-center align-items-center">
                        <img src="{{asset('frontend/images/emailIcon.svg')}}" alt="email">

                    </div>
                    <div>
                        <p class='fs-6 fw-bold font_montserrat mb-1'>Email Address</p>
                        <p class="mb-0" style="max-width: 300px;">{{setting()->email}}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3 mb-4 flex-column flex-sm-row text-center text-sm-start">
                    <div class="bg_darkprimary p-3 d-flex justify-content-center align-items-center">
                        <img src="{{asset('frontend/images/phoneIcon.svg')}}" alt="phone">
                    </div>
                    <div>
                        <p class='fs-6 fw-bold font_montserrat mb-1'>Phone Number</p>
                        <p class="mb-0" style="max-width: 300px;">{{setting()->phone}}</p>
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



