@if(user_akses2('about', Auth::user()->role_id)->update ?? 0 =='1')
@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </div>
            <h4 class="page-title">About</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="title_id" class="form-label">Indonesia Title</label>
                                <input type="text" id="title_id" name="title_id" value="{{ old('title_id', $about->title_id) }}"
                                class="form-control @error('title_id') is-invalid @enderror" placeholder="Enter indonesia title">
                                @error('title_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="title_en" class="form-label">English Title</label>
                                <input type="text" id="title_en" name="title_en" value="{{ old('title_en', $about->title_en) }}"
                                class="form-control @error('title_en') is-invalid @enderror" placeholder="Enter english title">
                                @error('title_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="content_id" class="form-label">Indonesia Content</label>
                                <textarea id="kontenku" name="content_id" class="form-control @error('content_id') is-invalid @enderror"
                                rows="4">{{ old('content_id',$about->content_id) }}</textarea>
                                @error('content_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="content_en" class="form-label">English Content</label>
                                <textarea id="kontenku2" name="content_en" class="form-control @error('content_en') is-invalid @enderror"
                                rows="4">{{ old('content_en',$about->content_en) }}</textarea>
                                @error('content_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vision_id" class="form-label">Indonesia Vision</label>
                                <textarea id="vision_id" name="vision_id" class="form-control @error('vision_id') is-invalid @enderror"
                                rows="4">{{ old('vision_id', $about->vision_id) }}</textarea>
                                @error('vision_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="vision_en" class="form-label">English Vision</label>
                                <textarea id="vision_en" name="vision_en" class="form-control @error('vision_en') is-invalid @enderror"
                                rows="4">{{ old('vision_en', $about->vision_en) }}</textarea>
                                @error('vision_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="mission_id" class="form-label">Indonesia Mission</label>
                                <textarea id="mission_id" name="mission_id" class="form-control @error('mission_id') is-invalid @enderror"
                                rows="4">{{ old('mission_id', $about->mission_id) }}</textarea>
                                @error('mission_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="mission_en" class="form-label">English Mission</label>
                                <textarea id="mission_en" name="mission_en" class="form-control @error('mission_en') is-invalid @enderror"
                                rows="4">{{ old('mission_en', $about->mission_en) }}</textarea>
                                @error('mission_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                <input type="file" data-plugins="dropify" data-max-file-size="2M" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" data-default-file="{{ asset('upload/about/'. $about->image) }}" />
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/libs/dropify/js/dropify.min.js') }}"></script>
@endpush


@push('js-internal')
<script>
    $(function () {
        $("#kontenku").each(function() {
            $(this).removeAttr("id");
            $(this).attr("id", "kontenku");
            CKEDITOR.replace('kontenku', {
                'extraPlugins': 'imgbrowse', 
                'filebrowserImageBrowseUrl': '{{ asset('ckeditor/plugins/imgbrowse/imgbrowse.html') }}',
                'filebrowserImageUploadUrl': '{{ route('upload', ['_token' => csrf_token() ])}}',
            });

        });

        $("#kontenku2").each(function() {
            $(this).removeAttr("id");
            $(this).attr("id", "kontenku2");
            CKEDITOR.replace('kontenku2', {
                'extraPlugins': 'imgbrowse', 
                'filebrowserImageBrowseUrl': '{{ asset('ckeditor/plugins/imgbrowse/imgbrowse.html') }}',
                'filebrowserImageUploadUrl': '{{ route('upload', ['_token' => csrf_token() ])}}',
            });

        });
		
		

    });

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