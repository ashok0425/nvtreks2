@extends('frontend.layout.master')


@section('title')
    Contact Us| Nepal Vision Treks & Expedition
@endsection
@section('descr')
    Just Send Us your queries or concerns and we will give you the help you need
@endsection
@section('keyword')
    Contact
@endsection

@section('url')
    {{ Request::url() }}
@endsection
<style>
    .cont div {
        line-height: 2
    }

    .cont .fas {
        font-size: 30px !important;
        color: rgb(42, 135, 183) !important;
        margin-bottom: 6px;

    }

    .input.form-control {
        border-radius: 0px !important;
        border: 1px solid rgb(148, 146, 146) !important;
        outline: none;
    }

    .input.form-control:focus {
        outline: none;
        box-shadow: none;

    }

    label {
        color: gray;
    }
</style>
@php
    define('PAGE', 'contact');
    $num = rand(1, 7);
@endphp
@section('content')
    <x-page-header title="Contact" :route="route('contactus')" :img="getImageurl('banners/' . $num . '.webp')" />
    <main>

        <section class="my-0 py-0">
            {{-- social media lins icon setcion start  --}}
            <div class="card mb-4">
                <div class="card-body pb-5">
                    <div class="col-md-4 offset-md-4">
                        <div class="social-media text-center mt-2">

                            <h2 class="subscribe__title custom-text-primary   mb-3">Follow us on social media</h2>

                            <div class=" d-flex justify-content-center">
                                <a href="{{ $detail->facebook }}" rel="noreferrer" target="_blank" class="mx-2 fab_wrapper">
                                    <i class="fab fa-facebook text-white"></i>
                                </a>
                                <a href="{{ $detail->instagram }}" rel="noreferrer" target="_blank"
                                    class="mx-2 fab_wrapper">
                                    <i class="fab fa-instagram text-white"></i>
                                </a>

                                <a href="{{ $detail->twitter }}" rel="noreferrer" target="_blank" class="mx-2 fab_wrapper">

                                    <i class="fab fa-twitter text-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- social media lins icon setcion End  --}}

            <div class="container my-0 py-0">
                <div class="row my-0 py-0">
                    {{-- contact form section  start --}}
                    <div class="col-md-7">

                        <div class="contact-container ">
                            <h2 class="subscribe__title custom-text-primary   mb-3">Contact Form</h2>

                            <div class="card shadow-sm border-0 ">
                                <div class="card-body">
                                    {{-- <h3 class="subscribe__title custom-text-primary  text-center">Let's have a Talk</h3> --}}

                                    <form action="{{ route('contactus.store') }}" method="POST" class=" pt-2">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name">First name<span class="text-danger">*</span></label>
                                                <input type="text" name="fname" id="name"
                                                    class="input form-control" required
                                                    placeholder="Enter your first name" />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="name">Last name<span class="text-danger">*</span></label>
                                                <input type="text" name="lname" id="name"
                                                    class="input form-control" placeholder="Enter your last name" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="name">Phone<span class="text-danger">*</span></label>
                                                <input type="text" name="phone" id="name"
                                                    class="input form-control" required
                                                    placeholder="Enter your phone number" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email">Email<span class="text-danger">*</span></label>
                                                <input type="email" name="email" id="name"
                                                    class="input form-control" required placeholder="Enter your Email" />
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="email">Message*</label>
                                                <textarea placeholder="Your Message" name="comment" class="form-control input"></textarea>
                                            </div>
                                            <div class="col-md-4 offset-md-8">
                                                <button class="btn btn-primary w-100">
                                                    Send Message
                                                </button>
                                            </div>


                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                    {{-- contact form section  End --}}
                </div>

                {{-- contact Info section  start --}}
                <div class="col-md-4 offset-md-1">
                    <h2 class="subscribe__title custom-text-primary   mb-3">Contact us</h2>

                    <div class="card border-0 shadow-sm pb-4">
                        <div class="card-body py-2 py-md-4">

                            <div class="custom-bg-primary mx-4 mb-4 p-3">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="custom-fs-28 text-white"><i class="fas fa-phone-alt "></i> </div>

                                    </div>

                                    <div class="mx-2">

                                        <div class="custom-fs-16 text-white"><a href="tel:{{ $detail->expert_phone1 }}"
                                                class="text-decoration-none text-white">{{ $detail->expert_phone1 }}</a>
                                        </div>
                                        <div class="custom-fs-16 "><a href="tel:{{ $detail->expert_phone2 }}"
                                                class="text-decoration-none text-white">{{ $detail->expert_phone2 }}</a>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="custom-bg-primary mx-4 mb-4 p-3">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="custom-fs-28 text-white"><i class="fas fa-envelope "></i> </div>

                                    </div>

                                    <div class="mx-2">

                                        <div class="custom-fs-16 text-white"><a href="mailto:{{ $detail->email }}"
                                                class="text-decoration-none text-white">{{ $detail->email }}</a></div>
                                        <div class="custom-fs-16 "><a href="mailto:{{ $detail->email3 }}"
                                                class="text-decoration-none text-white">{{ $detail->email3 }}</a></div>

                                    </div>

                                </div>
                            </div>


                            <div class="custom-bg-primary mx-4 mb-4 p-3">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="custom-fs-28 text-white"><i class="fas fa-map-marker-alt"></i></div>

                                    </div>

                                    <div class="mx-2">

                                        <div class="custom-fs-16 text-white"><a
                                                class="text-decoration-none text-white">{{ $detail->address }}</a></div>


                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- contact Info section  End --}}

            </div>
            </div>


            {{-- map section  start  --}}
            <section class=" mt-0 pt-0">
                <div class="card border-0 shadow-sm ">
                    <div class="map mt-5">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.0405213358467!2d85.31063831423583!3d27.716035131718705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fd2e54a635%3A0xfa1e397a6cabee52!2sNepal%20Vision%20Treks%20%26%20Expedition%20Pvt%20Ltd!5e0!3m2!1sen!2snp!4v1644722965719!5m2!1sen!2snp"
                            width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                </div>
            </section>
            {{-- map section end  --}}


            {{-- usa branch office section  --}}

            <div class="card border-0 shadow-sm mt-2">
                <div class="card-body py-3">
                    <h2 class="subscribe__title custom-text-primary  text-center mb-3">USA Branch Office</h2>

                    <div class="row">
                        <div class="col-md-3 ">


                            <div class="custom-bg-primary  mb-4 p-3 py-4">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="custom-fs-22 text-white"><i class="fas fa-phone-alt "></i> </div>

                                    </div>

                                    <div class="mx-2">

                                        <div class="custom-fs-16 "><a href="tel:{{ $detail->phone2 }}"
                                                class="text-decoration-none text-white">{{ $detail->phone2 }}</a></div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-1">

                            <div class="custom-bg-primary  mb-4 p-3 py-4 mx-md-5 mx-0">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="custom-fs-22 text-white"><i class="fas fa-envelope "></i> </div>

                                    </div>

                                    <div class="mx-2">

                                        <div class="custom-fs-16 "><a href="mailto:{{ $detail->email2 }}"
                                                class="text-decoration-none text-white">{{ $detail->email2 }}</a></div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 offset-md-1">

                            <div class="custom-bg-primary mb-4 p-3 py-4">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="custom-fs-22 text-white"><i class="fas fa-map-marker-alt"></i></div>

                                    </div>

                                    <div class="mx-2">

                                        <div class="custom-fs-16 text-white"><a
                                                class="text-decoration-none text-white">{{ $detail->address2 }}</a></div>


                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>



        </section>
    </main>


    @include('frontend.template.subscribe')
@endsection
