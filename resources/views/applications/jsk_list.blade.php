@extends('layouts.jsk')

@section('title')
    My Applications | UKM-crms
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
                    <h4 class="page-title text-truncate text-white font-weight-medium mb-0">Manage Job Applications</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi_col_order"
                            class="table table-striped table-bordered display no-wrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job Title</th>
                                    <th>Type</th>
                                    <th>Company Name</th>
                                    <th>Status</th>
                                    <th>Applied On</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              @forelse($applications as $application)
                              <tr>
                                <td>{{$no}}</td>
                                <td><a href="/posts/{{$application->post->id}}">{{$application->post->title}}</td>
                                <td>{{$application->post->jobtype->name}}</td>
                                <td><a href="/company-profile/{{$application->post->employer->id}}">{{$application->post->employer->company_name}}</td>
                                <td>
                                    @if($application->status == 'Shortlisted')
                                    <h5 class="text-success"><i data-feather="check"></i> {{$application->status}}</h5>
                                    @elseif($application->status == 'Rejected')
                                    <h5 class="text-danger"><i data-feather="x"></i> {{$application->status}}</h5>
                                    @elseif($application->status == 'Withdrawn')
                                    <h5 class="text-muted"><i data-feather="delete"></i> {{$application->status}}</h5>
                                    @else
                                    <h5 class="text-warning"><i data-feather="loader"></i> {{$application->status}}</h5>
                                    @endif
                                </td>
                                <td>{{$application->created_at->format('d-m-Y')}}</td>
                                <td>  
                                    {{-- <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-dark pull-right">Edit</a> --}}
                                    {{-- <button type="button" class="btn btn-outline-dark pull-right" data-toggle="modal" data-target="#myModal">
                                        Edit
                                    </button> --}}
                                @if($application->status == 'Pending')
                                    {!! Form::open(['action' => ['ApplicationsController@update', $application->id], 'method' => 'POST', 'style' => 'text-align:center']) !!}
                                        {{Form::hidden('_method', 'PATCH')}}
                                        {{Form::submit('Withdraw', ['class' => 'btn btn-outline-danger', 'onclick' => 'return confirm("Are you sure to withdraw this application?")'])}}
                                    {!! Form::close() !!}
                                @elseif($application->status == 'Withdrawn')
                                    Withdrawn on {{$application->updated_at->format('d-m-Y')}}
                                @elseif($application->status == 'Shortlisted')
                                    Shortlisted on {{$application->updated_at->format('d-m-Y')}}
                                @else
                                    Rejected on {{$application->updated_at->format('d-m-Y')}}
                                @endif
                                </td>

                                <?php $no++; ?>
                                
                            </tr>
                            @empty

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- *************************************************************** -->
    <!-- End Grid Table -->
    <!-- *************************************************************** -->
</div>
@endsection


