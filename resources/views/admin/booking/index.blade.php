@extends('admin.layouts.app')
@section('content')

<div class="container">
     <div class="ml-auto" style="width: 230px;">
        <form action="" >
            <div class="form-group">
                <input type="search" class="form-control" name="search" id="" placeholder="Search here..." value="{{request()->query('search')}}">
            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Booking List</h3>
        </div>
        <div class="card-body">
<div class="table-responsive">
        <table class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Detail</th>
                    <th>Group</th>
                    <th>Package</th>
                    <th>Type</th>
                    <th>Booked on</th>
                    <th>Message</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$booking->name}}
                            <br>
                       {{$booking->email}}
                       <br>
                        {{$booking->phone}}</td>
                        <td>{{'Group Size: '.$booking->group_size}}
                             <br>
                             {{'Date: '.$booking->departure_date}}
                        </td>

                        <td>{{$booking->destination?->name}}
                            <br>
                            {{$booking->package->name}}
                       </td>
                       <td>
                        @if ($booking->type==1)
                            <span class="badge bg-primary">Normal Booking</span>
                            @elseif($booking->type==2)
                            <span class="badge bg-primary">Payment</span>
                            <p>Amount: {{$booking->amount}}</p>

                              @elseif($booking->type==3)
                              <span class="badge bg-primary">Private Booking</span>
                        @endif
                       </td>

                       <td >
                        {{Carbon\Carbon::parse($booking->created_at)->format('d/m/Y')}}
                       </td>
                        <td >
                            {{$booking->message}}
                    </tr>
                @endforeach
            </tbody>
              </table>
            </div>
            {{$bookings->links()}}
    </div>
</div>
</div>



@endsection
