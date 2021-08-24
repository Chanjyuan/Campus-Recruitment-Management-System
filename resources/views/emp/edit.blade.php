@extends('layouts.emp')

@section('title')
    Edit Company Profile | UKM-crms
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
                    <h4 class="page-title text-truncate text-white font-weight-medium mb-0">Edit Company Profile</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Person-in-Charge</h4>
                    <form action="/company-profile/{{ $employer->id }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $employer->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact No.</label>
                                        <input type="phone" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?? $employer->phone }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4 class="card-title">Company Details</h4>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') ?? $employer->company_name }}" required autocomplete="company_name" autofocus>

                                        @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail Address</label>
                                        <input type="email" class="form-control" name ="email" id="email"
                                        value="{{ old('email') ?? $employer->email }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Company Address</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" rows="3" name="address" id="address" placeholder="Your Company Address **Tips: Use ' , ' as line breaker for your input">{{old('address', $employer->address)}}</textarea>

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="form-group">
                                        <label>Company Logo</label><br>
                                        <img src="/storage/company_logo/{{ $employer->logo }}" alt="image" class="rounded-circle border border-light"
                                            width="200">
                                            <input type="file" class="form-control-file pt-2" id="logo" name="logo">
                                            @error('logo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Bio</label>
                                        <textarea class="form-control @error('bio') is-invalid @enderror" rows="3" name="bio" id="bio" placeholder="Tell us more about your company...">{{old('bio', $employer->bio)}}</textarea>

                                        @error('bio')
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

