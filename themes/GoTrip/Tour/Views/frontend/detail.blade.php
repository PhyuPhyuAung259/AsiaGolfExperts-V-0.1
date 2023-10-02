@extends('layouts.app')
@push('css')
    <link href="{{ asset('themes/gotrip/dist/frontend/module/tour/css/tour.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
@endpush
@section('content')
    <div class="bravo_detail_tour bravo_detail">
        @include('Layout::parts.bc')
        <div class="bravo_content">
            @php $review_score = $row->review_data @endphp
            @include('Tour::frontend.layouts.details.tour-detail')
            <section>
                <div class="container">
                    @include('Layout::common.detail.review')
                </div>
            </section>

            <div class="container">
                <div class="mt-50 border-top-light"></div>
            </div>

            @include('Tour::frontend.layouts.details.tour-related')

        </div>
    </div>
@endsection

@push('js')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            @if($row->map_lat && $row->map_lng)
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{$row->map_lat}}, {{$row->map_lng}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {
                            iconUrl:"{{get_file_url(setting_item("tour_icon_marker_map"),'full') ?? url('images/icons/png/pin.png') }}"
                        }
                    });
                }
            });
            @endif
        })
    </script>
    <script>
        var bravo_booking_data = {!! json_encode($booking_data) !!}
        var bravo_booking_i18n = {
                no_date_select:'{{__('Please select Start and End date')}}',
                no_guest_select:'{{__('Please select at least one guest')}}',
                load_dates_url:'{{route('tour.vendor.availability.loadDates')}}',
                name_required:'{{ __("Name is Required") }}',
                email_required:'{{ __("Email is Required") }}',
            };
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>

    <script type="text/javascript" src="{{ asset('module/tour/js/single-tour.js?_ver='.config('app.asset_version')) }}"></script>
    <script type="text/javascript" src="{{ asset('themes/gotrip/module/tour/js/single-tour.js?_ver='.config('app.asset_version')) }}"></script>
@endpush
