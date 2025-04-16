@extends('admin.layouts.app')
@section('content')
@php
    define('PAGE','dashboard')
@endphp
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
        <div class="alert alert-success">Login Successful</div>

      <div class="row">
        <div class="col-md-4">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{App\Models\Package::count()}}</h3>

              <p>Total Package</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('admin.packages.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-md-4">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{App\Models\Package::where('status',1)->count()}}</h3>

                <p>Active Package</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.packages.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        <div class="col-md-4">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{App\Models\Booking::count()}}</h3>

                <p>Total Booking</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.bookings')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-md-4">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{App\Models\Team::count()}}</h3>

                <p>Total Team</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.teams.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-md-4">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{App\Models\Contact::count()}}</h3>

                <p>Total Contact</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.contacts.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
  </div>
  <!-- /.row -->





    </div><!-- /.container-fluid -->
  </section>



@endsection
