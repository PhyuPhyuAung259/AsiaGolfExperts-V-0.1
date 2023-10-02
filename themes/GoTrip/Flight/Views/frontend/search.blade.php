@extends('layouts.app')
@push('css')
    <link href="{{ asset('dist/frontend/module/flight/css/flight.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>

@endpush
@section('content')
    <div class="bravo_search_flight">
        <div class="container">
            <div class=" pt-40 pb-40">
                <div class="text-center">
                    <h1 class="text-30 fw-600">
                        {{setting_item_with_lang("flight_page_search_title")}}
                    </h1>
                </div>

                @include('Flight::frontend.layouts.search.form-search')

            </div>
        </div>
        <div class="layout-pt-md layout-pb-md bg-light-2">
            <div class="container">
                @include('Flight::frontend.layouts.search.list-item')
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{asset('libs/custombox/custombox.min.js')}}"></script>
    <script src="{{asset('libs/custombox/custombox.legacy.min.js')}}"></script>
    <script src="{{ asset('libs/custombox/window.modal.js') }}"></script>

    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset('themes/gotrip/module/flight/js/flight.js?_ver='.config('app.asset_version')) }}"></script>
    <script>
        $(document).ready(function () {
            $.BCoreModal.init('[data-modal-target]');
        })
    </script>
@endpush
