@extends('layouts.master')

@section('title')
    Companies | UKM-crms
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
    <div class="row">
        <div class="col-sm-5">
            <h2>Company Listings - <small>{{$profiles->total()}} profile(s)</small></h2>
        </div>
            <div class="col-sm-7">
            {{-- <h4 class="text-truncate text-center text-dark font-weight-medium">Serach here</h4> --}}
                <form class="form-inline justify-content-end" type="get" action="{{ url('/companies') }}">
                    <div class="customize-input">
                        {{-- <input type="text" name="title" value="" class="form-control custom-shadow custom-radius border-0 bg-white mt-3" placeholder="Job Title" aria-label="" /> --}}
                        <input type="text" name="company_name" value="" class="form-control custom-shadow custom-radius border-0 bg-white" placeholder="Company Name" aria-label="" />
                        <button class="btn btn-light custom-radius border-0" type="submit"><i class="form-control-icon" data-feather="search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12 mt-3">
            <div class="row">
                @forelse($profiles as $profile)
                <div class="col-lg-3 col-sm-6 align-items-stretch">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="profile-pic mb-4 mt-3">
                                <img src="/storage/company_logo/{{ $profile->logo }}" width="150" class="rounded-circle border border-light" alt="user" />
                                <h4 class="text-dark font-weight-medium mt-3 mb-0"><a href="/company-profile/{{$profile->id}}">{{ Str::limit($profile->company_name, 20) }}</a></h4>
                                {{-- <a href="/company-profile/{{$profile->id}}">View Profile</a> --}}
                            </div>
                        </div>
                        <div class="p-3 border-top mt-3">
                            <div class="row text-center">
                                @if(count($profile->posts) == 1)
                                <div class="col-6 border-right">
                                    <div class="link d-flex align-items-center justify-content-center font-weight-medium"><i class="mdi mdi-message font-20 mr-1"></i>Job Offer</div>
                                </div>
                                <div class="col-6">
                                    <div class="badge badge-pill badge-success font-16 px-3">{{ $profile->posts->count() }}</div>
                                </div>
                                @elseif(count($profile->posts) > 1)
                                <div class="col-6 border-right">
                                    <div class="link d-flex align-items-center justify-content-center font-weight-medium"><i class="mdi mdi-message font-20 mr-1"></i>Job Offers</div>
                                </div>
                                <div class="col-6">
                                    <div class="badge badge-pill badge-success font-16 px-3">{{ $profile->posts->count() }}</div>
                                </div>
                                @else
                                <div class="col-12 justify-content-center">
                                    <div class="badge badge-pill badge-light font-16">Not hiring</div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-4 px-3">No such company found.</div>
                @endforelse
            </div>
        </div>
        <div class="pagination justify-content-center">
            {{ $profiles->links() }}
        </div>
    </div>
@endsection
      