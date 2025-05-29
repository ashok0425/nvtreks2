<tr class="{{ $hidden ?? false ? 'extra-row d-none' : '' }}">
    <td class='trip_table_text fw-bold'>{{Str::limit($departure->package->name,25)}}</td>
    <td>
        <span class='trip_table_text fw-bolder'>{{$departure->package->duration}}</span><br />

        <span class='fs-6 text_lightDark'>
            From {{ date("j F", strtotime($departure->start_date)) }} -
            @if($departure->package->duration)
                @php
                    $durationDays = (int) filter_var($departure->package->duration, FILTER_SANITIZE_NUMBER_INT);
                @endphp
                {{ date('j F, Y', strtotime($departure->start_date . ' + ' . ($durationDays - 1) . ' days')) }}
            @else
                {{ date("j F", strtotime($departure->start_date)) }}
            @endif
        </span>
    </td>
    <td>
        <p class="d-flex align-items-center gap-1 mb-0 fw-bold trip_table_text">
            <img loading="lazy" data-src="{{asset('frontend/images/gurantedIcon.png')}}" alt="guranted" width="24" height="24">Guaranteed
        </p>
        @php
            $totalSeats = $departure->total_seats;
            $bookedSeats = $departure->booked_seats;
            $seatsLeft = $totalSeats - $bookedSeats;
            $progressPercentage = ($totalSeats > 0) ? round(($bookedSeats / $totalSeats) * 100) : 0;
        @endphp

        <span class='fs-6 font_montserrat'>{{ $seatsLeft }} Seat{{ $seatsLeft > 1 ? 's' : '' }} Left</span>
        <div class="progress">
            <div class="progress-bar bg_lightprimary rounded-0" role="progressbar"
                style="width: {{ $progressPercentage }}%" aria-valuenow="{{ $progressPercentage }}"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </td>
    <td>
        <span class="fs-6 font_montserrat fw-bolder">${{$departure->package->discounted_price}}</span>
        <span class="original-price ps-2 text-decoration-line-through text-danger small">${{$departure->package->price}}</span>
        <div>
            <a href="{{ route('booknow',['package'=>$departure->package_id,'destination'=>$departure->package->destination_id,'size'=>2,'departure_date'=>$departure->start_date]) }}" class="btn btn_lightprimary_outline mt-2 rounded-0 px-md-4 py-md-2" >JOIN US</a>
        </div>
    </td>
</tr>
