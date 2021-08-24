@extends('layouts.jsk')

@section('title')
    All Notifications | UKM-crms
@endsection

@section('content')
@include('inc.message')
{{-- <div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1 pb-2">Manage Jobs</h4> --}}
            {{-- <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </div> --}}
        {{-- </div>
    </div>
</div> --}}
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->

<div class="container-fluid">
    <!-- *************************************************************** -->
    <!-- Start First Cards -->
    <!-- *************************************************************** -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="page-title text-truncate text-white font-weight-medium mb-0">All Notifications</h4>
                </div>
                <div class="card-body">
                     @if(count($notifications) > 0)
                    <ul class="list-unstyled">
                        @foreach ($notifications as $notification)
                        @if($notification->data['jobapp']['status'] == 'Shortlisted')
                        <li class="media mb-2">
                            <div class="btn btn-success rounded-circle btn-circle mr-3"><i
                                data-feather="check-circle" class="text-white"></i></div>
                            <div class="media-body">
                                <a href="/my-applications/{{$notification->data['jobapp']['user_id']}}">
                                <h5 class="message-title mb-0 mt-1">Shortlisted for Interview</h5></a>
                                <span class="font-12 text-nowrap d-block text-dark">{{$notification->data['replyby']['company_name']}} has responded to your application for the position of {{$notification->data['post']['title']}} and shall contact you shortly</span>
                                <span class="font-12 text-nowrap d-block text-muted">{{date('d-m-Y, H:i', strtotime($notification->data['jobapp']['updated_at']))}}</span>
                            </div>
                        </li><hr>
                        @else
                        <li class="media mb-2">
                            <div class="btn btn-danger rounded-circle btn-circle mr-3"><i
                                data-feather="x-circle" class="text-white"></i></div>
                            <div class="media-body">
                                <a href="/my-applications/{{$notification->data['jobapp']['user_id']}}">
                                <h5 class="message-title mb-0 mt-1">Application Status Updated</h5></a>
                                <span class="font-12 text-nowrap d-block text-dark">{{$notification->data['replyby']['company_name']}} has decided to move forward with another applicant for the position of {{$notification->data['post']['title']}}</span>
                                <span class="font-12 text-nowrap d-block text-muted">{{date('d-m-Y, H:i', strtotime($notification->data['jobapp']['updated_at']))}}</span>
                            </div>
                        </li><hr>
                        @endif
                        @endforeach
                    </ul>
                    @else
                    <ul class="list-unstyled">
                        <div class=text-center>
                        <h5 class="message-title mb-0 mt-1">There is no notification at the moment.</h5>
                        </div>
                    </ul>
                    @endif
                    <div class="pagination justify-content-center">
                        {{ $notifications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

