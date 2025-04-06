@extends('frontend.layout.master') 
@php
    define('PAGE','destination');
	$num=rand(1,7);
@endphp
@section('content')
<section class="pay">
	<div class="container">
		<div class="row my-5">
			<div class="text-center custom-text-primary">
				<h2 class="custom-fs-18"> Hi, {{ $request->name }}</h2>
			</div>
			<div class="col-12 col-md-6 offset-md-3">
				<div class="card card-pay-info">
					<div class="card-header">
						Confirm the following data
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
						      <tr>
						        <th>Product <i class="fa fa-caret-right"></i> </th>
						        <th>{{ $request->productName }}</th>
						      </tr>
						      <tr>
								@php
									$discount=number_format((float)($request->amount*4)/100,2)
								@endphp
						        <th>Amount <i class="fa fa-caret-right"></i> </th>
						        <th>{{$request->currency}} {{ $request->amount+$discount }} (including 4% service charge)</th>
						      </tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-4 offset-md-4 text-center">
				@php
                            $term=DB::table('cms')->where('id',38)->first();
					
				@endphp
				<form method="POST" action="https://www.pay.nepalvisiontreks.com/hbldemo2/">
					
					<input type="hidden" name="productName" value="{{ Str::limit($request->productName,30) }}" />
					<input type="hidden" name="currency" value="{{ $request->currency }}" />

					<input type="hidden" name="amount" value="{{ $request->amount+$discount }}" />
				<input type="checkbox" name="agree"  class="agree" checked="checked" value="I have agreed" required /> &nbsp; I have agreed <a href="{{ route('cms.page', ['page' => $term->url]) }}"  rel="noreferrer"  target="_blank">terms & condition </a>
					<div class="form-group text-center">
						<button type="submit"  class="btn btn-success d-block px-5 w-100 mt-3 btn-block">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection


