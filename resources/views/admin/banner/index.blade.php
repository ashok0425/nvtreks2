@extends('admin.layouts.app')
@section('content')
    <section class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="-title">Banner's List</h3>
                    </div>
                    <div> <a class="btn btn-primary" href="{{ route('admin.banners.create') }}"><i class="fa fa-plus"></i> Add
                            Banner</a></div>
                </div>
            </div>
            <div class="card-body">
                <div class="-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Page</th>
                                <th>Links</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="sortable-posts">
                            @foreach ($banners as $banner)
                                <tr id="{{ $banner->id }}">
                                    <td>
                                        <img src="{{ getImageurl($banner->image) }}" width="80">
                                    </td>
                                    <td>{{ $banner->title }}</td>
                                    <td>{{ $banner->link }}</td>
                                    <td>{!! Str::limit(strip_tags($banner->details), 50, '...') !!}</td>
                                    <td>
                                        @if ($banner->type==1)
                                            Banner
                                        @endif
                                        @if ($banner->type==2)
                                        Youtube
                                    @endif
                                    @if ($banner->type==3)
                                    Instagram
                                @endif
                                   </td>


                                    <td>{!! $banner->status
                                        ? '<span class="badge bg-success">Active</span>'
                                        : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                                    <td>
                                        <a href="{{ route('admin.banners.edit', $banner->id) }}"
                                            class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                                        </a>

                                        <form action="{{route('admin.banners.destroy',$banner)}}" method="POST">
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
