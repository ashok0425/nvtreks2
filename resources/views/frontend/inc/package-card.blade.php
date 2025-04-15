<div class="card border-0 bg-white rounded overflow-hidden hover_effect rounded-0" style="height: 435px">
    <div class="position-relative">
        <img src="{{getImageUrl($package->thumbnail)}}" alt="{{$package->name}}"
            class="img-fluid w-100 rounded-0" style="height: 180px">
        <div class="badge-container position-absolute top-0 end-0 py-3 px-1">
            @if ($package->is_luxury!=null)
            <div class="badge-arrow bg_darkOrange">
                <i class="fas fa-crown"></i>
                LUXURY
            </div>
            @elseif($package->is_group)
            <div class="badge-arrow bg-danger">
                <i class="fas fa-crown"></i>
                GROUP JOINING
            </div>
            @elseif($package->discounted_price!=null)
            <div class="badge-arrow bg_lightGreen">
                <i class="fas fa-crown"></i>
                DISCOUNTED PRICE
            </div>
            @endif

        </div>
        <div class="position-absolute bottom-0 w-100 py-2" style="background-color: #0791BE4D;">
            <div
                class="d-flex justify-content-center align-items-center gap-2 text-white fw-bold mb-0">
                <i class="far fa-clock"></i> {{$package->duration}}
            </div>
        </div>
    </div>
    <div class="card-body p-3">
        <div class="d-flex justify-content-between align-items-center mb-md-3 mb-2">
            <div class="d-flex text_darkGray font_montserrat gap-1">
                <i class="fas fa-map-marker-alt"></i>
                <p class="mb-0 small">{{$package->category?->name}}</p>
            </div>
            <div class="d-flex align-items-center text_darkGray font_montserrat gap-2">
                <img src="{{asset('frontend/images/speedmetereasyImg.png')}}" alt="Speed Meter Easy" width="32"
                    height="32" loading='lazy'>
                <p class="mb-0 small">{{$package->difficulty}}</p>
            </div>
        </div>
        <h5 class="popular_card_head mb-md-4 mb-3 text-start">{{$package->name}}
        </h5>
        <div class="d-flex align-items-center gap-1 mb-md-4 mb-3">
            <span class="small text_darkGray">({{$package->testimonial_count}} reviews)</span>
            @for ($i = 1; $i <= $package->testimonial_avg; $i++)
            ⭐
             @endfor
              @for ($i = 1; $i <= 5 - $package->testimonial_avg; $i++)
                <i class="far fa-star text-gray"></i>
              @endfor
        </div>
        <div
            class="d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-3">
            <div>
                <span class="fw-bold text_lightGrey">From </span>
                @if ($package->discounted_price)
                <span class="text_lightGreen fw-bolder">${{$package->discounted_price}} </span>
                <span class="text_lightGrey text-decoration-line-through">${{$package->price}}</span>
                @else
                <span class="text_lightGreen fw-bolder">${{$package->price}} </span>
                @endif

            </div>
            <a href="{{route('package.detail',['url'=>$package->url])}}" class="btn btn_darkprimary rounded-0 px-3">VIEW DETAILS</a>
        </div>
    </div>
</div>
