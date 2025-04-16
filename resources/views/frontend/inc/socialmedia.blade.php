

    <!-- social media -->
    <section class="bg-white py-md-5">
        <div class="container py-md-5 py-4">
            <div class="d-flex justify-content-center text-center mb-md-5 mb-4">
                <div>
                    <div class="section-header mb-md-1 d-flex justify-content-center">
                        <hr class="section-line py-2">
                        <p class="section-subtitle">OUR SOCIAL MEDIA</p>
                    </div>
                    <h2 class="head_title mb-md-3">FOLLOW US ON INSTAGRAM</h2>
                    <p class="text_lightDark font_montserrat mb-0" style="max-width: 800px;">
                        Explore our curated list of the best countries to visit and discover incredible destinations
                        waiting to be explored
                    </p>
                </div>
            </div>

            <div class="row gap-md-3 gap-3">
                @foreach (App\Models\MainSlider::where('status',1)->where('type',3)->get() as $social)
                     <!-- Instagram Post 1 -->
                <div class="col-12 col-md-4 ">
                    {!! $social->details !!}
                </div>
                @endforeach



                <!-- Repeat the above block for more Instagram posts (change images & likes) -->

        </div>
    </section>
