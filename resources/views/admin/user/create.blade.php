@if(user_akses2('user', Auth::user()->role_id)->input ?? 0 =='1')

@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Manage User</a></li>
                    <li class="breadcrumb-item active">Create User</li>
                </ol>
            </div>
            <h4 class="page-title">Create User</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4>Form User</h4>
                    </div>
                    <div class="col-auto">
                        <div class="text-lg-end my-1 my-lg-0">
                            <a href="{{ route('user.index') }}" class="btn btn-success"> <i class="fe-arrow-left"></i><span class="mx-1">Back</span></a>
                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" id="email" name="email"value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" id="username" name="username"value="{{ old('username') }}"
                                class="form-control @error('username') is-invalid @enderror" placeholder="Enter username">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-6">

                            <div class="mb-3">
                                <label for="Roles" class="form-label">Role</label>
                                
                                <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" id="role_id" data-toggle="select2" data-width="100%">
                                    <option value="" selected>Choose role access..</option>
                                    @foreach ($roles as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name_role }} </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                           <div class="col-5">
                                <div class="mb-3">
                                    <label for="Roles" class="form-label">Avatar</label>
                                <input type="file" data-plugins="dropify" data-max-file-size="2M" name="avatar" class="form-control @error('avatar') is-invalid @enderror" accept="image/*" />
                                @error('avatar')
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

    $('[data-plugins="dropify"]').length && $('[data-plugins="dropify"]').dropify({
        messages: {
            default: "Drag and drop a file here or click",
            replace: "Drag and drop or click to replace",
            remove: "Remove",
            error: "Ooops, something wrong appended."
        },
        error: {
            fileSize: "The file size is too big (1M max)."
        }
    });
});
</script>
@endpush

@endif