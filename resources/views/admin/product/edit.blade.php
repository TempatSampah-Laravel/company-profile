@if(user_akses2('product', Auth::user()->role_id)->update ?? 0 =='1')

@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                    <li class="breadcrumb-item active">Create Product</li>
                </ol>
            </div>
            <h4 class="page-title">Create Product</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4>Form Product</h4>
                    </div>
                    <div class="col-auto">
                        <div class="text-lg-end my-1 my-lg-0">
                            <a href="{{ route('product.index') }}" class="btn btn-success"> <i class="fe-arrow-left"></i><span class="mx-1">Back</span></a>
                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="mb-3">
                                <label for="name_id" class="form-label">Indonesia Product Name</label>
                                <input type="text" id="name_id" name="name_id" value="{{ old('name_id', $product->name_id) }}"
                                class="form-control @error('name_id') is-invalid @enderror" placeholder="Enter indonesia product name">
                                @error('name_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name_en" class="form-label">English Product Name</label>
                                <input type="text" id="name_en" name="name_en" value="{{ old('name_en', $product->name_en) }}"
                                class="form-control @error('name_en') is-invalid @enderror" placeholder="Enter english product name">
                                @error('name_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category Product</label>
                                
                                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id" data-toggle="select2" data-width="100%">
                                    <option value="" selected disabled>Choose category product..</option>
                                    {{-- @foreach ($category as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected="true"' : ''  }}> {{ $category->name_en }} </option>
                                    @endforeach --}}
                                    @foreach ($category as $category)
                                    @if ($category->id == $product->category_id)
                                    <option value={{ $category->id }} selected='selected'> {{ $category->name_en }} </option>
                                    @else
                                    <option value=" {{ $category->id }} " {{ old('category_id') == $category->id ? 'selected="true"' : ''  }}> {{ $category->name_en }} </option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description_id" class="form-label">Indonesia Product Description</label>
                                <textarea name="description_id" id="description_id" class="form-control @error('description_id') is-invalid @enderror" rows="5" placeholder="Enter indonesia product description">{{ old('description_id', $product->description_id) }}</textarea>
                                @error('description_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description_en" class="form-label">English Product Description</label>
                                <textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" rows="5" placeholder="Enter english product description">{{ old('description_en', $product->description_en) }}</textarea>
                                @error('description_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <div>
                                        <img id="imageView"
                                            src="{{ asset('upload/product/'. $product->image) }}"
                                            alt="your image" width="100px" class="rounded">
                                    </div>
                                    <input type="file" id="imgInp" name="image" class="form-control mt-2 @error('image') is-invalid @enderror" accept="image/*" />
                                    @error('image')
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
@endsection

@push('css')
<link href="{{ asset('admin/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/select2/css/select2-costum.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/dropify/css/dropify-costum.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('js-external')
<script src="{{ asset('admin/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/libs/dropify/js/dropify.min.js') }}"></script>
@endpush

@push('js-internal')
<script>
$(document).ready(function() {
    $('[data-toggle="select2"]').select2()

    // $('[data-plugins="dropify"]').length && $('[data-plugins="dropify"]').dropify({
    //     messages: {
    //         default: "Drag and drop a file here or click",
    //         replace: "Drag and drop or click to replace",
    //         remove: "Remove",
    //         error: "Ooops, something wrong appended."
    //     },
    //     error: {
    //         fileSize: "The file size is too big (1M max)."
    //     }
    // });

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