@push('style')
<style>

    .image-input {
	text-aling: center;
}

.image-input input {
	display: none;
}

.image-input label {
	display: block;
	color: #FFF;
	background: #000;
	padding: .3rem .6rem;
	font-size: 115%;
	cursor: pointer;
}

.image-input label i {
	font-size: 125%;
	margin-right: .3rem;
}

.image-input label:hover i {
	animation: shake .35s;
}

.image-input img {
	max-width: 175px;
	display: none;
}

.image-input span {
	display: none;
	text-align: center;
	cursor: pointer;
}
.image-preview1,.image-preview2,.image-preview3,.image-preview4,.image-preview5{
    max-height: 100px;
}
@keyframes shake {
	0% {
		transform: rotate(0deg);
	}

	25% {
		transform: rotate(10deg);
	}

	50% {
		transform: rotate(0deg);
	}

	75% {
		transform: rotate(-10deg);
	}

	100% {
		transform: rotate(0deg);
	}
}
    #thumbAppendAlt input ,#thumbAppendAlt1 input,#thumbAppendAlt2 input{
        width: 100px;
        margin: 10px 17px;
    }
    .nav-tabs{

    }
    </style>
@endpush
@extends('admin.layouts.app')
@section('content')

<div class="card">
        <div class="card-header">
            <h3 class="card-title"> Edit Team</h3>
        </div>

    <div class="card-body">
<x-errormsg/>
        <form action="{{route('admin.teams.update',$team)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
            <div class=" col-md-6">
                <label class="form-label"> Name</label>
             <input name="name" class='form-control' value=' {{ old('name',$team->name) }}' type='text' placeholder="Enter  Name">
            </div>

            <div class=" col-md-6">
                <label class="form-label"> Position</label>
             <input name="position"   class='form-control' value=' {{ old('position',$team->position) }}' type='text' placeholder="Enter  position">
            </div>
            <div class=" col-md-6 my-2">
                <label class="form-label">Content</label>
             <input name="content" class="form-control"   value="{{ old('content',$team->content) }}">
            </div>
            <div class=" col-md-6">
                <label class="form-label">Thumbnail </label>
                    <div class="image-input">
                        <input type="file" accept="image/*" id="imageInput1" name="thumbnail" value="{{ old('image') }}">
                        <label for="imageInput1" class="image-button"><i class="far fa-image"></i> Choose image</label>
                        <img src="" class="image-preview1">
                  </div>
                  <img src="{{getImageUrl($team->thumbnail)}}" alt="" width="100">
            </div>


            <button type="submit" class="btn btn-primary btn-block mt-2">Save</button>
        </div>
        </form>
    </div>
</div>
@endsection


@push('scripts')

{{-- custom input fielsd file  --}}
	  <script>
	// Add the following code if you want the name of the file appear on select
		$('#imageInput1').on('change', function() {
$input = $(this);

if($input.val().length > 0) {
  fileReader = new FileReader();
  fileReader.onload = function (data) {
  $('.image-preview1').attr('src', data.target.result);
  }
  fileReader.readAsDataURL($input.prop('files')[0]);
//   $('.image-button').css('display', 'none');
  $('.image-preview1').css('display', 'block');
  $('.change-image').css('display', 'block');
}
});


$('#imageInput2').on('change', function() {
$input = $(this);

if($input.val().length > 0) {
  fileReader = new FileReader();
  fileReader.onload = function (data) {
  $('.image-preview2').attr('src', data.target.result);
  }
  fileReader.readAsDataURL($input.prop('files')[0]);
//   $('.image-button').css('display', 'none');
  $('.image-preview2').css('display', 'block');
  $('.change-image').css('display', 'block');
}
});


	  </script>
	  @endpush
