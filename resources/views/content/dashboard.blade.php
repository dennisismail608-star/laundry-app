@extends('index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ Auth::user()->name ?? 'Guest' }} !!</h3>
                        <h6 class="font-weight-normal mb-0"><span class="text-primary">3 unread
                                alerts!</span></h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                    id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 grid-margin transparent">
            <div class="row">
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Total Customers</p>
                            <p class="fs-30 mb-2">{{ $totalCustomers }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Pending Orders</p>
                            <p class="fs-30 mb-2">{{ $pendingOrders }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Completed Orders</p>
                            <p class="fs-30 mb-2">{{ $completedOrders }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Total Revenue</p>
                            <p class="fs-30 mb-2">{{ 'Rp ' . number_format($totalRevenue, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-light-success">
                        <div class="card-body">
                            <p class="mb-4">Total Orders</p>
                            <p class="fs-30 mb-2">{{ $totalOrders }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                    <div class="ml-xl-4 mt-3">
                        <p class="card-title">Detailed Reports</p>
                        <h1 class="text-primary">${{ number_format($totalRevenue, 0) }}</h1>
                        <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                        <p class="mb-2 mb-xl-0">
                            Total revenue, order, customer dan status order per state
                        </p>
                    </div>
                </div>

                <div class="col-md-12 col-xl-9">
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <div class="table-responsive mb-3 mb-md-0 mt-3">
                                <table class="table table-borderless report-table">
                                    @foreach ($reports as $report)
                                        <tr>
                                            <td class="text-muted"></td>
                                            <td class="w-100 px-0">
                                                <div class="progress progress-md mx-4">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: {{ min($report->total_orders / 10, 100) }}%"
                                                        aria-valuenow="{{ $report->total_orders }}" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 class="font-weight-bold mb-0">{{ $report->total_orders }}</h5>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <canvas id="north-america-chart"></canvas>
                            <div id="north-america-legend"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script>
            const ctx = document.getElementById('north-america-chart').getContext('2d');
            const data = {
                labels: @json($reports->pluck('state')),
                datasets: [{
                    label: 'Revenue',
                    data: @json($reports->pluck('total_revenue')),
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ],
                    borderWidth: 1
                }]
            };

            new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom'
                        }
                    }
                }
            });
        </script>
    @endsection
