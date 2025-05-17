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
            <h3>Subscriber ist</h3>
        </div>
        <div class="card-body">
<div class="table-responsive">
        <table class="table table-responsive-sm" >
            <thead>
                <tr>
                    <th>#</th>

                    <th>Email</th>
                    <th>Created On</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($subscribers as $subscriber)
                    <tr>
                        <td>{{$loop->iteration}}</td>

                        <td>{{$subscriber->email}}</td>
                        <td >
                            {{Carbon\Carbon::parse($subscriber->created_at)->format('d/m/Y')}}
                           </td>
                    </tr>
                @endforeach
            </tbody>
              </table>
            </div>
            {{$subscribers->links()}}
    </div>
</div>
</div>



@endsection
