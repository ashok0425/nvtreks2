@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title"> Edit Banner</h3>
    </div>

    <div class="card-body">
        <x-errormsg/>
        <form action="{{ route('admin.banners.update',$banner) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Type</label>
                    <select name="type" id="bannerType" class="form-control">
                        <option value="1" {{ old('type',$banner->type) == 1 ? 'selected' : '' }}>Banner</option>
                        <option value="3" {{ old('type',$banner->type) == 3 ? 'selected' : '' }}>Instagram Link</option>

                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" id="" class="form-select form-control">
                        <option value="">--status--</option>
                        <option value="1" {{old('status',$banner->status)?'selected':''}}>Active</option>
                        <option value="0" {{!old('status',$banner->status)?'selected':''}}>InActive</option>

                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Page</label>
                    <input type="text" name="page" value="{{old('page',$banner->link)}}" class="form-control">
                </div>

                {{-- Banner Fields --}}
                <div id="bannerFields" class="w-100 row">
                    <div class="col-md-6">
                        <label class="form-label">Banner Title</label>
                        <input name="title" class='form-control' value="{{ old('title',$banner->title) }}" type='text' placeholder="Enter Banner Title">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Banner Image (900 x 200)</label>
                        <div class="image-input">
                            <input type="file" id="imageInput1" name="image">
                            <label for="imageInput1" class="image-button"><i class="far fa-image"></i> Choose image</label>
                            <img src="" class="image-preview1">
                        </div>
                        <img src="{{getImageUrl($banner->image)}}" alt="" width="100">
                    </div>
                </div>

                {{-- Link Field --}}
                <div id="linkField"  class="col-md-12 mt-3">
                    <label class="form-label">External Link</label>
                    <textarea name="details" id="embedBody" class="form-control" rows="3" placeholder="Paste your link here">{!! old('details',$banner->details) !!}</textarea>
                </div>
                <div id="embedPreview"></div>

                <div class="col-md-12 mt-4">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('style')
<style>
.image-input {
    text-align: center;
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

.image-preview1 {
    max-height: 100px;
}

@keyframes shake {
    0% { transform: rotate(0deg); }
    25% { transform: rotate(10deg); }
    50% { transform: rotate(0deg); }
    75% { transform: rotate(-10deg); }
    100% { transform: rotate(0deg); }
}
</style>
@endpush

@push('scripts')
<script>


$(document).ready(function () {
    // Image preview
    $('#imageInput1').on('change', function () {
        const $input = $(this);
        if ($input.val().length > 0) {
            const fileReader = new FileReader();
            fileReader.onload = function (data) {
                $('.image-preview1').attr('src', data.target.result);
                $('.image-preview1').css('display', 'block');
            }
            fileReader.readAsDataURL($input.prop('files')[0]);
        }
    });
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const embedBodyTextarea = document.getElementById('embedBody');
        const embedPreview = document.getElementById('embedPreview');

        // Initial preview
        updatePreview();

        // Add event listener for real-time preview
        embedBodyTextarea.addEventListener('input', updatePreview);
        embedBodyTextarea.addEventListener('change', updatePreview);
        embedBodyTextarea.addEventListener('keyup', updatePreview);
        embedBodyTextarea.addEventListener('paste', updatePreview);

        function updatePreview() {
            const embedCode = embedBodyTextarea.value.trim();

            if (embedCode) {
                // Render the embed code directly
                embedPreview.innerHTML = embedCode;

                // Reload Instagram embed script to render the embed
                if (window.instgrm) {
                    window.instgrm.Embeds.process();
                } else {
                    // If script is not loaded, dynamically load it
                    const script = document.createElement('script');
                    script.src = '//www.instagram.com/embed.js';
                    script.async = true;
                    script.onload = function() {
                        if (window.instgrm) {
                            window.instgrm.Embeds.process();
                        }
                    };
                    document.body.appendChild(script);
                }
            } else {
                embedPreview.innerHTML = 'No preview available';
            }
        }
    });
</script>
@endpush
