@extends('admin.main')
@section('styles')
@endsection
@section('adminContent')
    <div class="row" style="display: inline-block;">

        <div class=" top_tiles" style="margin: 10px 0;">

            <div class="col-md-3 col-sm-3  tile">
                <span>{{ __('Total_income') }}</span>
                <h2>{{ $totalmoney }} KWD</h2>

            </div>
            <div class="col-md-3 col-sm-3  tile">
                <span>{{ __('total_order') }}</span>
                <h2>{{ count($order) }}</h2>

            </div>
            <div class="col-md-3 col-sm-3  tile">
                <span>{{ __('live_visitors') }}</span>
                <h2>{{ count($onlineusers) }}</h2>

            </div>
            <div class="col-md-3 col-sm-3  tile">
                <span>Total Sessions</span>
                <h2>231,809</h2>

            </div>
        </div>
    </div>
    <br />


    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div>
                <canvas id="myChart1"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div>
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div>
                <canvas id="myChart3"></canvas>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4 col-sm-6 ">
            <div class="x_panel fixed_height_320">
                <div class="x_title">
                    <h2>App Devices <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h4>App Versions</h4>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>1.5.2</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 66%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>123k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>1.5.3</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 45%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>53k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>1.5.4</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 25%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>23k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>1.5.5</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 5%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>3k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>0.1.5.6</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>1k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 ">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Daily users <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="" style="width:100%">
                        <tr>
                            <th style="width:37%;">
                                <p>Top 5</p>
                            </th>
                            <th>
                                <div class="col-lg-7 col-md-7 col-sm-7 ">
                                    <p class="">Device</p>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 ">
                                    <p class="">Progress</p>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <canvas class="canvasDoughnut" height="140" width="140"
                                    style="margin: 15px 10px 10px 0"></canvas>
                            </td>
                            <td>
                                <table class="tile_info">
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square blue"></i>IOS </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square green"></i>Android </p>
                                        </td>
                                        <td>10%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square purple"></i>Blackberry </p>
                                        </td>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square aero"></i>Symbian </p>
                                        </td>
                                        <td>15%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square red"></i>Others </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 ">
            <div class="x_panel fixed_height_320">
                <div class="x_title">
                    <h2>Profile Settings <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <ul class="quick-list">
                            <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a></li>
                            <li><i class="fa fa-thumbs-up"></i><a href="#">Favorites</a></li>
                            <li><i class="fa fa-calendar-o"></i><a href="#">Activities</a></li>
                            <li><i class="fa fa-cog"></i><a href="#">Settings</a></li>
                            <li><i class="fa fa-area-chart"></i><a href="#">Logout</a></li>
                        </ul>

                        <div class="sidebar-widget">
                            <h4>Profile Completion</h4>
                            <canvas width="150" height="80" id="chart_gauge_01" class=""
                                style="width: 160px; height: 100px;"></canvas>
                            <div class="goal-wrapper">
                                <span id="gauge-text" class="gauge-value gauge-chart pull-left">0</span>
                                <span class="gauge-value pull-left">%</span>
                                <span id="goal-text" class="goal-value pull-right">100%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6  widget_tally_box">
            <div class="x_panel">
                <div class="x_title">
                    <h2>User Uptake</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div id="graph_bar" style="width:100%; height:200px;"></div>

                    <div class=" bg-white progress_summary">

                        <div class="row">
                            <div class="progress_title">
                                <span class="left">Escudor Wireless 1.0</span>
                                <span class="right">This sis</span>
                                <div class="clearfix"></div>
                            </div>

                            <div class="">
                                <span>SSD</span>
                            </div>
                            <div class="">
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="89">
                                    </div>
                                </div>
                            </div>
                            <div class=" more_info">
                                <span>89%</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="progress_title">
                                <span class="left">Mobile Access</span>
                                <span class="right">Smart Phone</span>
                                <div class="clearfix"></div>
                            </div>

                            <div class="">
                                <span>App</span>
                            </div>
                            <div class="">
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="79">
                                    </div>
                                </div>
                            </div>
                            <div class=" more_info">
                                <span>79%</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="progress_title">
                                <span class="left">WAN access users</span>
                                <span class="right">Total 69%</span>
                                <div class="clearfix"></div>
                            </div>

                            <div class="">
                                <span>Usr</span>
                            </div>
                            <div class="">
                                <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="69">
                                    </div>
                                </div>
                            </div>
                            <div class=" more_info">
                                <span>69%</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- start of weather widget -->
        <div class="col-md-4 col-sm-6 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Today's Weather <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="temperature"><b>Monday</b>, 07:30 AM
                                <span>F</span>
                                <span><b>C</b>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="weather-icon">
                                <span>
                                    <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                                </span>

                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="weather-text">
                                <h2>Texas
                                    <br><i>Partly Cloudy Day</i>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="weather-text pull-right">
                            <h3 class="degrees">23</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="row weather-days">
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Mon</h2>
                                <h3 class="degrees">25</h3>
                                <span>
                                    <canvas id="clear-day" width="32" height="32">
                                    </canvas>

                                </span>
                                <h5>15
                                    <i>km/h</i>
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Tue</h2>
                                <h3 class="degrees">25</h3>
                                <canvas height="32" width="32" id="rain"></canvas>
                                <h5>12
                                    <i>km/h</i>
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Wed</h2>
                                <h3 class="degrees">27</h3>
                                <canvas height="32" width="32" id="snow"></canvas>
                                <h5>14
                                    <i>km/h</i>
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Thu</h2>
                                <h3 class="degrees">28</h3>
                                <canvas height="32" width="32" id="sleet"></canvas>
                                <h5>15
                                    <i>km/h</i>
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Fri</h2>
                                <h3 class="degrees">28</h3>
                                <canvas height="32" width="32" id="wind"></canvas>
                                <h5>11
                                    <i>km/h</i>
                                </h5>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="daily-weather">
                                <h2 class="day">Sat</h2>
                                <h3 class="degrees">26</h3>
                                <canvas height="32" width="32" id="cloudy"></canvas>
                                <h5>10
                                    <i>km/h</i>
                                </h5>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end of weather widget -->

        <div class="col-md-4 col-sm-6 ">
            <div class="x_panel fixed_height_320">
                <div class="x_title">
                    <h2>Incomes <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <ul class="quick-list">
                            <li><i class="fa fa-bars"></i><a href="#">Subscription</a></li>
                            <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                            <li><i class="fa fa-support"></i><a href="#">Help Desk</a> </li>
                            <li><i class="fa fa-heart"></i><a href="#">Donations</a> </li>
                        </ul>

                        <div class="sidebar-widget">
                            <h4>Goal</h4>
                            <canvas width="150" height="80" id="chart_gauge_02" class=""
                                style="width: 160px; height: 100px;"></canvas>
                            <div class="goal-wrapper">
                                <span class="gauge-value pull-left">$</span>
                                <span id="gauge-text2" class="gauge-value pull-left">3,200</span>
                                <span id="goal-text2" class="goal-value pull-right">$5,000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var vis = {!! json_encode($visitors) !!};
        var orders = {!! json_encode($orderbyday) !!};
        var productview = {!! json_encode($mostproductviews) !!};
        var orderbytype = {!! json_encode($orderbytype) !!};

        let visit = [
            [],
            []
        ];
        for (let i = 0; i < vis.length; i++) {
            visit[0].push(vis[i].date);
            visit[1].push(vis[i].count);

        }
        let orde = [
            [],
            []
        ];
        for (let i = 0; i < orders.length; i++) {
            orde[0].push(orders[i].date);
            orde[1].push(orders[i].total);

        }
        let prod = [
            [],
            []
        ];
        for (let i = 0; i < productview.length; i++) {
            prod[0].push(productview[i].name_en);
            prod[1].push(productview[i].count);

        }
        let oredrpertype = [
            [],
            []
        ];
        for (let i = 0; i < orderbytype.length; i++) {

            if (orderbytype[i].status == 0) {
                oredrpertype[0].push('pending');
            } else if (orderbytype[i].status == 1) {
                oredrpertype[0].push('confirmed');
            } else if (orderbytype[i].status == 2) {
                oredrpertype[0].push('on delivery');
            } else if (orderbytype[i].status == 3) {
                oredrpertype[0].push('delivered');
            } else if (orderbytype[i].status == 4) {
                oredrpertype[0].push('canceled');
            }
            oredrpertype[1].push(orderbytype[i].total);

        }


        console.log(orderbytype)
        const ctx4 = document.getElementById('myChart3');

        new Chart(ctx4, {
            type: 'doughnut',
            data: {
                labels: oredrpertype[0],
                datasets: [{
                    label: 'most visited products',
                    data: oredrpertype[1],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: visit[0],
                datasets: [{
                    label: 'visitors per day',
                    data: visit[1],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        const ctx2 = document.getElementById('myChart1');

        new Chart(ctx2, {
            type: 'line',
            data: {
                labels: orde[0],
                datasets: [{
                    label: 'orders per day',
                    data: orde[1],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        const ctx3 = document.getElementById('myChart2');

        new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: prod[0],
                datasets: [{
                    label: 'most visited products',
                    data: prod[1],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
@endsection
