@extends('layouts.master')

@section('title')
    {{$user->name}} | UKM-crms
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
                <img src="/storage/uploads/{{ $user->profile->image }}" alt="image" class="rounded-circle border border-light"
                width="200">
                <h4 class="page-title text-truncate text-dark font-weight-medium pt-4 pb-2"><strong>{{ $user->name }}</strong></h4>
                <p class="text-center text-muted">Joined {{ $user->created_at->diffForHumans() }}</p>
                    @if(!Auth::guard('web')->guest())
                        @if(Auth::guard('web')->user()->id == $user->id)
                            <a href="/profile-edit/{{ $user->id }}" class="btn btn-outline-dark mb-2">Edit Profile</a>
                        @endif
                    @endif
            </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header bg-light">
                    <h4 class="page-title text-truncate font-weight-medium mb-0">Jobseeker Details</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 col-sm-4">
                        <h4 class="card-title">Gender</h4>
                        @if( $user->profile->gender == 'male')
                            <p class="card-text">Male</p>
                        @elseif( $user->profile->gender == 'female')
                            <p class="card-text">Female</p>
                        @else
                            <p class="card-text">N/A</p>
                        @endif
                    </div>
                    <div class="col-lg-3 col-sm-4">
                        <h4 class="card-title">Age</h4>
                        @if( $user->profile->dob != null)
                            <p class="card-text">{{Carbon::parse($user->profile->dob)->diff(Carbon::now())->y}} Years
                            </p>
                        @else
                            <p class="card-text">N/A</p>
                        @endif
                    </div>
                    <div class="col-lg-3 col-sm-4">
                        <h4 class="card-title">Current Status</h4>
                        @if( $user->profile->status == 'study' )
                            <p class="card-text">Studying</p>
                        @elseif( $user->profile->status == 'graduate' )
                            <p class="card-text">Graduated</p>
                        @else
                            <p class="card-text">N/A</p>
                        @endif
                    </div>
                  </div><hr>
                  <div class="row mt-3">
                    <div class="col-lg-12">
                        <h4 class="card-title">Education</h4>
                        @if( $user->profile->title != null || $user->profile->date != null)
                            <p class="card-text">{{ $user->profile->title }} <small class="float-right">Completion Date: {{ Carbon::parse($user->profile->date)->format('d-m-Y') }}</small></p>
                        @else
                            <p class="card-text">N/A</p>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <h4 class="card-title mt-3">Achievement</h4>
                        @if( $user->profile->achievement != null)
                            <p class="card-text">
                                @foreach(explode('.',  $user->profile->achievement) as $row)
                                    <li>{{ $row }}</li>
                                @endforeach
                            </p>
                        @else
                            <p class="card-text">N/A</p>
                        @endif    
                    </div>
                  </div><hr>
                  <div class="row mt-3">
                    <div class="col-lg-12">
                        <h4 class="card-title">Work Experience</h4>
                        @if( $user->profile->experience != null)
                            <p class="card-text">
                                @foreach(explode('.',  $user->profile->experience) as $row)
                                    <li>{{ $row }}</li>
                                @endforeach
                            </p>
                        @else
                            <p class="card-text">N/A</p>
                        @endif 
                    </div>
                    <div class="col-lg-12">
                        <h4 class="card-title mt-3">Skills</h4>
                        @if( $user->profile->skill != null)
                            <p class="card-text">
                                @foreach(explode(',',  $user->profile->skill) as $row)
                                    <li>{{ $row }}</li>
                                @endforeach
                            </p>
                        @else
                            <p class="card-text">N/A</p>
                        @endif
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


      