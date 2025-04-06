@extends('admin.layouts.app') 
@section('content')
<section class="container">
  <div class="card">
      <div class="card-body">
          
          <!-- /. -->

          <div class="d-flex justify-content-between align-items-center">
            <div >
              <h3 class="-title">COuntry Data</h3>
            </div>
    <div> <a class="btn btn-primary" href="{{ route('admin.country.create') }}"><i class="fa fa-plus"></i> Add Country</a></div>

          </div>
            <!-- /.-header -->
            <div class="-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Country</th>
                      
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody class="sortable-posts">
                  @foreach($countries as $country)
                    <tr id="{{ $country->id }}">
                        <td>
                            {{ $loop->iteration}}
                        </td>
                        <td>{{ $country->name }}</td>
                        
                        <td>
                           <a href="{{ route('admin.country.edit',$country->id) }}" class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                           </a>

                           {{-- <a href="{{ route('admin.country.delete',$country->id ) }}" class="btn btn-danger btn-sm delete_row" id="delete_row" ><i class="fa fa-trash"></i>
                           </a> --}}
                          
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              
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


