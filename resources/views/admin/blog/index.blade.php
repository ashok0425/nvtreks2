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
      <div class="card-body">

            <!-- /.-header -->
            <div class="d-flex justify-content-between">
                <div>
                    <h3 >Blog List</h3>
                </div>
                <div> <a class="btn btn-info" href="{{ route('admin.blogs.create') }}"><i class="fa fa-plus"></i> Add blog</a></div>
        </div>
            <div class="table-responsive">
              <table  class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                    <tr>
                        <td>{{$blog->title}}</td>
                        <td><img src="{{getImageUrl($blog->thumbnail)}}" alt="" width="50"></td>
                        <td>{{$blog->status?'Active':'Inactive'}}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn-sm btn btn-primary"><i class="fas fa-edit"></i>
                            </a>

                            <form action="{{route('admin.blogs.destroy',$blog)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm delete_row"><i class="fas fa-trash"></i></button>
                            </form>
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
      {{$blogs->withQueryString()->links()}}

      </div>
      <!-- /.row -->
    </section>




@endsection


@push('scripts')

@endpush
