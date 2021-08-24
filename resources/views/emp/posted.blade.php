@extends('layouts.emp')

@section('title')
    Posted Jobs | UKM-crms
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
                    <h4 class="page-title text-truncate text-white font-weight-medium mb-0">Posted Jobs</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job Title</th>
                                    <th>Positions</th>
                                    <th>Applicants</th>
                                    <th>Posted On</th>
                                    <th>Deadline</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; ?>
                              @forelse($posts as $post)
                              <tr>
                                <td>{{$no}}</td>
                                <td>
                                    <h5 class="mb-0"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h5>
                                    <span class="text-dark font-14">{{$post->jobtype->name}}</span>
                                    @if($post->status == 'Available')
                                    <span class="badge badge-primary">Active</span>
                                    @else
                                    <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>{{$post->position}}</td>
                                <td>{{$post->applications->count()}}</td>
                                <td>{{$post->created_at->format('d-m-Y')}}</td>
                                {{-- @if(Carbon::parse($post->deadline)->isPast()) --}}
                                @if(Carbon::parse($post->deadline) < Carbon::now()->toDateString())
                                <td class="text-danger">
                                    <h5 class="mb-0">{{Carbon::parse($post->deadline)->format('d-m-Y')}}</h5>
                                    <span class="badge badge-danger">Expired</span>
                                </td>
                                @else
                                <td>
                                    {{Carbon::parse($post->deadline)->format('d-m-Y')}}
                                </td>
                                @endif
                                <td class="btn-toolbar justify-content-center">
                                    @if($post->status == 'Available')
                                    {!! Form::open(['action' => ['EmployerController@deactivate', $post->id], 'method' => 'POST']) !!}
                                    {{Form::hidden('_method', 'POST')}}
                                    {{Form::button('<i class="fa fa-toggle-on"></i>', ['class' => 'btn btn-circle btn-outline-success mr-2', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Deactivate', 'type'=>'submit'])}}
                                    {!! Form::close() !!}  
                                    <a href="/posts/{{$post->id}}/edit" class="btn btn-circle btn-outline-dark mr-2" data-toggle="tooltip"  data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::button('<i class="fa fa-trash-alt"></i>', ['class' => 'btn btn-circle btn-outline-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Remove', 'type'=>'submit', 'onclick' => 'return confirm("Are you sure to remove this job?")'])}}
                                    {!! Form::close() !!}
                                    @else
                                    {!! Form::open(['action' => ['EmployerController@activate', $post->id], 'method' => 'POST']) !!}
                                    {{Form::hidden('_method', 'POST')}}
                                    {{Form::button('<i class="fa fa-toggle-off"></i>', ['class' => 'btn btn-circle btn-outline-secondary mr-2', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Activate', 'type'=>'submit'])}}
                                    {!! Form::close() !!}
                                    <a href="/posts/{{$post->id}}/edit" class="btn btn-circle btn-outline-dark mr-2" data-toggle="tooltip"  data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::button('<i class="fa fa-trash-alt"></i>', ['class' => 'btn btn-circle btn-outline-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Remove', 'type'=>'submit', 'onclick' => 'return confirm("Are you sure to remove this job?")'])}}
                                    {!! Form::close() !!}
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

{{-- @section('scripts')
<div id="myModal" class="modal fade" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> - Job Form</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h6>Text in a modal</h6>
                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                <hr>
                <h6>Overflowing text to show scroll behavior</h6>
                <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio,
                    dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta
                    ac consectetur ac, vestibulum at eros.</p>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                    Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor
                    auctor.</p>
                <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo
                    cursus magna, vel scelerisque nisl consectetur et. Donec sed odio
                    dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>/.modal-content
    </div>.modal-dialog 
</div>/.modal
@endsection --}}
