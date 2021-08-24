@extends('layouts.jsk')

@section('title')
    Edit Profile | UKM-crms
@endsection

@section('content')
@include('inc.message')
{{-- <div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1 pb-2">Edit Profile</h4>
            <div class="d-flex align-items-center"> --}}
                {{-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
                    </ol>
                </nav> --}}
            {{-- </div>
        </div>
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
                    <h4 class="page-title text-truncate text-white font-weight-medium mb-0">Edit Profile</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Personal Info</h4>
                    <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>E-mail Address</label>
                                        <input type="email" class="form-control" name ="email" id="email"
                                        value="{{ old('email') ?? $user->email }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Gender</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="male" value="male" {{ $user->profile->gender == 'male' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="female" value="female" {{ $user->profile->gender == 'female' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>

                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', $user->profile->dob) }}">

                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Contact No.</label>
                                        <input type="phone" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? $user->profile->phone }}" placeholder="6##(#######)" required autocomplete="phone" autofocus>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" rows="3" name="address" id="address" placeholder="Your Current Address **Tips: Use ' , ' as line breaker for your input">{{old('address', $user->profile->address)}}</textarea>

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="form-group">
                                        <label>Profile Picture</label><br>
                                        <img src="/storage/uploads/{{ $user->profile->image }}" alt="image" class="rounded-circle border border-light"
                                            width="200">
                                            <input type="file" class="form-control-file pt-2" id="image" name="image">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div><hr><br><br>
                                    <div class="form-group">
                                        <label>Resume</label><br>
                                        @if ($user->profile->resume != null)
                                        <a class="btn btn-block btn-primary" href="/storage/resumes/{{ $user->profile->resume }}" target="_blank">View File</a>               
                                        @else
                                           No resume uploaded yet. 
                                        @endif
                                            <input type="file" class="form-control-file pt-2" id="resume" name="resume">
                                            @error('resume')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>E-mail Address</label>
                                        <input type="email" class="form-control" name ="email" id="email"
                                        value="{{ old('email') ?? $employer->email }}" readonly>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Label</label>
                                        <input type="text" class="form-control" placeholder="col-md-6">
                                    </div>
                                </div> --}}
                            {{-- </div> --}}
                            {{-- <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Company Address</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" rows="3" name="address" id="address" placeholder="Your Company Address">{{old('address', $employer->address)}}</textarea>

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div> --}}<hr>
                            <h4 class="card-title">Education</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Programme Title</label>
                                        <textarea class="form-control @error('title') is-invalid @enderror" rows="2" name="title" id="title" placeholder="e.g. Bachelor of Software Engineering (Information System Development)">{{old('title', $user->profile->title)}}</textarea>

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Achievement</label>
                                        <textarea class="form-control @error('achievement') is-invalid @enderror" rows="2" name="achievement" id="achievement" placeholder="e.g. Dean List **Tips: Use ' . ' as line breaker for your input">{{old('achievement', $user->profile->achievement)}}</textarea>

                                        @error('achievement')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="study" value="study" {{ $user->profile->status == 'study' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="study">Studying</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="graduate" value="graduate" {{ $user->profile->status == 'graduate' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="graduate">Graduated</label>
                                        </div>

                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Completion Date</label>
                                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $user->profile->date) }}">

                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div><hr>
                            <h4 class="card-title">About Me</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Work Experience</label>
                                        <textarea class="form-control @error('experience') is-invalid @enderror" rows="3" name="experience" id="experience" placeholder="Share your experience here **Tips: Use ' . ' as line breaker for your input">{{old('experience', $user->profile->experience)}}</textarea>
                                        {{-- <small id="name1"
                                        class="badge badge-default badge-info form-text text-white float-left">Helper
                                        Text</small> --}}
                                        @error('experience')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Skills</label>
                                        <textarea class="form-control @error('skill') is-invalid @enderror" rows="3" name="skill" id="skill" placeholder="e.g. Programming skills, Data Visualization **Tips: Use ' , ' as line breaker for your input">{{old('skill', $user->profile->skill)}}</textarea>

                                        @error('skill')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="text-right">
                                {{-- <a class="btn btn-primary" href="/company-profile/{{$employer->id}}" role="button">View Live</a> --}}
                                <button type="submit" value="submit" class="btn btn-info">Save Profile</button>
                                {{-- <button type="reset" class="btn btn-dark">Reset</button> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- *************************************************************** -->
    <!-- End Grid Table -->
    <!-- *************************************************************** -->
</div>
@endsection

