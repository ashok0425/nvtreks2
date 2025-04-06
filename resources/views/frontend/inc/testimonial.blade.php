
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
                                @foreach (DB::table('testimonials')
                                ->where('status', 1)
                                ->whereRaw('(LENGTH(content) - LENGTH(REPLACE(content, " ", "")) + 1) < 60')
                                ->orderByRaw('(LENGTH(content) - LENGTH(REPLACE(content, " ", "")) + 1) DESC')
                                ->limit(5)
                                ->get() as $testimonial)
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


    {{-- <section class="position-relative" style="background-image: url('/frontend/images/testimonials_banner.png'); background-size: cover; background-position: center; min-height: 550px;">
        <!-- White overlay -->
        <div class="bg_whiteoverlay"></div>

        <div class="testimonial-content">
            <div class="text-center mb-md-5 mt-md-4 pt-md-4 pt-3">
                <h3 class="head_title text-dark">TESTIMONIALS</h3>
            </div>

            <div class="container" style="max-width: 910px;">
                <div class="testimonial_slider position-relative">
                    <div class="splide splide--loop splide--ltr splide--draggable is-active is-overflow is-initialized" id="testimonialSlider" role="region" aria-roledescription="carousel">
                        <div class="splide__track splide__track--loop splide__track--ltr splide__track--draggable" id="testimonialSlider-track" style="padding-left: 0px; padding-right: 0px;" aria-live="polite" aria-atomic="true">
                            <ul class="splide__list" id="testimonialSlider-list" role="presentation" style="transform: translateX(-828px);">
                                <li class="splide__slide my-4 splide__slide--clone is-prev" id="testimonialSlider-clone02" role="tabpanel" aria-roledescription="slide" aria-label="3 of 3" style="margin-right: 1rem; width: calc(100% + 0rem);" aria-hidden="true">
                                    <div class="text-center mb-md-5 mb-3">
                                        <p class="font_montserrat fs-6 fst-italic mb-md-5 mb-3">"Dolorum aenean
                                            dolorem minima! Voluptatum? Corporis condimentum ac
                                            primis fusce, atque! Vivamus. Non cupiditate natus excepturi, quod
                                            quo, aute facere? Deserunt aliquip, egestas ipsum, eu. Dolorum
                                            aenean dolorem minima!? Corporis condi mentum acpri!"</p>

                                        <p class="font_montserrat fs-5 fst-italic mb-1 fw-bold text_darkprimary">
                                            Scott Marx</p>
                                        <p class="font_montserrat fs-6 fst-italic mb-0">Canada</p>
                                    </div>
                                </li><li class="splide__slide my-4 is-active is-visible" id="testimonialSlider-slide01" role="tabpanel" aria-roledescription="slide" aria-label="1 of 3" style="margin-right: 1rem; width: calc(100% + 0rem);">
                                    <div class="text-center mb-md-5 mb-3">
                                        <p class="font_montserrat fs-6 fst-italic mb-md-5 mb-3">"Dolorum aenean
                                            dolorem minima! Voluptatum? Corporis condimentum ac
                                            primis fusce, atque! Vivamus. Non cupiditate natus excepturi, quod
                                            quo, aute facere? Deserunt aliquip, egestas ipsum, eu. Dolorum
                                            aenean dolorem minima!? Corporis condi mentum acpri!"</p>

                                        <p class="font_montserrat fs-5 fst-italic mb-1 fw-bold text_darkprimary">
                                            Scott Marx</p>
                                        <p class="font_montserrat fs-6 fst-italic mb-0">Canada</p>
                                    </div>
                                </li>
                                <li class="splide__slide my-4 is-next" id="testimonialSlider-slide02" role="tabpanel" aria-roledescription="slide" aria-label="2 of 3" style="margin-right: 1rem; width: calc(100% + 0rem);" aria-hidden="true">
                                    <div class="text-center mb-md-5 mb-3">
                                        <p class="font_montserrat fs-6 fst-italic mb-md-5 mb-3">"Dolorum aenean
                                            dolorem minima! Voluptatum? Corporis condimentum ac
                                            primis fusce, atque! Vivamus. Non cupiditate natus excepturi, quod
                                            quo, aute facere? Deserunt aliquip, egestas ipsum, eu. Dolorum
                                            aenean dolorem minima!? Corporis condi mentum acpri!"</p>

                                        <p class="font_montserrat fs-5 fst-italic mb-1 fw-bold text_darkprimary">
                                            Scott Marx</p>
                                        <p class="font_montserrat fs-6 fst-italic mb-0">Canada</p>
                                    </div>
                                </li>
                                <li class="splide__slide my-4" id="testimonialSlider-slide03" role="tabpanel" aria-roledescription="slide" aria-label="3 of 3" style="margin-right: 1rem; width: calc(100% + 0rem);" aria-hidden="true">
                                    <div class="text-center mb-md-5 mb-3">
                                        <p class="font_montserrat fs-6 fst-italic mb-md-5 mb-3">"Dolorum aenean
                                            dolorem minima! Voluptatum? Corporis condimentum ac
                                            primis fusce, atque! Vivamus. Non cupiditate natus excepturi, quod
                                            quo, aute facere? Deserunt aliquip, egestas ipsum, eu. Dolorum
                                            aenean dolorem minima!? Corporis condi mentum acpri!"</p>

                                        <p class="font_montserrat fs-5 fst-italic mb-1 fw-bold text_darkprimary">
                                            Scott Marx</p>
                                        <p class="font_montserrat fs-6 fst-italic mb-0">Canada</p>
                                    </div>
                                </li>
                            <li class="splide__slide my-4 splide__slide--clone is-active" id="testimonialSlider-clone03" role="tabpanel" aria-roledescription="slide" aria-label="1 of 3" style="margin-right: 1rem; width: calc(100% + 0rem);" aria-hidden="true">
                                    <div class="text-center mb-md-5 mb-3">
                                        <p class="font_montserrat fs-6 fst-italic mb-md-5 mb-3">"Dolorum aenean
                                            dolorem minima! Voluptatum? Corporis condimentum ac
                                            primis fusce, atque! Vivamus. Non cupiditate natus excepturi, quod
                                            quo, aute facere? Deserunt aliquip, egestas ipsum, eu. Dolorum
                                            aenean dolorem minima!? Corporis condi mentum acpri!"</p>

                                        <p class="font_montserrat fs-5 fst-italic mb-1 fw-bold text_darkprimary">
                                            Scott Marx</p>
                                        <p class="font_montserrat fs-6 fst-italic mb-0">Canada</p>
                                    </div>
                                </li><li class="splide__slide my-4 splide__slide--clone" id="testimonialSlider-clone04" role="tabpanel" aria-roledescription="slide" aria-label="2 of 3" style="margin-right: 1rem; width: calc(100% + 0rem);" aria-hidden="true">
                                    <div class="text-center mb-md-5 mb-3">
                                        <p class="font_montserrat fs-6 fst-italic mb-md-5 mb-3">"Dolorum aenean
                                            dolorem minima! Voluptatum? Corporis condimentum ac
                                            primis fusce, atque! Vivamus. Non cupiditate natus excepturi, quod
                                            quo, aute facere? Deserunt aliquip, egestas ipsum, eu. Dolorum
                                            aenean dolorem minima!? Corporis condi mentum acpri!"</p>

                                        <p class="font_montserrat fs-5 fst-italic mb-1 fw-bold text_darkprimary">
                                            Scott Marx</p>
                                        <p class="font_montserrat fs-6 fst-italic mb-0">Canada</p>
                                    </div>
                                </li></ul>
                        </div>
                    <ul class="splide__pagination splide__pagination--ltr" role="tablist" aria-label="Select a slide to show"><li role="presentation"><button class="splide__pagination__page is-active" type="button" role="tab" aria-controls="testimonialSlider-slide01" aria-label="Go to slide 1" aria-selected="true"></button></li><li role="presentation"><button class="splide__pagination__page" type="button" role="tab" aria-controls="testimonialSlider-slide02" aria-label="Go to slide 2" tabindex="-1"></button></li><li role="presentation"><button class="splide__pagination__page" type="button" role="tab" aria-controls="testimonialSlider-slide03" aria-label="Go to slide 3" tabindex="-1"></button></li></ul></div>

                </div>

                <div class="d-flex justify-content-center mt-2 gap-2">
                    <div>
                        <img src="./images/starImg.png" alt="star" class="img-fluid" width="34" height="34">
                    </div>
                    <div>
                        <img src="./images/tripadvisorsymboImg.png" alt="tripadvisor" class="img-fluid" width="34" height="34">
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
