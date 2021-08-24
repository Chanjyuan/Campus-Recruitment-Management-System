@extends('layouts.master')

@section('title')
    {{$post->title}} | Jobs @ UKM-crms
@endsection

@section('content')

<div class="container pt-3">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- row -->
    @if (Session::has('success_message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success_message') }}
        <button type="button" class="close" data-dismiss="alert" arial-label="Close">
            <span arial-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error_message') }}
            <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                <span arial-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-3">
            <div class="text-center">
            <div class="justify-content-center">
                <img src="/storage/company_logo/{{ $post->employer->logo }}" alt="image" class="rounded-circle border border-light"
                width="200">
                <h4 class="page-title text-truncate font-weight-medium text-center pt-4 pb-3"><a href="/company-profile/{{$post->employer->id}}">{{ $post->employer->company_name }}</a></h4>
                    @if(!Auth::guard('web')->guest() && !(Carbon::parse($post->deadline) < Carbon::now()->toDateString())
                    && $post->status != 'Unavailable')
                    <form action="{{ url('saved-for-later') }}" method="post" class="form-horizontal qtyFrm" >
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post['id'] }}">
                        <button type="submit" class="btn btn-outline-dark">Save Job</button>
                    </form>
                    <br>
                    {{-- <form action="{{ action('ApplicationsController@store', $post['id']) }}" method="post" class="form-horizontal qtyFrm" >
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post['id'] }}">
                        <button type="submit" class="btn btn-outline-dark">Apply Now</button>
                    </form> --}}
                    @if(count($applications) > 0)
                        <h3><span class="pl-3 pr-3 pt-2 pb-2 badge badge-light">Applied</span></h3>
                    @else
                    {!! Form::open(['action' => ['ApplicationsController@store', $post['id']], 'method' => 'POST']) !!}
                        {!! Form::hidden('post_id', $post['id']) !!}
                        {{ Form::submit('Apply Now', ['class' => 'btn btn-outline-dark', 'onclick' => 'return confirm("Are you sure to apply this job?")']) }}
                        {{-- <input type="submit" value="Place Your Order" class="pull-right btn btn-success" name="submitBtn" onclick="this.disabled=true;this.form.submit();" --}}
                    {!! Form::close() !!}
                    @endif
                    @endif
                    @if(!Auth::guard('employer')->guest())
                        @if(Auth::guard('employer')->user()->id == $post->employer->id)
                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-outline-dark">Edit Job</a>
                        @endif
                    @endif
                {{-- <p class="text-center text-muted">Joined {{ $employer->created_at->diffForHumans() }}</p>
                    @if(!Auth::guard('employer')->guest())
                        @if(Auth::guard('employer')->user()->id == $employer->id)
                            <a href="/company-profile-edit/{{ $employer->id }}" class="btn btn-outline-primary">Edit Profile</a>
                        @endif
                    @endif --}}
            </div>
            </div>
        </div>
        <div class="col-lg-9">
            <h2>{{ $post->title }} <span class="badge badge-primary">{{ $post->jobtype->name }}</span>
                @if (Carbon::parse($post->deadline) < Carbon::now()->toDateString())
                <span class="badge badge-danger">Expired</span>
                @endif
                @if ($post->status == "Unavailable")
                <span class="badge badge-secondary">Inactive</span>
                @endif
            </h2>
            
            <div class="card">
                <div class="card-header bg-light">
                    <h4 class="page-title text-truncate font-weight-medium mb-0">Description - 
                        <small>Posted on {{$post->created_at->toDayDateTimeString()}}</small>
                    </h4>
                </div>
                <div class="card-body pt-3">
                    <h4 class="card-title">Job Scope</h4>
                    <p class="card-text">
                        @foreach(explode('.',  $post->job_scope) as $row)
                            <li>{{ $row }}</li>
                        @endforeach
                    </p>
                    <h4 class="card-title">Job Specification</h4>
                    <p class="card-text">
                        @foreach(explode('.',  $post->specification) as $row)
                            <li>{{ $row }}</li>
                        @endforeach
                    </p>
                    <h4 class="card-title">Location</h4>
                    {{-- <p class="card-text">{!! $post->location !!}</p> parse HTML --}}
                    <address>
                        @foreach(explode(',', $post->location) as $row)
                            <li style="list-style: none;">{{ $row }}</li>
                        @endforeach
                    </address>
                    <h4 class="card-title">Benefits & Salary / Allowance</h4>
                    <p class="card-text">
                        <li>{{ $post->benefit }}</li>
                        @if($post->salary != 0)
                        <li>RM {{ $post->salary }}</li>
                        @else
                        <li>Salary details will be discussed upon interview.</li>
                        @endif
                    </p>
                    <h4 class="card-title">No. of Positions</h4>
                    <p class="card-text">{{ $post->position }}</p>
                    <h4 class="card-title">Apply by</h4>
                    <p class="card-text">{{Carbon::parse($post->deadline)->format('d-m-Y')}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2>Other jobs from this company</h2>
            {{-- <div class="card">
                <div class="card-body"> --}}
                    @forelse($others as $other)
                    <ul class="list-unstyled">
                        <li class="media py-2">
                            <img src="/storage/company_logo/{{ $other->employer->logo }}" alt="image" class="rounded-circle border border-light d-flex mr-3"
                            width="100">
                            <div class="media-body pt-4">
                                <h5 class="mt-0 mb-1">{{$other->title}}</h5>
                                <h5 class="mb-0"><span class="badge badge-primary">{{ $other->jobtype->name }}</span><a href="/posts/{{$other->id}}" class="btn btn-outline-primary float-right">View Job</a></h5>
                                <small>Posted {{$other->created_at->diffForHumans()}}</small>
                            </div>
                        </li>
                        @empty
                            <div class="text-center py-4">No other jobs yet.</div>
                    </ul>
                    @endforelse
                {{-- </div>
            </div> --}}
        </div>
    </div>
</div>
</div>
@endsection
      