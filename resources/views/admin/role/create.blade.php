@if(user_akses2('role', Auth::user()->role_id)->input ?? 0 =='1')

@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Role Access</a></li>
                    <li class="breadcrumb-item active">Create Role Acccess</li>
                </ol>
            </div>
            <h4 class="page-title">Create Role Access</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4>Form Role Access</h4>
                    </div>
                    <div class="col-auto">
                        <div class="text-lg-end my-1 my-lg-0">
                            <a href="{{ route('role.index') }}" class="btn btn-success"> <i class="fe-arrow-left"></i><span class="mx-1">Back</span></a>
                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name_role" class="form-label">Name Role</label>
                        <input type="text" id="name_role" name="name_role" value="{{ old('name_role') }}"
                        class="form-control @error('name_role') is-invalid @enderror" placeholder="Enter name role">
                        @error('name_role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="text-lg-end my-1 my-lg-0">
                        <button type="submit" class="btn btn-primary px-4">Create</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@endif