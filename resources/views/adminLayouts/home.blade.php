@extends('admin.main')
@section('styles')
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('icofont.min.css') }}" />
@endsection
@section('adminContent')
    <style>
        /** --------------------------------
                                                                                                                                                                                             -- Statistics
                                                                                                                                                                                            -------------------------------- */
        .statistics {
            color: #E5E7EB;
        }

        .statistics .box {
            background-color: #313348;
        }

        .statistics .box i {
            width: 60px;
            height: 60px;
            line-height: 60px;
        }

        .statistics .box p {
            color: #9CA3AF;
        }

        @media (max-width: 767px) {
            .statistics .box {
                margin-bottom: 25px !important;
            }
        }

        .statistics h3 {
            color: white;
        }

        section {
            padding: 0;
        }

        .row {
            margin-left: 1vh;
            margin-right: 1vh;
        }
    </style>

    <div class="row g-3 mb-3">
        <div class="col-lg-7 col-xxl-8">
            <form style="display: inline-block" action="">

                <div class="d-inline-block">
                    {{-- <label class="form-label" for="from">{{ __('From') }}</label> --}}
                    <input type="date" id="from" name="from" class="form-control form-select-sm"
                        value="{{ request()->from }}">
                </div>

                <div class="d-inline-block">
                    {{-- <label class="form-label" for="to">{{ __('To') }}</label> --}}
                    <input type="date" id="to" name="to" class="form-control form-select-sm sonoo-search"
                        value="{{ request()->to }}">
                </div>
                <div class="d-inline-block">
                    <select name="country" class="form-control form-select-sm sonoo-search" id="">
                        {{-- @foreach ($country as $c)
                            <option value="{{ $c->country_name }}">{{ $c->country_name }}</option>
                        @endforeach --}}
                    </select>
                </div>


                <button class="btn btn-success" type="submit">إرسال</button>
            </form>
        </div>
    </div>

    <div class="row row-cards-one">

        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg1">
                <div class="left">
                    <h5 class="title">إجمالي <br>الدفعات</h5>
                    <span class="number"></span>
                    <a href="https://product.geniusocean.com/geniuscart/admin/orders?status=processing"
                        class="link">التفاصيل</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-dollar"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg2">
                <div class="left">
                    <h5 class="title">عدد الطلبيات الإجمالي</h5>
                    <span class="number"></span>
                    <a href="https://product.geniusocean.com/geniuscart/admin/orders?status=processing"
                        class="link">التفاصيل</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-truck-alt"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg3">
                <div class="left">
                    <h5 class="title">عدد الطلبات المدفوعة</h5>
                    <span class="number"></span>
                    <a href="https://product.geniusocean.com/geniuscart/admin/orders?status=completed"
                        class="link">التفاصيل</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-check-circled"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg4">
                <div class="left">
                    <h5 class="title"> عدد سلات المستخدمين</h5>
                    <span class="number"></span>
                    <a href="https://product.geniusocean.com/geniuscart/admin/products" class="link">التقاصيل</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-cart-alt"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg4">
                <div class="left">
                    <h5 class="title">عدد <br>المستخدمين</h5>
                    <span class="number"></span>
                    <a href="https://product.geniusocean.com/geniuscart/admin/products" class="link">التفاصيل</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-users-alt-5"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg6">
                <div class="left">
                    <h5 class="title">عدد<br> الزوار</h5>
                    <span class="number"></span>
                    <a href="https://product.geniusocean.com/geniuscart/admin/users" class="link">التقاصيل</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-newspaper"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg2">
                <div class="left">
                    <h5 class="title">عدد <br> المنتجات</h5>
                    <span class="number"></span>
                    <a href="https://product.geniusocean.com/geniuscart/admin/users" class="link">View All</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-newspaper"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
            <div class="mycard bg5">
                <div class="left">
                    <h5 class="title">عدد <br> الإشعارات</h5>
                    <span class="number"></span>
                    <a href="https://product.geniusocean.com/geniuscart/admin/users" class="link">View All</a>
                </div>
                <div class="right d-flex align-self-center">
                    <div class="icon">
                        <i class="icofont-newspaper"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <canvas id="myChart"></canvas>
    </div>
    <div class="row">
        <div class="col"><canvas id="myChart1"></canvas></div>
        <div class="col"><canvas id="myChart2"></canvas></div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var sites = {!! json_encode($visdate) !!};
        var country = {!! json_encode($viscount) !!};
        console.log(country)
        let date = [];
        let val = [];
        let day = [0, 0, 0, 0, 0, 0, 0];
        let count = [];
        let counval = [];
        for (let i = 0; i < country.length; i++) {
            count.push(country[i].country_name);
            counval.push(country[i].coun);
        }
        for (let i = 0; i < sites.length; i++) {
            date.push(sites[i].date)
            const v = new Date(sites[i].date);
            day[v.getDay()] += sites[i].dat

            val.push(sites[i].dat)
        }
        console.log(val, date, day)
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: date,
                datasets: [{
                    label: 'الزيارات في أخر شهر',
                    data: val,
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
        const ctx1 = document.getElementById('myChart1');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت', ],
                datasets: [{
                    label: 'الزيارات حسب أيام الأسبوع',
                    data: day,
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
        const ctx2 = document.getElementById('myChart2');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: count,
                datasets: [{
                    label: 'الزيارات حسب الدول',
                    data: counval,
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
