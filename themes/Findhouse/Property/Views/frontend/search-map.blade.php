@extends('layouts.app',['container_class'=>'container-fluid','header_right_menu'=>true])
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset("themes/findhouse/dist/frontend/module/property/css/map.css?_v".config('app.asset_version')) }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <style type="text/css">
        .bravo_topbar, .bravo_footer {
            display: none
        }
    </style>
@endpush
@section('content')
    <section class="bravo_search_tour bravo_search_property our-listing bgc-f7 pt0 pb0">
        <div class="container-fluid bravo_search_map">
            <div class="row">
                @if(!empty($property_layout_map_option) and $property_layout_map_option == 'map_left')
                <div class="col-xl-{{$property_layout_map_size}}">
                    <div class="results_map h-full">
                        <div class="map-loading d-none">
                            <div class="st-loader"></div>
                        </div>
                        <div id="bravo_results_map" class="h-full results_map_inner map-canvas skin2 half_style" style="height: 100%"></div>
                    </div>
                </div>
                @endif
                <div class="col-xl-{{12 - $property_layout_map_size}}">
                    <div class="half_map_area_content">
                        <div class="position-relative">
                            @include('Property::frontend.layouts.search-map.form-search-map')
                            @include('Property::frontend.layouts.search-map.advance-filter')
                        </div>
                        @include('Property::frontend.layouts.search-map.list-item')
                    </div>
                </div>
                @if(!empty($property_layout_map_option) and $property_layout_map_option == 'map_right')
                    <div class="col-xl-{{$property_layout_map_size}}">
                        <div class="results_map h-full">
                            <div class="map-loading d-none">
                                <div class="st-loader"></div>
                            </div>
                            <div id="bravo_results_map" class="h-full results_map_inner map-canvas skin2 half_style" style="height: 100%"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@push('js')
    {!! \App\Helpers\MapEngine::scripts() !!}
    <link href="{{ asset('libs/fotorama/fotorama.css') }}" rel="stylesheet">
    <script src="{{ asset('libs/fotorama/fotorama.js') }}"></script>
    <script>
        var bc_current_url = '{{url('/property')}}';
        var bravo_map_data = {
            markers:{!! json_encode($markers) !!},
            map_lat_default:{{setting_item('property_map_lat_default','0')}},
            map_lng_default:{{setting_item('property_map_lng_default','0')}},
            map_zoom_default:{{setting_item('property_map_zoom_default','6')}},
        };
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset('themes/findhouse/module/property/js/property-map.js?_ver='.config('app.asset_version')) }}"></script>
@endpush
