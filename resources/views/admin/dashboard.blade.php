<x-admin>
    <x-slot name="title">Dashboard</x-slot>
    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-primary-subtle">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome Back !</h5>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ asset('admin/images/profile-img.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('admin/images/users/no-profile.png') }}"
                                    alt="" class="img-thumbnail rounded-circle"  style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ Auth::user()->name }}</h5>
                            <p class="text-muted mb-0 text-truncate">{{ Auth::user()->role }}</p>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">


                                <div class=" text-end">
                                    <h5 class="font-size-15">{{ $authorOrderTotalPrice }} Taka</h5>
                                    <p class="text-muted mb-0">Sold</p>
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('edit.profile') }}"
                                        class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i
                                            class="mdi mdi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Monthly Report ({{ now()->format('F') }})</h4>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <th class="fs-5">
                                            Earning :
                                        </th>
                                        <td class="fs-5">
                                            {{ $totalEarningCurrentMonth }} Taka
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="fs-5">
                                            Due :
                                        </th>
                                        <td class="fs-5">
                                            {{ $totalDueCurrentMonth }} Taka
                                        </td>
                                    </tr>
    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Total Orders</p>
                                    <h4 class="mb-0">{{ $ordersCount }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Total Earning</p>
                                    <h4 class="mb-0">{{ $totalEarning }} Taka</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center ">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-money font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Total Due</p>
                                    <h4 class="mb-0">{{ $totalDue }} Taka</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex flex-wrap">
                        <h4 class="card-title mb-4">Order Created</h4>
                        <div class="ms-auto">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Monthly</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div id="stacked-column-chart" class="apex-charts" data-colors='["--bs-success"]' dir="ltr">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Order Table</h4>
                <p class="card-title-desc">This table is for Admin & Agent Only</p>
                <x-orders.list :orders="$authorOrder" />


            </div>
            <div class="mx-auto">
                {{ $authorOrder->onEachSide(5)->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            var linechartBasicColors = getChartColorsArray("stacked-column-chart");
            linechartBasicColors &&
                ((options = {
                        chart: {
                            height: 360,
                            type: "bar",
                            stacked: !0,
                            toolbar: {
                                show: !1
                            },
                            zoom: {
                                enabled: !0
                            },
                        },
                        plotOptions: {
                            bar: {
                                horizontal: !1,
                                columnWidth: "15%",
                                endingShape: "rounded",
                                borderRadius: 5,
                            },
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        series: [{
                            name: "Orders",
                            data: @json($monthlyOrderCounts), 
                        }, ],
                        xaxis: {
                            categories: [
                                "Jan",
                                "Feb",
                                "Mar",
                                "Apr",
                                "May",
                                "Jun",
                                "Jul",
                                "Aug",
                                "Sep",
                                "Oct",
                                "Nov",
                                "Dec",
                            ],
                        },
                        colors: linechartBasicColors,
                        legend: {
                            position: "bottom"
                        },
                        fill: {
                            opacity: 1
                        },
                    }),
                    (chart = new ApexCharts(
                        document.querySelector("#stacked-column-chart"),
                        options
                    )).render());
            var options,
                chart,
                radialbarColors = getChartColorsArray("radialBar-chart");
            radialbarColors &&
                ((options = {
                        chart: {
                            height: 200,
                            type: "radialBar",
                            offsetY: -10
                        },
                        plotOptions: {
                            radialBar: {
                                startAngle: -135,
                                endAngle: 135,
                                dataLabels: {
                                    name: {
                                        fontSize: "13px",
                                        color: void 0,
                                        offsetY: 60
                                    },
                                    value: {
                                        offsetY: 22,
                                        fontSize: "16px",
                                        color: void 0,
                                        formatter: function(e) {
                                            return e + "%";
                                        },
                                    },
                                },
                            },
                        },
                        colors: radialbarColors,
                        fill: {
                            type: "gradient",
                            gradient: {
                                shade: "dark",
                                shadeIntensity: 0.15,
                                inverseColors: !1,
                                opacityFrom: 1,
                                opacityTo: 1,
                                stops: [0, 50, 65, 91],
                            },
                        },
                        stroke: {
                            dashArray: 4
                        },
                        series: [67],
                        labels: ["Series A"],
                    }),
                    (chart = new ApexCharts(
                        document.querySelector("#radialBar-chart"),
                        options
                    )).render());
        </script>
    @endpush
</x-admin>
