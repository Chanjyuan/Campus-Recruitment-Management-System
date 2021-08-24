@extends('layouts.emp')

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
                        @if($notification->type == 'App\Notifications\ApplicationSent')
                        <li class="media mb-2">
                            <div class="btn btn-info rounded-circle btn-circle mr-3"><i
                                data-feather="user" class="text-white"></i></div>
                            <div class="media-body">
                                <a href="/profile/{{$notification->data['applyby']['id']}}">
                                <h5 class="message-title mb-0 mt-1">New Application Added</h5></a>
                                <span class="font-12 text-nowrap d-block text-dark">{{$notification->data['applyby']['name']}} has applied for position of {{$notification->data['post']['title']}}</span>
                                <span class="font-12 text-nowrap d-block text-muted">{{date('d-m-Y, H:i', strtotime($notification->data['jobapp']['created_at']))}}</span>
                            </div>
                        </li><hr>
                        @elseif($notification->type == 'App\Notifications\PostDeactivated')
                        <li class="media mb-2">
                            <div class="btn btn-warning rounded-circle btn-circle mr-3"><i
                                data-feather="alert-circle" class="text-white"></i></div>
                            <div class="media-body">
                                <a href="/posts/{{$notification->data['post']['id']}}">
                                <h5 class="message-title mb-0 mt-1">Job Post Deactivated</h5></a>
                                <span class="font-12 text-nowrap d-block text-dark">The job posting of 
                                {{$notification->data['post']['title']}} has been deactivated by the admin, please review/update your job posting or contact <a href="mailto:ukm-karier@ukm.edu.my">ukm-karier@ukm.edu.my</a>.</span>
                                <span class="font-12 text-nowrap d-block text-muted">{{date('d-m-Y, H:i', strtotime($notification->data['post']['updated_at']))}}</span>
                            </div>
                        </li><hr>
                        @else
                        <li class="media mb-2">
                            <div class="btn btn-success rounded-circle btn-circle mr-3"><i
                                data-feather="check-circle" class="text-white"></i></div>
                            <div class="media-body">
                                <a href="/posts/{{$notification->data['post']['id']}}">
                                <h5 class="message-title mb-0 mt-1">Job Post Reactivated</h5></a>
                                <h6 class="font-12 text-nowrap d-block text-dark">The job posting of 
                                {{$notification->data['post']['title']}} has been activated by the admin and will reappear on the listing.</h6>
                                <span class="font-12 text-nowrap d-block text-muted">{{date('d-m-Y, H:i', strtotime($notification->data['post']['updated_at']))}}</span>
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

