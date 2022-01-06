@extends("layouts.backend")

@section('title', 'Bilgileriniz')

@section("content")
    <div class="content">
        <div
            class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
            <div>
                <h1 class="h3 mb-1">
                    Ana sayfa
                </h1>

            </div>

        </div>
    </div>
    <div class="content">
        <div class="row items-push">
            <div class="col-sm-6 col-xl-4">
                <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-3 bg-body mx-auto my-3">
                            <i class="fa fa-file-signature  fa-lg text-primary"></i>
                        </div>
                        <div class="fs-1 fw-bold">{{$resultexam}}</div>
                        <div class="text-muted mb-3">Açıklanan Sınavlar</div>

                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-3 bg-body mx-auto my-3">
                            <i class="fa fa-file-prescription  fa-lg text-primary"></i>
                        </div>
                        <div class="fs-1 fw-bold">{{$avg}}</div>
                        <div class="text-muted mb-3">Sınav Ortalamaları</div>

                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="block block-rounded text-center d-flex flex-column h-100 mb-0">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-3 bg-body mx-auto my-3">
                            <i class="fa fa-file-contract  fa-lg text-primary"></i>
                        </div>
                        <div class="fs-1 fw-bold">{{$totalexam}}</div>
                        <div class="text-muted mb-3">Toplam Sınav</div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="content">
        <!-- Store Growth -->
        <div class="col-xl-12">
            <!-- Bars Chart -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Sınav Puanları</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full text-center">
                    <div class="py-3">
                        <!-- Bars Chart Container -->
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- END Bars Chart -->
        </div>
    </div>
@endsection
@section("js_after")
    <script src="{{asset("user/js/plugins/chart.js/chart.min.js")}}"></script>
    <script src="{{asset("user/js/plugins/easy-pie-chart/jquery.easypiechart.min.js")}}"></script>
    <script src="{{asset("user/js/plugins/jquery-sparkline/jquery.sparkline.min.js")}}"></script>
    <script src="{{asset("user/js/plugins/chart.js/chart.min.js")}}"></script>



    <!-- Page JS Code -->


    <!-- Page JS Helpers (Easy Pie Chart + jQuery Sparkline Plugins) -->
    <script>Dashmix.helpersOnLoad(['jq-easy-pie-chart', 'jq-sparkline'])


        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($data as $row)
                        "{{ $row["exam"]["name"] }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Puanlar',
                    data: [
                        @foreach($data as $row)
                        {{ $row["point"] }},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
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
