@extends('layouts.master')

@section('title')
    Jobs | UKM-crms
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
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-truncate text-center text-dark font-weight-medium">Advanced Search</h4>
                <form class="form-inline my-lg-0" type="get" action="{{ url('/jobs') }}">
                    <div class="customize-input">
                        <input type="text" name="title" value="" class="form-control custom-shadow custom-radius border-0 bg-white mt-3" placeholder="Job Title" aria-label="" />
                        {{-- <input type="text" name="company_name" value="" class="form-control custom-shadow custom-radius border-0 bg-white mt-3" placeholder="Company Name" aria-label="" /> --}}
                        <select class="form-control custom-select custom-shadow custom-radius border-0 bg-white mr-sm-2 mt-3" name="type" id="type">
                            <option value="" selected>Job Type | Choose...</option>
                            @foreach ($types as $key => $value)
                                <option value="{{ $key }}">
                                    {{ $value}}
                                </option>
                            @endforeach
                        </select>
                        <select class="form-control custom-select custom-shadow custom-radius border-0 bg-white mr-sm-2 mt-3" name="industry" id="industry">
                            <option value="" selected>Industry | Choose...</option>
                            @foreach ($industries as $key => $value)
                                <option value="{{ $key }}">
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        <button class="btn btn-light custom-radius border-0 mt-3" type="submit"><i class="form-control-icon" data-feather="search"></i> Filter</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <h2>Jobs Available - <small>{{$posts->total()}} job(s)</small></h2>
            {{-- <div class="card">
                <div class="card-body"> --}}
                    @forelse($posts as $post)
                    <ul class="list-unstyled">
                        <li class="media py-2">
                            <img src="/storage/company_logo/{{ $post->employer->logo }}" alt="image" class="rounded-circle border border-light d-flex mr-3"
                            width="100">
                            <div class="media-body pt-4">
                                <h5 class="mt-0 mb-1">{{$post->title}}</h5>
                                <h5 class="mb-0"><span class="badge badge-primary">{{ $post->jobtype->name }}</span><a href="/posts/{{$post->id}}" class="btn btn-outline-primary float-right">View Job</a></h5>
                                <small>Posted {{$post->created_at->diffForHumans()}}</small>
                            </div>
                        </li>
                        @empty
                            <div class="text-center py-4">No matching jobs found.</div>
                    </ul>
                    @endforelse
                    <div class="pagination justify-content-center">
                        {{ $posts->links()}}
                    </div>
                {{-- </div>
            </div> --}}
        </div>
    </div>
@endsection
      