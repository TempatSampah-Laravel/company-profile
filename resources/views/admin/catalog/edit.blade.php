@if(user_akses2('catalog', Auth::user()->role_id)->input ?? 0 =='1')

@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('catalog.index') }}">Catalog</a></li>
                    <li class="breadcrumb-item active">Edit Catalog</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Catalog</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4>Form Catalog</h4>
                    </div>
                    <div class="col-auto">
                        <div class="text-lg-end my-1 my-lg-0">
                            <a href="{{ route('catalog.index') }}" class="btn btn-success"> <i
                                    class="fe-arrow-left"></i><span class="mx-1">Back</span></a>
                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('catalog.update', $catalog) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="mb-3">
                                <label for="name_id" class="form-label">Indonesia Catalog Name</label>
                                <input type="text" id="name_id" name="name_id"
                                    value="{{ old('name_id', $catalog->name_id) }}"
                                    class="form-control @error('name_id') is-invalid @enderror"
                                    placeholder="Enter indonesia catalog name">
                                @error('name_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name_en" class="form-label">English Catalog Name</label>
                                <input type="text" id="name_en" name="name_en"
                                    value="{{ old('name_en', $catalog->name_en) }}"
                                    class="form-control @error('name_en') is-invalid @enderror"
                                    placeholder="Enter english catalog name">
                                @error('name_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description_id" class="form-label">Indonesia Catalog Description</label>
                                <textarea id="description_id" name="description_id"
                                    class="form-control @error('description_id') is-invalid @enderror" rows="5"
                                    placeholder="Enter indonesia catalog description">{{ old('description_id',$catalog->description_id) }}</textarea>
                                @error('description_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description_en" class="form-label">English Catalog Description</label>
                                <textarea id="description_en" name="description_en"
                                    class="form-control @error('description_en') is-invalid @enderror" rows="5"
                                    placeholder="Enter english catalog description">{{ old('description_en',$catalog->description_en) }}</textarea>
                                @error('description_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Cover Catalog</label>
                                    <div>
                                        <img id="imageView" src="{{ asset('upload/catalog/'.$catalog->image) }}"
                                            alt="your image" width="100px" class="rounded">
                                    </div>
                                    <input type="file" id="imgInp" name="image"
                                        class="form-control mt-2 @error('image') is-invalid @enderror" accept="image/*"
                                        data-default-file="" />
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="pdf" class="form-label">File PDF</label>
                                    <div class="pdf">
                                        <embed src="{{ asset('upload/catalog/'.$catalog->pdf) }}" frameborder="0">
                                    </div>
                                    <input type="file" id="imgInp" name="pdf"
                                        class="form-control mt-2 @error('pdf') is-invalid @enderror"
                                        accept="application/pdf" data-default-file="" />
                                    @error('pdf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<style>
    .pdf embed{
        width: 1000px;
        height: 600px;
    }
</style>

@endsection

@push('js-internal')
<script>
    $(document).ready(function () {

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imageView').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    });
</script>
@endpush

@endif