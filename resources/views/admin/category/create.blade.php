@if(user_akses2('user', Auth::user()->role_id)->input ?? 0 =='1')

@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('category-product.index') }}">Category Product</a></li>
                    <li class="breadcrumb-item active">Create Category Product</li>
                </ol>
            </div>
            <h4 class="page-title">Create Category Product</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4>Form Category Product</h4>
                    </div>
                    <div class="col-auto">
                        <div class="text-lg-end my-1 my-lg-0">
                            <a href="{{ route('category-product.index') }}" class="btn btn-success"> <i class="fe-arrow-left"></i><span class="mx-1">Back</span></a>
                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('category-product.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="mb-3">
                                <label for="name_id" class="form-label">Indonesia Category Name</label>
                                <input type="text" id="name_id" name="name_id" value="{{ old('name_id') }}"
                                class="form-control @error('name_id') is-invalid @enderror" placeholder="Enter indonesia category name">
                                @error('name_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name_en" class="form-label">English Category Name</label>
                                <input type="text" id="name_en" name="name_en" value="{{ old('name_en') }}"
                                class="form-control @error('name_en') is-invalid @enderror" placeholder="Enter english category name">
                                @error('name_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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

@endif