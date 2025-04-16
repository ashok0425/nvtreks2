@extends('admin.layouts.app')
@section('content')
<div class="card">
	<div class="card-header">
		<h2 class="card-title">Edit DEPARTURE's</h2>
	</div>
	<!-- Large modal -->

    <div class="clearfix"></div>
    <div class="card-body">
        <x-errormsg/>


        <form action="{{ route('admin.departures.update',$departure->id) }}" enctype="multipart/form-data" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
            <div class="form-group col-md-6">
                <label >Select Package</label>
                <select name="package_id" id=""  class="form-control">
                    <option value="">--Select Package--</option>
                    @foreach ($packages as $package)
                    <option value="{{ $package->id }}"
                        @if ($package->id==$departure->package_id)
                            selected
                        @endif>{{ $package->name }}</option>

                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label"> Status</label>
                <select name="status" id="" class="form-select form-control">
                    <option value="">--status--</option>
                    <option value="1" {{$departure->status?'selected':''}}>Active</option>
                    <option value="0" {{!$departure->status?'selected':''}}>InActive</option>

                </select>
            </div>



            <div class="form-group col-md-12">
                <label>Departures</label>
                <div class="dynamic_field">
                    {{-- Header Labels --}}
                    <div class="d-flex gap-2 mb-1 fw-bold">
                        <label class="w-100">Start Date</label>
                        <label class="w-100">End Date</label>
                        <label class="w-100">Total Seats</label>
                        <label class="w-100">Show on Homepage</label>
                        <label class="w-auto">&nbsp;</label>
                    </div>

                    {{-- First Input Row --}}
                    <div class="d-flex gap-2 mb-2">
                        <input type="date" class="form-control" name="start_date" required value="{{ $departure->start_date }}">
                        <input type="date" class="form-control" name="end_date" value="{{ Carbon\Carbon::parse($departure->end_date)->format('Y-m-d') }}">
                        <input type="number" class="form-control" name="total_seats"  placeholder="Total Seats" value="{{ $departure->total_seats }}">
                        <select name="show_on_home_page" class="form-control" {{$departure->show_on_home_page==1?'checked':''}}>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-12">
                <input type="submit" class="btn btn-info btn-block">
            </div>
        </div>

        </form>

    </div>
</div>
<!-- panel -->
@endsection



