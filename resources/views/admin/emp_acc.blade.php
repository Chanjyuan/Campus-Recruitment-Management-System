@extends('layouts.adm')

@section('title')
    Manage Employers | UKM-crms
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
                    <h4 class="card-title text-truncate text-white font-weight-medium mb-0">Employer Accounts</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi_col_order"
                            class="table table-striped table-bordered display no-wrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company Name</th>
                                    <th>Jobs Posted</th>
                                    <th>Joined On</th>
                                    <th>Last Logged in</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              @forelse($employers as $employer)
                              <tr>
                                <td>{{$no}}</td>
                                <td><a href="/company-profile/{{$employer->id}}">{{$employer->company_name}}</a>
                                    {{-- <span class="text-dark font-14">{{$employer->name}}</span> --}}
                                </td>
                                <td>{{DB::table('posts')->where('employer_id', '=', $employer->id)->count()}}</td>
                                <td>
                                    {{$employer->created_at->format('d-m-Y')}} 
                                    {{-- <span class="badge badge-secondary ml-2">{{ Carbon::parse($employer->created_at)->diffForHumans(null, false, true)}}</span> --}}
                                </td>
                                <td>
                                    @if($employer->last_login_at != null)
                                        {{Carbon::parse($employer->last_login_at)->format('d-m-Y, H:i:s')}} <span class="badge badge-secondary ml-2">{{ Carbon::parse($employer->last_login_at)->diffForHumans(null, false, true)}}</span>
                                    @else
                                        N/A
                                    @endif</td>
                                <td>  
                                    {!! Form::open(['action' => ['AdminController@removeEmp', $employer->id], 'method' => 'POST', 'style' => 'text-align:center', 'onclick' => 'return confirm("Are you sure to remove this account?")']) !!}
                                        {{Form::hidden('_method', 'POST')}}
                                        {{Form::submit('Remove', ['class' => 'btn btn-outline-danger'])}}
                                    {!! Form::close() !!}
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


