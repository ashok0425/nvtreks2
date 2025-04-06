@php
    $footer_image = Cache::remember('footer_image', 604800, function () {
        $data = [
            'logo' => getImageurl('footer-img.webp'),
            'insta' => getImageurl('insta.webp'),
            'facebook' => getImageurl('facebook.webp'),
            'trip' => getImageurl('trip.webp'),
        ];
        return $data;
    });
@endphp
<footer>
    {{-- https://www.figma.com/file/AooxbPw11smLpkqBr6iaYi/Nepal-Vision-T%26E?node-id=0%3A1 --}}
    <div class="container">
        <div class="main-footer">
            <div class="row">
                <div class="col-md-3 col-sm-6 d-none d-md-block">

                    <img src="{{ $footer_image['logo'] }}" alt="logo" class="img-fluid" height="250" width="250">
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-title custom-text-primary">
                        About Us
                    </div>
                    <ul>
                        @php
                            $children = DB::table('cms')
                                ->where('parent_id', 1)
                                ->where('status', 1)
                                ->get();
                            $term = DB::table('cms')
                                ->where('id', 38)
                                ->first();
                        @endphp
                        @foreach ($children as $child)
                            @if ($child->url != 'our-affiliations')
                                <li><a rel="noreferrer" target="_blank"
                                        href="{{ route('cms.detail', ['page' => 1, 'id' => $child->url]) }}"
                                        class="text-decoration-none text-light">{{ $child->title }}</a></li>
                            @endif
                        @endforeach

                        <li><a rel="noreferrer" target="_blank" href="{{ route('cms.page', ['page' => $term->url]) }}"
                                class="text-decoration-none text-light">Term & Conditions</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-title custom-text-primary">
                        Things to know
                    </div>
                    <ul>
                        @php
                            $children = DB::table('cms')
                                ->where('parent_id', 15)
                                ->limit(6)
                                ->where('status', 1)
                                ->get();
                        @endphp
                        @foreach ($children as $child)
                            <li><a rel="noreferrer" target="_blank"
                                    href="{{ route('cms.detail', ['page' => 15, 'id' => $child->url]) }}"
                                    class="text-decoration-none text-light">{{ $child->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-title custom-text-primary">Pay Safe With US</div>
                    <div class="payment-methods d-flex">
                        <i class="fab fa-paypal"></i> <i class="fab fa-cc-visa"></i> <i
                            class="fab fa-cc-mastercard"></i>
                    </div>
                    <p>We use secured 256-bit
                        encription while making
                        Payment.</p>
                </div>
            </div>
            <div class="row mt-1 mt-md-5">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-title custom-text-primary">
                        Read Our Blogs
                    </div>
                    <ul>
                        @php
                            $blogs = DB::table('blogs')
                                ->where('display_homepage', 1)
                                ->where('post_status', 'publish')
                                ->orderBy('ID', 'desc')
                                ->limit(6)
                                ->get();
                        @endphp
                        @foreach ($blogs as $blog)
                            <li><a href="{{ route('blog.detail', ['url' => $blog->url]) }}"
                                    class="text-decoration-none text-light">{{ $blog->post_title }}</a></li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-md-3  text-left">
                    <div class="footer-title custom-text-primary">
                        Head office (Nepal)
                    </div>
                    <ul>
                        <li>
                            Keshar Mahal, Thamel

                        </li>
                        <li>
                            Phone: <a rel="noreferrer" target="_blank" href="tel:977-1-4524762"
                                class="text-white text-decoration-none">977-1-4524762</a>

                        </li>
                        <li>
                            Fax: 977-1-4523296

                        </li>
                        <li>
                            Email:
                        </li>
                        <li>
                            <a rel="noreferrer" target="_blank" href="mailto:info@nepalvisiontreks.com"
                                class="text-white text-decoration-none">
                                info@nepalvisiontreks.com
                            </a>


                        </li>
                        <li>
                            <a rel="noreferrer" target="_blank"
                                href="mailto:sales@nepalvisiontreks.com
                            "
                                class="text-white text-decoration-none">
                                sales@nepalvisiontreks.com

                            </a>

                        </li>
                    </ul>

                </div>

                <div class="col-md-3   text-left">
                    <div class="footer-title custom-text-primary">
                        USA Contact Office
                    </div>
                    <ul>
                        <li>
                            Washington, DC, USA

                        </li>
                        <li>
                            Phone:<a rel="noreferrer" target="_blank" href="tel:+1 202-368-6657"
                                class="text-white text-decoration-none"> +1 202-368-6657</a>


                        </li>
                        <li>
                            Parashu Nepal


                        </li>
                        <li>
                            Marketing Director
                        </li>
                        <li>
                            Email:


                        </li>
                        <li>
                            <a rel="noreferrer" target="_blank" href="mailto:parashu@nepalvisiontreks.com"
                                class="text-white text-decoration-none">
                                parashu@nepalvisiontreks.com
                            </a>

                        </li>
                    </ul>

                </div>





                <div class="col-md-3  text-left">
                    <div class="footer-title custom-text-primary">
                        Australia Branch Office
                    </div>
                    <ul>
                        <li>
                            Sydney, Australia
                        </li>
                        <li>
                            Phone: <a rel="noreferrer" target="_blank" href="tel:+61 426 730 548"
                                class="text-white text-decoration-none"> +61 426 730 548</a>
                        </li>
                        <li>
                            Ashim Wagle
                        </li>
                        <li>
                            Marketing Director

                        </li>
                        <li>
                            Email:
                        </li>
                        <li>
                            <a rel="noreferrer" target="_blank" href="mailto:ashim@nepalvisiontreks.com"
                                class="text-white text-decoration-none">
                                ashim@nepalvisiontreks.com
                            </a>

                        </li>

                    </ul>

                </div>







            </div>
        </div>
        @php
            $website = DB::table('websites')->first();
        @endphp
        <div class="bottom-footer d-flex justify-content-between flex-column flex-md-row">
            <p>Copyright © {{ date('Y') }} NepalVisionTreks. All right Reserved</p>
            <p>Follow Us : <a rel="noreferrer" target="_blank" href="{{ $website->facebook }}"
                    class="text-white text-decoration-none"><img src="{{ $footer_image['facebook'] }}" alt="facebook"
                        width="20" height="20"></a> | <a rel="noreferrer" target="_blank"
                    href="{{ $website->instagram }}" class="text-white text-decoration-none"> <img
                        src="{{ $footer_image['insta'] }}" alt="insta" width="20" height="20"> </a> |<a
                    rel="noreferrer" target="_blank" href="{{ $website->youtube }}"
                    class="text-white text-decoration-none"><img src="{{ $footer_image['trip'] }}" alt="tripadvisior"
                        width="40" height="40"> </a></p>
        </div>
    </div>
</footer>


<div class="whatsapp-link ">

    <a rel="noreferrer" target="_blank" href="https://api.whatsapp.com/send?phone=9779802342081"><i
            class="fab fa-whatsapp p-2 bg-success text-white fa-2x rounded "></i></a>

</div>
<style>
    .whatsapp-link {
        position: fixed;
        bottom: 1rem;
        left: 1rem;
    }
</style>
