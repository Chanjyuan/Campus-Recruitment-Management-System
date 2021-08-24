@extends('layouts.emp')

@section('title')
    Edit Job | UKM-crms
@endsection

@section('content')
@include('inc.message')
{{-- <div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1 pb-2">Edit Company Profile</h4>
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
                    <h4 class="page-title text-truncate text-white font-weight-medium mb-0">{{$post->title}} - Job Form</h4>
                </div>
                <div class="card-body">
                    {{-- <h4 class="card-title">Job Details</h4> --}}
                    <form action="{{ action('PostsController@update', $post->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $post->title }}" placeholder="eg. Junior Software Engineer" required autocomplete="title" autofocus>

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="mr-sm-2" for="type">Job Type</label>
                                    {{Form::select('type', $types, $post->type, ['name' => 'type', 'id' => 'type', 'class' => 'form-control custom-select mr-sm-2 text-dark', 'placeholder' => 'Choose...'])}}

                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="mr-sm-2" for="industry">Industry</label>
                                    {{Form::select('industry', $industries, $post->industry, ['name' => 'industry', 'id' => 'industry', 'class' => 'form-control custom-select mr-sm-2 text-dark', 'placeholder' => 'Choose...'])}}
                                    {{-- <select class="form-control custom-select mr-sm-2 text-dark " name="industry" id="industry">
                                        <option value="">Choose...</option>
                                        @foreach ($industries as $key => $value)
                                            <option value="{{ $key }}" {{  $key == 'industries' ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select> --}}

                                    @error('industry')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Salary / RM-</label>
                                        <input type="text" name="salary" id="salary" class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary') ?? $post->salary }}" placeholder="e.g. 2500" autofocus>

                                        @error('salary')
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
                                        <label>Location</label>
                                        <textarea class="form-control @error('location') is-invalid @enderror" rows="3" name="location" id="location" placeholder="Working Address **Tips: Use ' , ' as line breaker for your input">{{ old('location', $post->location) }}</textarea>

                                        @error('location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Benefits</label>
                                        <textarea class="form-control @error('benefit') is-invalid @enderror" rows="3" name="benefit" id="benefit" placeholder="e.g. Lunch Break 1.5 hrs">{{ old('benefit', $post->benefit) }}</textarea>

                                        @error('benefit')
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
                                        <label>Job Specification</label>
                                        <textarea class="form-control @error('specification') is-invalid @enderror" rows="3" name="specification" id="specification" placeholder="e.g. Degree in - **Tips: Use ' . ' as line breaker for your input">{{ old('specification', $post->specification) }}</textarea>

                                        @error('specification')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Job Scope</label>
                                        <textarea class="form-control @error('job_scope') is-invalid @enderror" rows="3" name="job_scope" id="job_scope" placeholder="Tasks required in this job **Tips: Use ' . ' as line breaker for your input">{{ old('job_scope', $post->job_scope)}}</textarea>

                                        @error('job_scope')
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
                                        <label>No. of Positions</label>
                                        <input type="text" name="position" id="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') ?? $post->position }}" placeholder="Number" required autocomplete="position" autofocus>

                                        @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Deadline</label>
                                        <input type="date" class="form-control" id="deadline" name="deadline" value="{{ old('deadline', $post->deadline) }}">

                                        @error('deadline')
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
                                <button type="submit" value="submit" class="btn btn-info">Update Now</button>
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

{{-- <div class="row">
    <div class="col-md-6 mb-3">
        <label class="mr-sm-2" for="type">Job Type</label>
        <select class="custom-select mr-sm-2 text-dark" name="type" id="type">
            <option value="" selected>Choose...</option>
            <option value="1">Internship</option>
            <option value="2">Full-time</option>
            <option value="3">Contract</option>
        </select>

        @error('type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="mr-sm-2" for="industry">Industry</label>
        <select class="custom-select mr-sm-2 text-dark" name="industry" id="industry">
            <option value="" selected>Choose...</option>
            <option value="1">Accounting / Finance</option>
            <option value="2">Admin / HR</option>
            <option value="3">Business</option>
            <option value="4">Consultancy / Law</option>
            <option value="5">Economics</option>
            <option value="6">Engineering</option>
            <option value="7">Healthcare / Hospitality</option>
            <option value="8">IT / Computer</option>
            <option value="9">Manufacturing</option>
            <option value="10">Science</option>
            <option value="11">Telecommunications</option>
            <option value="12">Others</option>
        </select>

        @error('industry')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
    </div>
</div> --}}