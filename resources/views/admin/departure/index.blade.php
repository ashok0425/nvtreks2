@extends('admin.layouts.app')
@section('content')
<section class="container">
    <div class="ml-auto" style="width: 230px;">
        <form action="" >
            <div class="form-group">
                <input type="search" class="form-control" name="search" id="" placeholder="Search here..." value="{{request()->query('search')}}">
            </div>
        </form>
    </div>
  <div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div >
              <h3 class="-title">DEPARTURE'S Data</h3>
            </div>
    <div> <a class="btn btn-primary" href="{{ route('admin.departures.create') }}"><i class="fa fa-plus"></i> Add departure</a></div>

          </div>
    </div>
      <div class="card-body">

          <!-- /. -->


            <!-- /.-header -->
            <div class="-body">
              <table  class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Package</th>
                        <th>Date</th>
                        <th>Show Home Page</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody class="sortable-posts">
                  @foreach($departures as $departure)
                    <tr id="{{ $departure->id }}">
                        <td>
                            {{ $loop->iteration}}
                        </td>
                        <td>@if(isset($departure->package)){{ $departure->package->name }}@else NA @endif</td>

                        <td>{{ carbon\carbon::parse($departure->start_date)->format('d M Y') }}</td>
                        <td>{{ $departure->show_on_home_page?'✅':''}}</td>

                        <td>{!! $departure->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                        <td>
                           <a href="{{ route('admin.departures.edit',$departure) }}" class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                           </a>
                           <form action="{{route('admin.departures.destroy',$departure)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm delete_row"><i class="fas fa-trash"></i></button>
                        </form>

                        </td>
                    </tr>
                    @endforeach


                </tbody>
                <tr>
                  <td colspan="5">{{ $departures->withQueryString()->links() }}</td>
                </tr>
              </table>
            </div>
            <!-- /.-body -->
          </div>
          <!-- /. -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>




@endsection


