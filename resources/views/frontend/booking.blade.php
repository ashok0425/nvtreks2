@extends('frontend.layout.master')


@section('content')
{!! NoCaptcha::renderJs() !!}
    @include('frontend.inc.banner')
    <section class='mb-md-5 mb-4'>
        <div class='container'>
            <div class='row'>
                <div class='col-md-6 mb-4 mb-md-0'>
                    <div class='section-header justify-content-md-start justify-content-center'>
                        <hr class='section-line py-2'>
                        <p class='section-subtitle'>BOOKING</p>
                    </div>
                    <h2 class='head_title mb-3 text-md-start text-center'>TIME TO BOOK YOUR HOLIDAY</h2>
                    <p class='section-description mb-4'>Your next adventure is just a few clicks away. Whether you're dreaming of mountain trails, cultural wonders, or peaceful escapes, now is the perfect moment to turn those travel plans into reality. Let’s make it happen!</p>
                    <div id="bookingApp">
                        <form action="{{ route('booknow.store') }}" method="POST">
                            @csrf
                            <!-- Name -->
                            <div class="mb-3 mb-md-4">
                                <input type="text" class="form-control rounded-0 py-3" name="name" required
                                    placeholder="Your Name*" v-model="form.name">
                            </div>

                            <!-- Email -->
                            <div class="mb-3 mb-md-3">
                                <input type="email" class="form-control rounded-0 py-3" name="email" required
                                    placeholder="Your Email*" v-model="form.email">
                            </div>

                            <!-- Phone -->
                            <div class="mb-3 mb-md-4">
                                <input type="number" class="form-control rounded-0 py-3" name="phone" required
                                    placeholder="Your Number*" v-model="form.phone">
                            </div>


                            <!-- Packages -->
                            <div class="mb-3 mb-md-3">
                                <select class="form-select rounded-0 py-3" name="package_id" v-model="form.package_id">
                                    <option value="">Packages</option>
                                    <option v-for="pkg in allPackages" :key="pkg.id" :value="pkg.id">
                                        @{{ pkg.name }}
                                    </option>
                                </select>
                            </div>


                            @if (request()->query('type') == 'payment')
                                <input type="hidden" name="type" value="2">
                                <div class="mb-3 mb-md-4">
                                    <input type="number" class="form-control rounded-0 py-3" name="amount" required
                                        placeholder="Amount want to pay (USD)">
                                </div>
                                @else
                                  <!-- Phone -->
                            <div class="mb-3 mb-md-4">
                                <input type="number" class="form-control rounded-0 py-3" name="group_size" required
                                    placeholder="Group Size*" v-model="form.group_size">
                            </div>
                            <!-- Destination -->
                            {{-- <div class="mb-3 mb-md-3">
                                <select class="form-select rounded-0 py-3" name="destination_id"
                                    v-model="form.destination_id">
                                    <option value="">Choose Destination</option>
                                    @foreach ($destinations as $destination)
                                        <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <!-- Departure Date -->
                            <div class="mb-3 mb-md-4">
                                <input type="date" class="form-control rounded-0 py-3" name="departure_date" required
                                    :min="today" v-model="form.departure_date">
                            </div>
                            @endif
                            <!-- Message -->
                            <div class=" mb-md-5">
                                <textarea class="form-control rounded-0" name="message" rows="5" placeholder="Your Message*" required
                                    v-model="form.message"></textarea>
                            </div>

                             <div>
                                 {!! app('captcha')->display() !!}
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span class="help-block text-danger">
                                                        <strong>Invalid Captch</strong>
                                                    </span>
                                                @endif
                             </div>
                            <!-- Submit -->
                            <button class="btn mt-3 btn_darkprimary rounded-0 py-2 py-md-3 px-3 px-md-4 fw-semibold"
                                type="submit">
                                @if (request()->query('type') == 'payment')
                                    Continue Payment
                                @else
                                    BOOK A TRIP
                                @endif
                            </button>

                        </form>
                    </div>

                </div>
            <div class='col-md-6 px-md-5'>
  <div class='border-bottom border-black pb-md-5 pb-3 mb-md-5 mb-3'>
    <h5 class='fw-bolder fs-4 mb-3'>1. Payment by wire transfer</h5>
    <p class='mb-2 fs_18'><span class='text_darkOrange fw-bolder'>Beneficiary Bank :</span> Himalayan Bank Ltd.</p>
    <p class='mb-2 fs_18'><span class='text_darkOrange fw-bolder'>Beneficiary Company :</span> Nepal Vision Treks & Expedition (P). Ltd.</p>
    <p class='mb-2 fs_18'><span class='text_darkOrange fw-bolder'>Account No :</span> 01900041700038</p>
    <p class='mb-2 fs_18'><span class='text_darkOrange fw-bolder'>Account Type :</span> Current Account</p>
    <p class='mb-2 fs_18'><span class='text_darkOrange fw-bolder'>Bank Address :</span> Sanchaya Kosh Building, Tridevimarga</p>
    <p class='mb-2 fs_18'><span class=''>P.O. Box :</span> 20590, Thamel, Kathmandu</p>
    <p class='mb-2 fs_18'><span class=''>SWIFT :</span> HIMANPKA</p>
    <p class='mb-2 fs_18'><span class=''>Web Address :</span> www.himalayanbank.com</p>
  </div>

  <h5 class='fw-bolder fs-4 mb-3'>2. Payment by wire transfer</h5>
  <p class='mb-2 fs_18'><span class='text_darkOrange fw-bolder'>Beneficiary Bank :</span> Nabil Bank Ltd.</p>
  <p class='mb-2 fs_18'><span class='text_darkOrange fw-bolder'>Beneficiary Company :</span> Nepal Vision Treks & Expedition (P). Ltd.</p>
  <p class='mb-2 fs_18'><span class='text_darkOrange fw-bolder'>Account No :</span> 0102211820301</p>
  <p class='mb-2 fs_18'><span class='text_darkOrange fw-bolder'>Account Type :</span> Current Account</p>
  <p class='mb-2 fs_18'><span class='text_darkOrange fw-bolder'>Bank Address :</span> Nabil House, Kamaladi, Kathmandu</p>
  <p class='mb-2 fs_18'><span class=''>P.O. Box :</span> 3729, Kathmandu</p>
  <p class='mb-2 fs_18'><span class=''>SWIFT :</span> NARBNPKA</p>
  <p class='mb-2 fs_18'><span class=''>Web Address :</span> www.nabilbank.com</p>
</div>


            </div>
        </div>
    </section>



    @include('frontend.inc.contactus')
@endsection

@push('style')
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>
        new Vue({
            el: '#bookingApp',
            data: {
                today: new Date().toISOString().split('T')[0],
                allPackages: @json($packages),
                form: {
                    name: "{{ old('name') }}",
                    email: "{{ old('email') }}",
                    phone: "{{ old('phone') }}",
                    group_size: "{{ old('group_size', request()->query('size')) }}",
                    destination_id: "{{ old('destination_id', request()->query('destination')) }}",
                    package_id: "{{ old('package_id', request()->query('package')) }}",
                    departure_date: "{{ old('departure_date', request()->get('departure_date', date('Y-m-d'))) }}",
                    message: "{{ old('message') }}"
                }
            },
            computed: {
                filteredPackages() {
                    if (!this.form.destination_id) return [];
                    return this.allPackages.filter(pkg => pkg.destination_id == this.form.destination_id);
                }
            }
        });
    </script>
@endpush
