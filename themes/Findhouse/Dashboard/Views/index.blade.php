@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="dashboard-page">
            <h4 class="welcome-title text-uppercase">{{__('Welcome :name!',['name'=>Auth::user()->nameOrEmail])}}</h4>
        </div>
        <br>
        <div class="row">
            @if(!empty($top_cards))
                @foreach($top_cards as $card)
                    <div class="col-sm-{{$card['size']}} col-md-{{$card['size_md']}}">
                        <div class="dashboard-report-card card {{$card['class']}}">
                            <div class="card-content">
                                <span class="card-title">{{$card['title']}}</span>
                                <span class="card-amount">{{$card['amount']}}</span>
                                <span class="card-desc">{{$card['desc']}}</span>
                            </div>
                            <div class="card-media">
                                <i class="{{$card['icon']}}"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="row">

            <div class="col-md-12 col-lg-6 mb-3">
                <div class="panel">
                    <div class="panel-title d-flex justify-content-between align-items-center">
                        <strong>{{__('Earning statistics')}}</strong>
                        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span></span> <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <canvas id="earning_chart"></canvas>
                        <script>
                            var earning_chart_data = {!! json_encode($earning_chart_data) !!};
                        </script>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 ">
                <div class="panel">
                    <div class="panel-title d-flex justify-content-between">
                        <strong>{{__('Recent Activities')}}</strong>
                    </div>
                    <div class="panel-body">

                        <ul class="notification-list pl-0">
                            @php $rows = $notifications[0]; @endphp
                            @if(count($rows)> 0)
                                @foreach($rows as $oneNotification)
                                    @php
                                        $active = $class = '';
                                        $data = json_decode($oneNotification['data']);

                                        $idNotification = @$data->id;
                                        $forAdmin = @$data->for_admin;
                                        $usingData = @$data->notification;

                                        $services = @$usingData->type;
                                        $idServices = @$usingData->id;
                                        $title = @$usingData->message;
                                        $name = @$usingData->name;
                                        $avatar = @$usingData->avatar;
                                        $link = @$usingData->link;

                                        if(empty($oneNotification->read_at)){
                                            $class = 'markAsRead';
                                            $active = 'active';
                                        }
                                    @endphp
                                    <li class="notification {{$active}}">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="media-object">
                                                    @if($avatar)
                                                        <img class="image-responsive" src="{{$avatar}}" alt="{{$name}}">
                                                    @else
                                                        <span class="avatar-text">{{ucfirst($name[0])}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <a class="{{$class}} p-0" data-id="{{$idNotification}}" href="{{$link}}">{!! $title !!}</a>
                                                <div class="notification-meta">
                                                    <small class="timestamp">{{format_interval($oneNotification->created_at)}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <li class="notification">{{__("You don't have any notifications")}}</li>
                            @endif
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{url('libs/chart_js/Chart.min.js')}}"></script>
    <script src="{{url('libs/daterange/moment.min.js')}}"></script>
    <script>
        var ctx = document.getElementById('earning_chart').getContext('2d');
        window.myMixedChart = new Chart(ctx, {
            type: 'bar',
            data: earning_chart_data,
            options: {
                responsive: true,
                tooltips: {
                    mode: 'index',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        stacked: true,
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '{{__("Timeline")}}'
                        }
                    }],
                    yAxes: [{
                        stacked: true,
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '{{__("Currency: :currency_main",['currency_main'=>setting_item('currency_main')])}}'
                        },
                        ticks: {
                            beginAtZero: true,
                        }
                    }]
                },
                tooltips: {
                    callbacks: {
                        label: function (tooltipItem, data) {
                            var label = data.datasets[tooltipItem.datasetIndex].label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += tooltipItem.yLabel + " ({{setting_item('currency_main')}})";
                            return label;
                        }
                    }
                }
            }
        });

        var start = moment().startOf('week');
        var end = moment();
        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            "alwaysShowCalendars": true,
            "opens": "left",
            "showDropdowns": true,
            ranges: {
                '{{__("Today")}}': [moment(), moment()],
                '{{__("Yesterday")}}': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '{{__("Last 7 Days")}}': [moment().subtract(6, 'days'), moment()],
                '{{__("Last 30 Days")}}': [moment().subtract(29, 'days'), moment()],
                '{{__("This Month")}}': [moment().startOf('month'), moment().endOf('month')],
                '{{__("Last Month")}}': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                '{{__("This Year")}}': [moment().startOf('year'), moment().endOf('year')],
                '{{__('This Week')}}': [moment().startOf('week'), end]
            }
        }, cb).on('apply.daterangepicker', function (ev, picker) {
            // Reload Earning JS
            $.ajax({
                url: '{{route('admin.statistic.reloadChart')}}',
                data: {
                    chart: 'earning',
                    from: picker.startDate.format('YYYY-MM-DD'),
                    to: picker.endDate.format('YYYY-MM-DD'),
                },
                dataType: 'json',
                type: 'post',
                success: function (res) {
                    if (res.status) {
                        window.myMixedChart.data = res.data;
                        window.myMixedChart.update();
                    }
                }
            })
        });
        cb(start, end);
    </script>
@endpush
