@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">ADD DEPARTURE</h2>
    </div>

    <div class="clearfix"></div>
    <div class="card-body">
        <x-errormsg/>

        <form action="{{ route('admin.departures.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                    <label>Select Package</label>
                    <select name="package_id" class="form-control" required>
                        <option value="">--Select Package--</option>
                        @foreach ($packages as $package)
                        <option value="{{ $package->id }}">{{ $package->name }}</option>
                        @endforeach
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
                            <input type="date" class="form-control" name="start_date[]" required>
                            <input type="date" class="form-control" name="end_date[]" >
                            <input type="number" class="form-control" name="total_seats[]"  placeholder="Total Seats">
                            <select name="show_on_home_page[]" class="form-control" >
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                            <button type="button" class="btn btn-success add_new_field"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-info btn-block" value="Submit">
                </div>

            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function(){
    $(document).on('click', '.add_new_field', function() {
        let html = `
        <div class="d-flex gap-2 mb-2">
            <input type="date" class="form-control" name="start_date[]" required>
            <input type="date" class="form-control" name="end_date[]" required>
            <input type="number" class="form-control" name="total_seats[]" required placeholder="Total Seats">
            <select name="show_on_home_page[]" class="form-control" required>
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            <button type="button" class="btn btn-danger remove_new_field"><i class="fas fa-trash"></i></button>
        </div>`;
        $('.dynamic_field').append(html);
    });

    $(document).on('click', '.remove_new_field', function(){
        $(this).closest('.d-flex').remove();
    });
});
</script>
@endpush
