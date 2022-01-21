@if(user_akses2('client', Auth::user()->role_id)->input ?? 0 =='1')

@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Client</a></li>
                    <li class="breadcrumb-item active">Create Client</li>
                </ol>
            </div>
            <h4 class="page-title">Create Client</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4>Form Client</h4>
                    </div>
                    <div class="col-auto">
                        <div class="text-lg-end my-1 my-lg-0">
                            <a href="{{ route('client.index') }}" class="btn btn-success"> <i class="fe-arrow-left"></i><span class="mx-1">Back</span></a>
                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Client Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter client name">
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
                                            src="https://image.flaticon.com/icons/png/512/2/2409.png"
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
                               <button type="submit" class="btn btn-primary waves-effect waves-light">Create</button>
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