@extends('layouts.app')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
@endpush
@section('content')
    <div class="bravo_detail_boat bravo_detail">
        @include('Layout::parts.bc')
        @include('Boat::frontend.layouts.details.title-and-share')

        <section class="pt-40">
            <div class="container js-pin-container">
                <div class="row y-gap-30">
                    <div class="col-lg-8">
                        @include('Boat::frontend.layouts.details.detail')
                    </div>
                    <div class="col-lg-4">
                        @include('Boat::frontend.layouts.details.form-book')
                    </div>
                </div>
            </div>
        </section>

        <div class="container mt-40 mb-40">
            <div class="border-top-light"></div>
        </div>

        @if(($row->map_lat && $row->map_lng) || $translation->faqs )
            @if($row->map_lat && $row->map_lng)
                <section class="mt-40">
                    @include('Layout::map.detail.map')
                </section>
            @endif
            <div class="mt-40"></div>

            @if($translation->faqs)
                <section>
                    <div class="container">
                        @include('Layout::common.detail.faq2',['faqs'=>$translation->faqs])
                    </div>
                </section>
            @endif

            <div class="container mt-40 mb-40">
                <div class="border-top-light"></div>
            </div>
        @endif

        <section class="pt-40">
            <div class="container">
                @include('Layout::common.detail.review')
            </div>
        </section>

        <div class="layout-pt-lg"></div>

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
                            iconUrl:"{{get_file_url(setting_item("boat_icon_marker_map"),'full') ?? url('images/icons/png/pin.png') }}"
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
			no_date_select:'{{__('Please select start date')}}',
            no_guest_select:'{{__('Please select at least one number')}}',
            load_dates_url:'{{route('boat.vendor.availability.loadDates')}}',
            availability_booking_url:'{{route('boat.vendor.availability.availabilityBooking')}}',
            name_required:'{{ __("Name is Required") }}',
            email_required:'{{ __("Email is Required") }}',
        };
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/boat/js/single-boat.js?_ver='.config('app.asset_version')) }}"></script>
@endpush
