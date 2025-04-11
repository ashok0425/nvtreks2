@extends('admin.layouts.app')
@section('content')
<section class="container">
  <div class="card">

      <div class="card-body">
            <!-- /.-header -->
            <div class="d-flex justify-content-between">
                <div>
                    <h3 >Team List</h3>
                </div>
                <div> <a class="btn btn-info" href="{{ route('admin.teams.create') }}"><i class="fa fa-plus"></i> Add Team</a></div>
        </div>
            <div class="table-responsive">
              <table  class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Thumbnail</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                    <tr>
                        <td>{{$team->name}}</td>
                        <td><img src="{{getImageUrl($team->thumbnail)}}" alt="" width="50"></td>
                        <td>{{$team->position}}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.teams.edit', $team) }}" class="btn-sm btn btn-primary"><i class="fas fa-edit"></i>
                            </a>

                            <form action="{{route('admin.teams.destroy',$team)}}" method="POST">
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
      </div>
      <!-- /.row -->
    </section>




@endsection


@push('scripts')

@endpush
