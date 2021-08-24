@extends('layouts.jsk')

@section('title')
    Saved Jobs | UKM-crms
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
            <section class="cart_area">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="page-title text-truncate text-white font-weight-medium mb-0">Saved Jobs</h4>
                    </div>
                    <div class="card-body">
                        <div id="AppendCartItems">
                            @include('posts.saved_jobs')
                        </div>
                    </div>
                </div>
            </section>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    $(document).on('click', '.btnItemDelete', function() {
                        var savedjobid = $(this).data('savedjobid');
                        var result = confirm("Are you sure to remove this job?");
                        if (result) {
                            $.ajax({
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "savedjobid":savedjobid
                                },
                                url: '/remove',
                                type: 'post',
                                success:function(resp) {
                                    $("#AppendCartItems").html(resp.view);
                                }, 
                                error:function() {
                                    alert("Error");
                                }
                            });
                        }
                    });
                });
            </script>
        </div>
    </div>
    <!-- *************************************************************** -->
    <!-- End Grid Table -->
    <!-- *************************************************************** -->
</div>
@endsection


