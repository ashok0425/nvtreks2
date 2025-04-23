
<section class="position-relative contact_info_section" style="background-image: url('{{('/frontend/images/contactus_banner.png'
)}}');background-size: cover;background-position: center;min-height: 100vh;">

    <!-- Dark overlay -->
    {{-- <div class="position-absolute top-0 start-0 w-100 h-100 z-1"

        style='background: linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0) 24%, rgba(0,0,0,0.9019257361147583) 5%)'
        >
    </div> --}}
    <div class="position-absolute top-0 start-0 w-100 h-100  z-3">
        <div class="container py-md-5 py-4">
            <!-- Section Title -->
            <div class="text-center text-white head_title pt-md-5 mb-4">
                Contact Us
            </div>

            <!-- Contact Cards -->
            <div class="p-md-3 p-2 mb-md-5 mb-4" style="background-color: #4690BF33;">
                <div class="splide g-4 contact_info_container" id="contact_info_container">
                    <div class="splide__track">
                        <ul class="splide__list">

                     <li class="splide__slide ">
                    <!-- Location 1 -->
                    <div class=" px-md-4 contact_info_card contact_info_card_broder">
                        <div class="text-center text-md-start">
                            <img src="{{asset('frontend/images/thamel_location.png')}}" alt="location" class="mb-md-3 mb-1" width="50"
                                height="50">
                            <div>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">{{setting()->address}}
                                </p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Phone: {{setting()->phone}}
                                </p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Fax: 977-1-4523296
                                </p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">
                                    {{setting()->email}}
                                </p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">
                                    {{setting()->email1}}</p>
                            </div>
                        </div>
                    </div>
                    </li>

                    <li class="splide__slide ">
                    <!-- Location 2 -->
                    <div class="px-md-4 contact_info_card contact_info_card_broder">
                        <div class="text-center text-md-start">
                            <img src="{{asset('frontend/images/usa_location.png')}}" alt="location" class="mb-md-3 mb-1" width="50"
                                height="50">
                            <div>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">{{setting()->address2}}
                                </p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Phone: {{setting()->phone2}}
                                </p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Parashu Nepal
                                    (Marketing
                                    Director)</p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">
                                    {{setting()->email2}}</p>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="splide__slide ">
                    <!-- Location 3 -->
                    <div class="px-md-4 contact_info_card contact_info_card_broder">
                        <div class="text-center text-md-start">
                            <img src="{{asset('frontend/images/australia_location.png')}}" alt="location" class="mb-md-3 mb-1"
                                width="50" height="50">
                            <div>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">{{setting()->address3}}</p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Whatsapp: {{setting()->phone3}}
                                    548
                                </p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Ashim Wagle
                                    (Marketing
                                    Director)</p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">
                                    {{setting()->phone3}}</p>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="splide__slide ">
                    <!-- Location 3 -->
                    <div class="px-md-4 contact_info_card contact_info_card_broder">
                        <div class="text-center text-md-start">
                            <img src="{{asset('frontend/images/location_canada.webp')}}" alt="location" class="mb-md-3 mb-1"
                                width="50" height="50">
                            <div>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">{{setting()->address4}}</p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Whatsapp: {{setting()->phone4}}

                                </p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Ashim Wagle
                                    (Marketing
                                    Director)</p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">
                                    {{setting()->phone4}}</p>
                            </div>
                        </div>
                    </div>
                </li>


                <li class="splide__slide ">
                    <!-- Location 3 -->
                    <div class="px-md-4 contact_info_card contact_info_card_broder">
                        <div class="text-center text-md-start">
                            <img src="{{asset('frontend/images/China.svg')}}" alt="location" class="mb-md-3 mb-1"
                                width="50" height="50">
                            <div>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">{{setting()->address5}}</p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Whatsapp: {{setting()->phone5}}

                                </p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Ashim Wagle
                                    (Marketing
                                    Director)</p>
                                <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">
                                    {{setting()->phone5}}</p>
                            </div>
                        </div>
                    </div>
                </li>
                        </ul>
                    </div>

                </div>

            </div>
            <div class="contact_imgs">
                <div class="splide" id="image-slider">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide d-flex align-items-center px-1 px-md-4 ">
                                <img src="{{asset('frontend/images/tripadvisorsymboImg.png')}}" alt="tripadvisor" class="img-fluid"
                                    width="34" height="34">
                            </li>
                            <li class="splide__slide d-flex align-items-center px-1 px-md-4 ">
                                <img src="{{asset('frontend/images/newyorktimesImg.png')}}" alt="newyorktimes" class="img-fluid"
                                    width="240" height="34">
                            </li>
                            <li class="splide__slide d-flex align-items-center px-1 px-md-4 ">
                                <img src="{{asset('frontend/images/expedia_logoImg.png')}}" alt="expedia" class="img-fluid" width="95"
                                    height="34">
                            </li>
                            <li class="splide__slide d-flex align-items-center px-1 px-md-4 ">
                                <img src="{{asset('frontend/images/condnasttraveler_logoImg.png')}}" alt="condé nast" class="img-fluid"
                                    width="81" height="34">
                            </li>
                            <li class="splide__slide d-flex align-items-center px-1 px-md-4 ">
                                <img src="{{asset('frontend/images/lonelyplanetlogoImg.png')}}" alt="lonely planet" class="img-fluid"
                                    width="69" height="34">
                            </li>
                            <li class="splide__slide d-flex align-items-center px-1 px-md-4 ">
                                <img src="{{asset('frontend/images/forbestravelguide_logoImg.png')}}" alt="forbes travel"
                                    class="img-fluid" width="120" height="34">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
