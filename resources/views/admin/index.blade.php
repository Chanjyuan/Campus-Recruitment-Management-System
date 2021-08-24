@extends('layouts.adm')

@section('title')
    Admin Dashboard | UKM-crms
@endsection

@section('content')
<div class="page-breadcrumb">
    @include('inc.message')
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Admin Dashboard</h3>
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
                <div class="d-flex d-lg-flex d-sm-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 w-100 font-weight-medium">{{$postCount}}</h2>
                            <span class="badge bg-success font-14 text-white font-weight-medium badge-pill ml-3 d-lg-block d-md-none">Active: {{$activeCount}}</span>
                        </div>
                        <h6 class="text-muted font-16 font-weight-normal mb-0 w-100 text-truncate">Jobs Posted</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="briefcase" style="width: 30px; height: 30px"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-sm-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{$position}}</h2>
                            <span class="badge bg-primary font-14 text-white font-weight-medium badge-pill ml-3 d-md-none d-lg-block">
                            Applied: {{$appliedCount}}</span>
                        </div>
                        <h6 class="text-muted font-16 font-weight-normal mb-0 w-100 text-truncate">Positions Offered</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="check-circle" style="width: 30px; height: 30px"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-sm-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{$jskCount}}</h2>
                            <span class="badge bg-warning font-14 text-white font-weight-medium badge-pill ml-3 d-lg-block d-md-none">
                            Graduated: {{$graduated}}</span>
                        </div>
                        <h6 class="text-muted font-16 font-weight-normal mb-0 w-100 text-truncate">Jobseekers Registered</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="users" style="width: 30px; height: 30px"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-sm-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 w-100 font-weight-medium">{{$empCount}}</h2>
                            <span class="badge font-14 text-white font-weight-medium badge-pill ml-3 d-lg-block d-md-none" 
                            style="background-color: hotpink">
                            Hiring: {{$hiring}}</span>
                        </div>
                        <h6 class="text-muted font-16 font-weight-normal mb-0 w-100 text-truncate">Employers Registered</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="user-check" style="width: 30px; height: 30px"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- *************************************************************** -->
    <!-- End First Cards -->
    <!-- *************************************************************** -->
    <!-- *************************************************************** -->
    <!-- Start Sales Charts Section -->
    <!-- *************************************************************** -->
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Top Job Type</h4>
                    <div>
                        <canvas id="pieChart" width="350" height="250"></canvas>
                    </div>
                </div>
                <div class="card-footer border-top" style="background-color: white">
                    <div class="row text-center">
                        <small><i data-feather="clock" class="mr-2"></i>Last updated at @php  echo date('F j, Y', time() ) @endphp
                        </small>
                    </div>
                </div>
            </div>
         
            <script>
              var ctx = document.getElementById('pieChart').getContext('2d');
              var typename = @json($typename);
              var tname = [typename];
              var intern = @json($intern);
              var full = @json($full);
              var cont = @json($cont);
                var pieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                  labels: tname[0],
                  datasets: [{
                    label: "Jobs",
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)' 
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)', //red
                        'rgba(54, 162, 235, 1)', //blue
                        'rgba(153, 102, 255, 1)' //purple
                    ],
                    borderWidth: 1,
                    data: [intern,full,cont]
                  }]
                },
                options: {
                  title: {
                    display: true,
                    text: 'Jobs by Type'
                  },
                  plugins: {
                    datalabels: {
                        formatter: function(value, context) {
                            return Math.round(value/(intern+full+cont)*100) + '%';
                            }
                        }
                  },
                  legend: {
                    position: 'bottom',
                    labels: {
                    boxWidth: 20,
                    }
                  }
                },
            });
            </script>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Job Applications</h4>
                    <div>
                        <canvas id="bar-chart" width="350" height="250"></canvas>
                    </div>
                </div>
                <div class="card-footer border-top" style="background-color: white">
                    <div class="row text-center">
                        <small><i data-feather="clock" class="mr-2"></i>Last updated at @php  echo date('F j, Y', time() ) @endphp
                        </small>
                    </div>
                </div>
            </div>
            <script>
                var ctx = document.getElementById('bar-chart');
                var sta1 = @json($sta1);
                var sta2 = @json($sta2);
                var sta3 = @json($sta3);
                var sta4 = @json($sta4);
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Shortlisted', 'Pending', 'Rejected', 'Withdrawn'],
                        datasets: [{
                            label: 'Application',
                            data: [sta1, sta2, sta3, sta4],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(153, 102, 255, 1)',
                            ],
                            borderWidth: 1
                        }]
                        },
                        options: {
                            animation: {
                              animationScale: true
                            },
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Applications by Status'
                            },
                            legend: {
                                display: false,
                                position: 'bottom',
                                labels: {
                                    boxWidth: 20,
                                }
                            },
                            scales: {
                              yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                              }]
                            },
                            plugins: {
                                datalabels: {
                                    formatter: function(value, context) {
                                        return Math.round(value/(sta1+sta2+sta3+sta4)*100) + '%';
                                                }
                                            }
                            },
                        }
                });
            </script>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Average Salary Offered</h4>
                    <div>
                        <canvas id="gauge" width="350" height="225"></canvas>
                    </div>
                    <small>Min: RM{{$min}} </small><small class="float-right">Max: RM{{$max}}</small>
                </div>
                <div class="card-footer border-top" style="background-color: white">
                    <div class="row text-center">
                        <small><i data-feather="clock" class="mr-2"></i>Last updated at @php  echo date('F j, Y', time() ) @endphp
                        </small>
                    </div>
                </div>
            </div>
            <script src="https://unpkg.com/chart.js@2.8.0/dist/Chart.bundle.js"></script>
            <script src="https://unpkg.com/chartjs-gauge@0.3.0/dist/chartjs-gauge.js"></script>
            <script>
                var ctx = document.getElementById("gauge").getContext("2d");
                var avg = @json($avg);
                var chart = new Chart(ctx, {
                type: 'gauge',
                data: {
                    datasets: [{
                    value: avg,
                    minValue: 0,
                    data: [1200, 2000, 2500, 3000],
                    backgroundColor: [
                        'rgba(176, 196, 222, 0.2)',
                        'rgba(135, 206, 250, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(0, 123, 255, 0.2)',   
                    ],
                    borderColor: [
                        'rgba(176, 196, 222, 1)',
                        'rgba(135, 206, 250, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(0, 123, 255, 1)',
                    ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                    display: true,
                    text: 'Common Salary Range'
                    },
                    needle: {
                    radiusPercentage: 2,
                    widthPercentage: 3.2,
                    lengthPercentage: 80,
                    color: 'rgba(0, 0, 0, 1)'
                    },
                    valueLabel: {
                    display: true,
                    formatter: (value) => {
                        return 'RM ' + Math.round(value);
                    },
                    color: 'rgba(255, 255, 255, 1)',
                    backgroundColor: 'rgba(0, 0, 0, 1)',
                    borderRadius: 5,
                    padding: {
                        top: 10,
                        bottom: 10
                    }
                    }
                }
                });
            </script>
        </div>   
    </div>
    <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Featured Job Industries</h4>
                    <small>Top 3 industries (total of 12) with the most vacancies offered</small>
                    <div class="table-responsive">
                        <table class="table no-wrap v-middle mb-0">
                            <thead>
                                <tr class="border-0">
                                    <th class="border-0 font-14 font-weight-medium text-muted">#
                                    </th>
                                    <th class="border-0 font-14 font-weight-medium text-muted">Industry
                                    </th>
                                    <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                        Vacancies
                                    </th>
                                    <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                        Positions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @forelse($industries as $industry)
                                <tr>
                                    <td class="text-muted font-14">
                                        {{$no}}
                                    </td>
                                    <td class="py-2">
                                        <div class="d-flex no-block align-items-center">
                                            <h5 class="text-dark mb-0 font-14 font-weight-medium"><a href="/jobs?industry={{$industry->id}}">{{ Str::limit($industry->name, 25) }}</a></h5>
                                        </div>
                                    </td>
                                    <td class="py-2">
                                        <div class="text-center font-weight-medium">
                                            {{$industry->total_posts}}
                                        </div>
                                    </td>
                                    <td class="py-2">
                                        <div class="text-center font-weight-medium">
                                            {{$industry->positions}}
                                        </div>
                                    </td>
                                    <?php $no++; ?>
                                </tr>
                                @empty
                                <tr>
                                    <td></td>
                                        <td class="text-center pl-3 py-3">
                                            No jobs posted yet.
                                        </td>
                                    <td></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer border-top" style="background-color: white">
                    <div class="row text-center">
                        <small><i data-feather="clock" class="mr-2"></i>Last updated at @php  echo date('F j, Y', time() ) @endphp
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Monthly Jobs Posted</h4>
                    <div>
                        <canvas id="line-chart" width="350" height="130"></canvas>
                    </div>
                </div>
                <div class="card-footer border-top" style="background-color: white">
                    <div class="row text-center">
                        <small><i data-feather="clock" class="mr-2"></i>Last updated at @php  echo date('F j, Y', time() ) @endphp
                        </small>
                    </div>
                </div>
            </div>
            <script>
                window.onload = function() {
                    var month = @json($month);
                    var post = @json($post);
                    var ctx = document.getElementById("line-chart").getContext("2d");
                    window.myBar = new Chart(ctx, {
                        type: 'line',
                        data: {
                            datasets: [{
                                label: '2021',
                                data: post,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 0.2)',

                                // Changes this dataset to become a line
                                type: 'line'
                            }],
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                        },
                        options: {
                            elements: {
                                rectangle: {
                                    borderWidth: 1,
                                    borderSkipped: 'bottom'
                                }
                            },
                            responsive: true,
                            title: {
                                display: true,
                                text: 'Jobs Posted by Months'
                            },
                            legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 20,
                            }
                        },
                        }
                    });
                };
            </script>
    </div>
</div>
@endsection

