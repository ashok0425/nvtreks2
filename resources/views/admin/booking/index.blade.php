@extends('admin.layouts.app')
@section('content')

<div class="container">
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

                        <td>{{$booking->destination->name}}
                            <br>
                            {{$booking->package->name}}
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
