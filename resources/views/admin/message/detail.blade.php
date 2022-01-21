@if(user_akses2('message', Auth::user()->role_id)->view ?? 0 =='1')


@extends('admin.layout.base')

@section('content')
<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('message.index') }}">Message</a></li>
                        <li class="breadcrumb-item active">Message Detail</li>
                    </ol>
                </div>
                <h4 class="page-title">Message Detail</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <!-- Right Sidebar -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="mt-4">
                        <h5 class="font-18">{{ $message->subject }}</h5>

                        <hr/>

                        <div class="d-flex align-items-start mb-3 mt-1">
                            <div class="w-100">
                                <small class="float-end">{{ date('d F Y',strtotime($message->created_at)) }}</small>
                                <h6 class="m-0 font-14">{{ $message->name }}</h6>
                                <small class="text-muted">From: {{ $message->email }}</small>
                            </div>
                        </div>

                        <p>{{ $message->message }}</p>
                        <!-- end row-->
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div> <!-- end Col -->

    </div><!-- End row -->

    
</div> <!-- container -->

@endsection

@endif