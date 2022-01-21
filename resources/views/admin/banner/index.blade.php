@if(user_akses2('banner', Auth::user()->role_id)->update ?? 0 =='1')
@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Banner</li>
                </ol>
            </div>
            <h4 class="page-title">Banner</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="title_id" class="form-label">Indonesia Title</label>
                                <input type="text" id="title_id" name="title_id" value="{{ old('title_id', $banner->title_id) }}"
                                class="form-control @error('title_id') is-invalid @enderror" placeholder="Enter indonesia title">
                                @error('title_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title_en" class="form-label">English Title</label>
                                <input type="text" id="title_en" name="title_en" value="{{ old('title_en', $banner->title_en) }}"
                                class="form-control @error('title_en') is-invalid @enderror" placeholder="Enter english title">
                                @error('title_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="description_id" class="form-label">Indonesia Description</label>
                                <textarea id="description_id" name="description_id" class="form-control @error('description_id') is-invalid @enderror"
                                rows="4">{{ old('description_id',$banner->description_id) }}</textarea>
                                @error('description_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description_en" class="form-label">English Description</label>
                                <textarea id="description_en" name="description_en" class="form-control @error('description_en') is-invalid @enderror"
                                rows="4">{{ old('description_en',$banner->description_en) }}</textarea>
                                @error('description_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                <input type="file" data-plugins="dropify" data-max-file-size="4M" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" data-default-file="{{ asset('upload/banner/'. $banner->image) }}" />
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                           </div>

                           <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                           </div>

                        </div>
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@endsection

@push('css')
<link href="{{ asset('admin/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/dropify/css/dropify-costum.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('js-external')
<script src="{{ asset('admin/libs/dropify/js/dropify.min.js') }}"></script>
@endpush


@push('js-internal')
<script>
    $(document).ready(function() {
        $('[data-plugins="dropify"]').length && $('[data-plugins="dropify"]').dropify({
            messages: {
                default: "Drag and drop a file here or click",
                replace: "Drag and drop or click to replace",
                remove: "Remove",
                error: "Ooops, something wrong appended."
            },
            error: {
                fileSize: "The file size is too big (2MB max)."
            }
        });
    });
    

</script>
@endpush
@endif