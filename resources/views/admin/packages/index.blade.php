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

                <!-- /. -->

                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="-title">Packages</h3>
                    </div>
                    <div> <a class="btn btn-primary" href="{{ route('admin.packages.create') }}"><i
                                class="fa fa-plus"></i> Add Packages</a></div>

                </div>
                <!-- /.-header -->
                <div class="-body">
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $package)
                            <tr>
                                <td><img src="{{ getImageUrl($package->thumbnail) }}" alt="" width="50">
                                    </td>
                                    <td>{{ $package->name }}</td>
                                    <td>{!! $package->status == 1
                                        ? '<span class="badge bg-success">Active</span>'
                                        : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                                    <td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.packages.edit', $package) }}" class="btn-sm btn btn-primary"><i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{route('admin.packages.destroy',$package)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm delete_row"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>

                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.-body -->
            </div>
            <!-- /. -->
        </div>
        <!-- /.col -->
        {{$packages->withQueryString()->links()}}
        </div>
        <!-- /.row -->
    </section>
@endsection



@push('scripts')

@endpush
