@if(user_akses2('certificate', Auth::user()->role_id)->update ?? 0 =='1')

@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('certificate.index') }}">Certificate</a></li>
                    <li class="breadcrumb-item active">Edit Certificate</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Certificate</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4>Form Certificate</h4>
                    </div>
                    <div class="col-auto">
                        <div class="text-lg-end my-1 my-lg-0">
                            <a href="{{ route('certificate.index') }}" class="btn btn-success"> <i class="fe-arrow-left"></i><span class="mx-1">Back</span></a>
                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('certificate.update', $certificate) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Certificate Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $certificate->name) }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter certificate name">
                                @error('name')
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
                                            src="{{ asset('upload/certificate/'. $certificate->image) }}"
                                            alt="your image" width="100px" class="rounded">
                                    </div>
                                    <input type="file" id="imgInp" name="image" class="form-control mt-2 @error('image') is-invalid @enderror" accept="image/*" data-default-file="" />
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

@push('js-internal')
<script>
$(document).ready(function() {

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