@if(user_akses2('config', Auth::user()->role_id)->update ?? 0 =='1')
@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Website Setting  </li>
                </ol>
            </div>
            <h4 class="page-title">Website Setting  </h4>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('config.update', $config->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Logo</label>
                                        <input type="file" data-plugins="dropify" data-max-file-size="2M" name="logo"
                                            class="form-control @error('logo') is-invalid @enderror" accept="image/*"
                                            data-default-file="{{ asset('upload/config/'. $config->logo) }}" />
                                        @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="icon" class="form-label">Icon</label>
                                        <input type="file" data-plugins="dropify" data-max-file-size="2M" name="icon"
                                            class="form-control @error('icon') is-invalid @enderror" accept="image/*"
                                            data-default-file="{{ asset('upload/config/'. $config->icon) }}" />
                                        @error('icon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description Website</label>
                                <textarea id="description" name="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    rows="5">{{ old('description',$config->description) }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="hero" class="form-label">Image Home</label>
                                        <input type="file" data-plugins="dropify" data-max-file-size="2M" name="hero"
                                            class="form-control @error('hero') is-invalid @enderror" accept="image/*"
                                            data-default-file="{{ asset('upload/config/'. $config->hero) }}" />
                                        @error('hero')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-lg-6 col-md-12">

                                    <h3>Basic Information</h3>
                                    <hr>

                                    <div class="mb-3">
                                        <label for="nameweb" class="form-label">Company Name</label>
                                        <input type="text" id="nameweb" name="nameweb"
                                            value="{{ old('nameweb', $config->nameweb) }}"
                                            class="form-control @error('nameweb') is-invalid @enderror"
                                            placeholder="Enter indonesia title">
                                        @error('nameweb')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email"
                                            value="{{ old('email', $config->email) }}"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Enter indonesia title">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="number" id="phone" name="phone"
                                            value="{{ old('phone', $config->phone) }}"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Enter indonesia title">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="whatsapp" class="form-label">Whatsapp</label>
                                        <br>
                                        <div class="badge bg-blue mb-2">
                                            <span>numbers starting with 628x</span>
                                        </div>
                                        <input type="number" id="whatsapp" name="whatsapp"
                                            value="{{ old('whatsapp', $config->whatsapp) }}"
                                            class="form-control @error('whatsapp') is-invalid @enderror"
                                            placeholder="Enter indonesia title">
                                        @error('whatsapp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea id="address" name="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            rows="4">{{ old('address',$config->address) }}</textarea>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <h3>Social Media</h3>
                                    <hr>

                                    <div class="mb-3">
                                        <label for="facebook" class="form-label">Facebook</label>
                                        <input type="url" id="facebook" name="facebook"
                                            value="{{ old('facebook', $config->facebook) }}"
                                            class="form-control @error('facebook') is-invalid @enderror"
                                            placeholder="Enter indonesia title">
                                        @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="instagram" class="form-label">Instagram</label>
                                        <input type="url" id="instagram" name="instagram"
                                            value="{{ old('instagram', $config->instagram) }}"
                                            class="form-control @error('instagram') is-invalid @enderror"
                                            placeholder="Enter indonesia title">
                                        @error('instagram')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="twitter" class="form-label">Twitter</label>
                                        <input type="url" id="twitter" name="twitter"
                                            value="{{ old('twitter', $config->twitter) }}"
                                            class="form-control @error('twitter') is-invalid @enderror"
                                            placeholder="Enter indonesia title">
                                        @error('twitter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="linkedin" class="form-label">Linkedin</label>
                                        <input type="url" id="linkedin" name="linkedin"
                                            value="{{ old('linkedin', $config->linkedin) }}"
                                            class="form-control @error('linkedin') is-invalid @enderror"
                                            placeholder="Enter indonesia title">
                                        @error('linkedin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <h3>Modul SEO (Search Engine Optimization)</h3>
                                    <hr>

                                    <div class="mb-3">
                                        <label for="keywords" class="form-label">Keywords (Keyword Search For Google, Bing, ETC)</label>
                                        <textarea id="keywords" name="keywords"
                                            class="form-control @error('keywords') is-invalid @enderror"
                                            rows="4">{{ old('keywords',$config->keywords) }}</textarea>
                                        @error('keywords')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <h3>Google Maps</h3>
                                    <hr>

                                    <div class="maps mb-2">
                                        <div class="map-responsive rounded">{!! $config->google_maps !!}</div>
                                    </div>
                                    <textarea name="google_maps" class="form-control @error('google_maps') is-invalid @enderror" rows="5">{{ $config->google_maps }}</textarea>
                                    @error('google_maps')
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

<style>
.map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}

.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}
</style>
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