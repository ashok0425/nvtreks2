@extends('admin.layouts.app')
@section('content')
<section class="container">
  <div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div >
              <h3 class="-title">FAQ's Data</h3>
            </div>
    <div> <a class="btn btn-primary" href="{{ route('admin.faqs.create') }}"><i class="fa fa-plus"></i> Add FAQ</a></div>

          </div>
    </div>
      <div class="card-body">

            <div class="-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody class="sortable-posts">
                  @foreach($faqs as $faq)
                    <tr id="{{ $faq->id }}">
                        <td>
                            {{ $loop->iteration}}
                        </td>
                        <td>{{ $faq->question }}</td>
                        <td>{!! Str::limit(strip_tags($faq->answer), 150, '...') !!}</td>
                        <td>{!! $faq->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Deactive</span>' !!}</td>
                        <td>
                           <a href="{{ route('admin.faqs.edit',$faq->id) }}" class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                           </a>


                           <form action="{{route('admin.faqs.destroy',$faq)}}" method="POST">
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


