
    <!-- TESTIMONIALS -->
    <section class="position-relative"
        style="background-image: url({{asset('frontend/images/testimonials_banner.png')}}); background-size: cover; background-position: center; min-height: 550px;">
        <!-- White overlay -->
        <div class="bg_whiteoverlay"></div>

        <div class="testimonial-content">
            <div class="text-center mb-md-5 mt-md-4 pt-md-4 pt-3">
                <h3 class='head_title text-dark'>TESTIMONIALS</h3>
            </div>

            <div class="container" style="max-width: 910px;">
                <div class="testimonial_slider position-relative">
                    <div class="splide" id="testimonialSlider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($testimonials as $testimonial)
                                <li class="splide__slide my-4">
                                    <div class="text-center mb-md-5 mb-3">
                                        <p class='font_montserrat fs-6 fst-italic mb-md-5 mb-3'>{!! strip_tags($testimonial->content),100 !!}</p>

                                        <p class='font_montserrat fs-5 fst-italic mb-1 fw-bold text_darkprimary'>
                                            {{ $testimonial->name }}</p>
                                        <p class='font_montserrat fs-6 fst-italic mb-0'>Canada</p>
                                    </div>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-center mt-2 gap-2">
                    <div>
                        <img src="{{asset('frontend/images/starImg.png')}}" alt="star" class='img-fluid' width="34" height="34">
                    </div>
                    <div>
                        <img src="{{asset('frontend/images/tripadvisorsymboImg.png')}}" alt="tripadvisor" class='img-fluid' width="34"
                            height="34">
                    </div>
                </div>
            </div>
        </div>
    </section>
