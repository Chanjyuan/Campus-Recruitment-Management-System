@extends('layouts.jsk')

@section('title')
    Jobseeker Dashboard | UKM-crms
@endsection

@section('content')
<div class="page-breadcrumb">
    @include('inc.message')
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Jobseeker Dashboard</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item pb-2"><a href="#">Overview</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->

<div class="container-fluid">
    <!-- *************************************************************** -->
    <!-- Start First Cards -->
    <!-- *************************************************************** -->
    <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{$apps}}</h2>
                        </div>
                        <h6 class="text-muted font-16 font-weight-normal mb-0 w-100 text-truncate">Jobs Applied</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="briefcase" style="width: 30px; height: 30px"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{$savedCount}}</h2>
                        <h6 class="text-muted font-16 font-weight-normal mb-0 w-100 text-truncate">Jobs Saved</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="bookmark" style="width: 30px; height: 30px"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">My Applications Summary</h4>
                    <a class="px-3 mb-2" href="/my-applications/{{Auth::user()->id}}">View All <i data-feather="chevron-right" class="svg-icon"></i></a>
                </div>
                <div class="progress mt-4 progress-md">
                    @if($apps > 0)
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{number_format((float)($p/$apps *100))}}%" aria-valuenow="{{$p*10}}" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="bottom" title="Pending: {{$p}}"></div>
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{number_format((float)($s/$apps *100))}}%" aria-valuenow="{{$s*10}}" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="bottom" title="Shortlisted: {{$s}}"></div> 
                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{number_format((float)($r/$apps *100))}}%" aria-valuenow="{{$r*10}}" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="bottom" title="Rejected: {{$r}}"></div>
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: {{number_format((float)($w/$apps *100))}}%" aria-valuenow="{{$w*10}}" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="bottom" title="Withdrawn: {{$w}}"></div>
                    @else
                        <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    @endif
                </div>
                @if($apps > 0)
                <div class="row ml-0">
                    <div class="d-inline-flex mt-4">
                        <i class="fa fa-circle text-warning font-13"></i><h6 class="ml-2 text-dark"><strong>{{$p}}</strong> Pending: <strong class="mr-2">{{number_format((float)($p/$apps *100),2,'.','')}}%</strong></h6>
                        <i class="fa fa-circle text-success font-13 ml-4"></i><h6 class="ml-2 text-dark"><strong>{{$s}}</strong> Shortlisted: <strong class="mr-2">{{number_format((float)($s/$apps *100),2,'.','')}}%</strong></h6>
                        <i class="fa fa-circle text-danger font-13 ml-4"></i><h6 class="ml-2 text-dark"><strong>{{$r}}</strong> Rejected: <strong class="mr-2">{{number_format((float)($r/$apps *100),2,'.','')}}%</strong></h6>
                        <i class="fa fa-circle text-secondary font-13 ml-4"></i><h6 class="ml-2 text-dark"><strong>{{$w}}</strong> Withdrawn: <strong class="mr-2">{{number_format((float)($w/$apps *100),2,'.','')}}%</strong></h6>
                    </div>
                </div>
                @else
                    <div class="mt-2" style="text-align: center">No jobs applied yet.</div>
                @endif
            </div>
        </div>

    </div>
    <!-- *************************************************************** -->
    <!-- End First Cards -->
    <!-- *************************************************************** -->
    <!-- *************************************************************** -->
    <!-- Start Top Leader Table -->
    <!-- *************************************************************** -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Recently Applied Jobs</h4>
                        <a class="px-3 mb-2" href="/my-applications/{{Auth::user()->id}}">View All <i data-feather="chevron-right"
                            class="svg-icon"></i></a>
                        <div class="ml-auto">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap v-middle mb-0">
                            <thead>
                                <tr class="border-0">
                                    <th class="border-0 font-14 font-weight-medium text-muted px-2">#
                                    </th>
                                    <th class="border-0 font-14 font-weight-medium text-muted px-2">Job Title / Job Type
                                    </th>
                                    <th class="border-0 font-14 font-weight-medium text-muted px-2">
                                        Company
                                    </th>
                                    <th class="border-0 font-14 font-weight-medium text-muted px-2">Date Applied</th>
                                    <th class="border-0 font-14 font-weight-medium text-muted px-2 text-center">
                                        Status
                                    </th>
                                    {{-- <th class="border-0 font-14 font-weight-medium text-muted">Budget</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @forelse($applications as $application)
                                <tr>
                                    <td class="text-muted px-2 font-14">
                                        {{$no}}
                                    </td>
                                    <td class="px-2 py-3">
                                        <div class="d-flex no-block align-items-center">
                                            <div class="">
                                                <h5 class="text-dark mb-0 font-16 font-weight-medium"><a href="/posts/{{$application->post->id}}">{{$application->post->title}}</a></h5>
                                                <span class="text-dark font-14">{{$application->post->jobtype->name}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-2 py-3"><a href="/company-profile/{{$application->post->employer->id}}">{{$application->post->employer->company_name}}</td>
                                    <td class="px-2 py-3">
                                        <div class="popover-icon">
                                            {{$application->created_at->format('d-m-Y')}}
                                        </div>
                                    </td>
                                    <td class="text-center font-weight-medium text-muted px-2 py-3">
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
                                    {{-- <td class="font-weight-medium text-dark border-top-0 px-2 py-4">
                                        <button type="button"
                                        class="btn waves-effect waves-light btn-rounded btn-light">Edit</button>
                                    </td> --}}
                                    <?php $no++; ?>
                                </tr>
                                @empty
                                <tr>
                                    <td></td><td></td>
                                        <td class="text-center pr-4 px-2 py-3">
                                            No jobs applied yet.
                                        </td>
                                    <td></td><td></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- *************************************************************** -->
    <!-- End Top Leader Table -->
    <!-- *************************************************************** -->
</div>
@endsection

