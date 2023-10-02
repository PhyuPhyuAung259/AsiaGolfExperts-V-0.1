@extends('layouts.user')
@section('head')
@endsection
@section('content')
    <div class="mt30">
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="ff_one">
                <div class="icon"><span class="flaticon-home"></span></div>
                <div class="detais">
                <div class="timer">{{$count_property}}</div>
                    <p>{{__('All Properties')}}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="ff_one style2">
                <div class="icon"><span class="flaticon-view"></span></div>
                <div class="detais">
                    <div class="timer">{{$count_view}}</div>
                    <p>{{__('Total Views')}}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="ff_one style3">
                <div class="icon"><span class="flaticon-chat"></span></div>
                <div class="detais">
                <div class="timer">{{$count_review}}</div>
                    <p>{{__('Total Visitor Reviews')}}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="ff_one style4">
                <div class="icon"><span class="flaticon-heart"></span></div>
                <div class="detais">
                <div class="timer">{{$count_wish}}</div>
                    <p>{{__('Total Favorites')}}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-7">
            <div class="application_statics">
                <div class="d-flex justify-content-between">
                    <h4>{{ __("Property views") }}</h4>
                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                </div>
                <div class="c_container">
                    <canvas id="earning_chart"></canvas>
                    <script>
                        var views_data = {!! json_encode($views_data) !!};
                    </script>
                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="recent_job_activity">
                <h4 class="title">{{ __("Recent Activities") }}</h4>
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
                        <div class="grid notify-item">
                            <ul class="d-flex">
                                <li class="list-inline-item ">
                                    @if($avatar)
                                        <img class="image-responsive rounded-circle" src="{{$avatar}}" alt="{{$name}}">
                                    @else
                                        <span class="avatar-text rounded-circle">{{ucfirst($name[0])}}</span>
                                    @endif
                                </li>
                                <li class="list-inline-item">
                                    <p><a class="{{$class}} p-0" data-id="{{$idNotification}}" href="{{$link}}">{!! $title !!}</a></p>
                                    <div class="notification-meta">
                                        <small class="timestamp">{{format_interval($oneNotification->created_at)}}</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                @else
                    <li class="notification">{{__("You don't have any notifications")}}</li>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset("libs/chart_js/Chart.min.js") }}"></script>
    <script src="{{ asset('libs/daterange/moment.min.js')}}"></script>
    <script src="{{ asset('libs/daterange/daterangepicker.min.js')}}"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            console.log(11);
            var ctx = document.getElementById('earning_chart').getContext('2d');
            window.myMixedChartForVendor = new Chart(ctx, {
                type: 'bar',//line - bar
                data: views_data,
                options: {
                    min:0,
                    responsive: true,
                    legend: {
                        display: true
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
                                labelString: '{{__("Views")}}'
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
            $(".bravo-user-chart form select").change(function () {
                $(this).closest("form").submit();
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
                $.ajax({
                    url: '{{url('user/reloadChart')}}',
                    data: {
                        chart: 'view',
                        from: picker.startDate.format('YYYY-MM-DD'),
                        to: picker.endDate.format('YYYY-MM-DD'),
                    },
                    dataType: 'json',
                    type: 'post',
                    success: function (res) {
                        if (res.status) {
                            window.myMixedChartForVendor.data = res.data;
                            window.myMixedChartForVendor.update();
                        }
                    }
                })
            });
            cb(start, end);
        });
    </script>
@endpush
