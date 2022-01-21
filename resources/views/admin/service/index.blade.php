@if(user_akses2('service', Auth::user()->role_id)->view ?? 0 =='1')


@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Service</li>
                </ol>
            </div>
            <h4 class="page-title">Service</h4>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4>Table Service</h4>
                    </div>
                    <div class="col-auto">
                        <div class="text-lg-end my-1 my-lg-0">
                            @if(user_akses2('service', Auth::user()->role_id)->input ?? 0 =='1')
                            <a href="{{ route('service.create') }}" class="btn btn-primary"> <i class="fas fa-plus"></i><span class="mx-1">Create New Service</span></a>
                            @endif

                        </div>
                    </div><!-- end col-->
                </div> <!-- end row -->
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr style="background: #f3f7f9">
                                    <th>No.</th>
                                    <th>Indonesia Service Name</th>
                                    <th>English Service Name</th>
                                    <th class="text-center">Icon</th>

                                    @if(user_akses2('service', Auth::user()->role_id)->update ?? 0 =='1' OR user_akses2('service', Auth::user()->role_id)->delete ?? 0 =='1')
                                    <th class="text-center">Action</th>
                                    @endif

                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @php
                                $i=1
                                @endphp
                                @foreach ($service as $service)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $service->name_id }}</td>
                                    <td>{{ $service->name_en }}</td>
                                    <td class="text-center"><i class="{{ $service->icon }}"></i></td>

                                    @if(user_akses2('service', Auth::user()->role_id)->update ?? 0 =='1' OR user_akses2('service', Auth::user()->role_id)->delete ?? 0 =='1')
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Are you sure ?');"
                                        action="{{ route('service.destroy', $service) }}"
                                        method="POST">

                                        @if(user_akses2('service', Auth::user()->role_id)->update ?? 0 =='1')
                                        <a href="{{ route('service.edit', $service) }}" title="Edit" class="btn btn-info btn-sm">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        @endif

                                        @if(user_akses2('service', Auth::user()->role_id)->delete ?? 0 =='1')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i
                                                class="far fa-trash-alt"></i>
                                        </button>
                                        @endif

                                        @method('delete') 
                                        @csrf() 
                                        </form>
                                    </td>
                                    @endif

                                </tr>
                                @php
                                $i++
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div> 
@endsection

@push('css')
<link href="{{ asset('admin/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('js-external')
<script src="{{ asset('admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('admin/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/datatables.init.js') }}"></script>
@endpush

@endif