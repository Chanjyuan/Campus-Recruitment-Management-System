@extends('layouts.master')

@section('title')
    {{$employer->company_name}} | UKM-crms
@endsection

@section('content')

<div class="container pt-3">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- row -->
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @include('inc.message')
    <div class="row">
        <div class="col-lg-3">
            <div class="text-center">
            <div class="justify-content-center">
                <img src="/storage/company_logo/{{ $employer->logo }}" alt="image" class="rounded-circle border border-light"
                width="200">
                <h4 class="page-title text-truncate text-dark font-weight-medium pt-4 pb-2"><strong>{{ $employer->company_name }}</strong></h4>
                {{-- <h4 class="card-title text-center pt-4 pb-2"><strong>{{ $employer->company_name }}</strong></h4> --}}
                <p class="text-center text-muted">Joined {{ $employer->created_at->diffForHumans() }}</p>
                    @if(!Auth::guard('employer')->guest())
                        @if(Auth::guard('employer')->user()->id == $employer->id)
                            <a href="/posts/create" class="btn btn-outline-dark">Post Job</a>
                            <a href="/company-profile-edit/{{ $employer->id }}" class="btn btn-outline-dark">Edit Profile</a>
                        @endif
                    @endif
            </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header bg-light">
                    <h4 class="page-title text-truncate font-weight-medium mb-0">Company Overview</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Company Bio</h4>
                    <p class="card-text">{{ $employer->bio }}</p>
                    <h4 class="card-title">Contact Details</h4>
                    <p class="card-text">{{$employer->name}}: {{ $employer->phone }}</p>
                    <h4 class="card-title">Company Address</h4>
                    <address>
                        @foreach(explode(',', $employer->address) as $row)
                            <li style="list-style: none;">{{ $row }}</li>
                       @endforeach
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Jobs posted from this company</h2>
        {{-- <div class="card">
            <div class="card-body"> --}}
                @forelse($posts as $post)
                <ul class="list-unstyled">
                    <li class="media py-2">
                        <img src="/storage/company_logo/{{ $employer->logo }}" alt="image" class="rounded-circle border border-light d-flex mr-3"
                        width="100">
                        <div class="media-body pt-4">
                            <h5 class="mt-0 mb-1">{{$post->title}}</h5>
                            <h5 class="mb-0"><span class="badge badge-primary">{{ $post->jobtype->name }}</span><a href="/posts/{{$post->id}}" class="btn btn-outline-primary float-right">View Job</a></h5>
                            <small>Posted {{$post->created_at->diffForHumans()}}</small>
                        </div>
                    </li>
                    @empty
                        <div class="text-center py-4">No job offers yet.</div>
                </ul>
                @endforelse
                <div class="pagination justify-content-center">
                    {{ $posts->links()}}
                </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection


      