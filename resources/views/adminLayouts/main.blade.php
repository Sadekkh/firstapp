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
        <div class="col-md-6 col-sm-6 " style="width: 50%;height:50%">
            <div>
                <canvas id="myChart3"
                    style="width: 50% !important; height: 50% !important; display: block; box-sizing: border-box;"></canvas>
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
