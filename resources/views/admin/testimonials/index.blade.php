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
                    <div>
                        <h3 class="card-title">Testimonials Data</h3>
                    </div>
                    <div> <a class="btn btn-primary" href="{{ route('admin.testimonials.create') }}"><i class="fa fa-plus"></i>
                            Add Testimonial</a></div>

                </div>
            </div>
            <div class="card-body">
                <!-- /.-header -->
                <div class="-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="sortable-posts">
                            @foreach ($testimonials as $testimonial)
                                <tr id="{{ $testimonial->id }}">
                                    <td>
                                        <img src="{{ getImageurl($testimonial->image) }}" width="80">
                                    </td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{!! Str::limit(strip_tags($testimonial->content), 50, '...') !!}</td>
                                    <td>{!! $testimonial->status
                                        ? '<span class="badge bg-success">Active</span>'
                                        : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                                    <td>
                                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                            class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.testimonials.destroy',$testimonial)}}" method="POST">
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
            {{$testimonials->withQueryString()->links()}}
            <!-- /. -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
