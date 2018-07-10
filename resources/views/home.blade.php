@extends('layouts.web')
@section('css')
<!-- bootstrap-progressbar -->
<link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row top_tiles" style="margin: 10px 0;">
        <div class="col-md-3 col-sm-3 col-xs-6 tile">
            <span>总营业额</span>
            <h2>$ 231,809</h2>
            <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
            </span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 tile">
            <span>总收入</span>
            <h2>$ 231,809</h2>
            <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
            </span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 tile">
            <span>总支出</span>
            <h2>$ 231,809</h2>
            <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
            </span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 tile">
            <span>$ 近一年收入</span>
            <h2>231,809</h2>
            <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
            </span>
        </div>
    </div>
    <br />


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>近一年<small>收支</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="mybarChart1"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>收支 <small>走势图</small></h3>
                    </div>
                    <div class="col-md-6">
                        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>
                    </div>
                </div>
                <div class="x_content">
                    <div class="demo-container" style="height:250px">
                        <div id="chart_plot_03" class="demo-placeholder"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>最新收支 <small>记录</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">

                        <ul class="list-unstyled timeline widget">
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>添加了一笔支出100元</a>
                                        </h2>
                                        <div class="byline">
                                            <span>2018-05-06 12：30：20</span>  <a>管理员</a>
                                        </div>
                                        <p class="excerpt">卖家用电器
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>添加了一笔收入1000元</a>
                                        </h2>
                                        <div class="byline">
                                            <span>2018-05-01 17：50：20</span>  <a>管理员</a>
                                        </div>
                                        <p class="excerpt">当天营业额
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>添加了一笔收入1000元</a>
                                        </h2>
                                        <div class="byline">
                                            <span>2018-05-01 17：50：20</span>  <a>管理员</a>
                                        </div>
                                        <p class="excerpt">当天营业额
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>添加了一笔收入1000元</a>
                                        </h2>
                                        <div class="byline">
                                            <span>2018-05-01 17：50：20</span>  <a>管理员</a>
                                        </div>
                                        <p class="excerpt">当天营业额
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>添加了一笔收入1000元</a>
                                        </h2>
                                        <div class="byline">
                                            <span>2018-05-01 17：50：20</span>  <a>管理员</a>
                                        </div>
                                        <p class="excerpt">当天营业额
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>添加了一笔收入1000元</a>
                                        </h2>
                                        <div class="byline">
                                            <span>2018-05-01 17：50：20</span>  <a>管理员</a>
                                        </div>
                                        <p class="excerpt">当天营业额
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>收入 <small>比例</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="pieChart1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>支出 <small>比例</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="pieChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Chart.js -->
    <script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset('vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- morris.js -->
    <script src="{{ asset('vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendors/morris.js/morris.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('vendors/DateJS/build/date.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            // Bar chart
            if ($('#mybarChart1').length ){

                var ctx = document.getElementById("mybarChart1");
                var mybarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["2018-01", "2018-02", "2018-03", "2018-04", "2018-05", "2018-06", "2018-07", "2018-08", "2018-09", "2018-10", "2018-11", "2018-12"],
                        datasets: [{
                            label: '收入',
                            backgroundColor: "#26B99A",
                            data: [51, 30, 40, 28, 92, 50, 45,48,20,12,72,51]
                        }, {
                            label: '支出',
                            backgroundColor: "#03586A",
                            data: [41, 56, 25, 48, 72, 34, 12,65,23,48,90,52]
                        }]
                    },

                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

            }

            // Pie chart
            if ($('#pieChart1').length ){

                var ctx = document.getElementById("pieChart1");
                var data = {
                    datasets: [{
                        data: [120, 50, 140],
                        backgroundColor: [
                            "#455C73",
                            "#9B59B6",
                            "#BDC3C7"
                        ],
                        label: 'My dataset' // for legend
                    }],
                    labels: [
                        "鞋店",
                        "干洗店",
                        "其他"
                    ]
                };

                var pieChart = new Chart(ctx, {
                    data: data,
                    type: 'pie',
                    otpions: {
                        legend: false
                    }
                });

            }

            // Pie chart
            if ($('#pieChart2').length ){

                var ctx = document.getElementById("pieChart2");
                var data = {
                    datasets: [{
                        data: [200, 600, 120],
                        backgroundColor: [
                            "#455C73",
                            "#9B59B6",
                            "#BDC3C7"
                        ],
                        label: 'My dataset' // for legend
                    }],
                    labels: [
                        "鞋店",
                        "干洗店",
                        "其他"
                    ]
                };

                var pieChart = new Chart(ctx, {
                    data: data,
                    type: 'pie',
                    otpions: {
                        legend: false
                    }
                });

            }
        });
    </script>
@endsection