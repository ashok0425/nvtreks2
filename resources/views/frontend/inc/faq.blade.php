
<section class="my-5 py-md-5">
    <div class="container">
        <div class="d-flex justify-content-center text-center mb-md-5 mb-4">
            <div>
                <div class="section-header mb-md-1 d-flex justify-content-center">
                    <hr class="section-line py-2">
                    <p class="section-subtitle">THINGS TO KNOW</p>
                </div>
                <h2 class="head_title mb-md-3">FAQs</h2>
                <p class="text_lightDark font_montserrat mb-0" style="max-width: 800px;">
                    Explore our curated list of the best countries to visit in 2024 and discover incredible
                    destinations waiting to be explored.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 faqs_accordion">
                <div class="accordion" id="faqAccordion">
                    @foreach ($faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button accordion_button_title py-4" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-expanded="true"
                                aria-controls="collapse{{$faq->id}}">
                                {!! strip_tags($faq->question) !!}
                            </button>
                        </h2>
                        <div id="collapse{{$faq->id}}" class="accordion-collapse collapse {{$loop->first?'show':''}}" aria-labelledby="headingcollapse{{$faq->id}}"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p class="accordion_body_content text_lightDark font_montserrat mb-0">
                                    {!! strip_tags($faq->answer) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="col-md-4">
                <img src="{{asset('frontend/images/faqs_banner.png')}}" alt="Nepalvision trek Faq" class="img-fluid" loading='lazy'>
            </div>
        </div>
    </div>
</section>
