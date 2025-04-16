@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Contact ist</h3>
        </div>
        <div class="card-body">
<div class="table-responsive">
        <table class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Created On</th>
                    <th>Message</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$contact->name}}</td>

                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone}}</td>
                        <td >
                            {{Carbon\Carbon::parse($contact->created_at)->format('d/m/Y')}}
                           </td>
                        <td >
                            {{$contact->comment}}
                       </td>

                    </tr>
                @endforeach
            </tbody>
              </table>
            </div>
            {{$contacts->links()}}
    </div>
</div>
</div>



@endsection
