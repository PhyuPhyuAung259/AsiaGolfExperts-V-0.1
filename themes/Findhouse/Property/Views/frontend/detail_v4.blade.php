@extends('layouts.app')
@section('content')
    <section class="listing-title-area mt-2">
        <div class="container mt50">
            <div class="row mb30">
                <div class="col-lg-7 col-xl-8">
                    <div class="single_property_title mt30-767">
                        <h2>{{ $translation->title ?? '' }}</h2>
                        <p>{{ $translation->address }}</p>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="single_property_social_share">
                        <div class="price float-left fn-400">
                            <h2>{{ $row['display_price'] ? $row['display_price'] : '' }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            @include('Property::frontend.layouts.details.detail_v4.gallery_property')
        </div>
    </section>
    <!-- Agent Single Grid View -->
    <section class="our-agent-single bgc-f7 pt-0 pb30-991">
        <div class="container">
            @include('Agencies::frontend.detail.search_mobile')
            <div class="row">
                <div class="col-md-12 col-lg-8 mt50">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="listing_single_description2 mt30-767 mb30-767">
                                <div class="single_property_title">
                                    <h2>{{ $translation->title ?? '' }}</h2>
                                    <p>{{ $translation->address }}</p>
                                </div>
                                <div class="single_property_social_share style2">
                                    <div class="price">
                                        <h2>{{ $row['display_price'] ? $row['display_price'] : '' }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="listing_single_description style2">
                                <div class="lsd_list">
                                    <ul class="mb0">
                                        @if(!empty($row['Category'])) <li class="list-inline-item"><a href="#">{{  $row['Category']->name}}</a></li> @endif
                                        <li class="list-inline-item"><a href="#">{{ __("Beds") }}: {{ !empty($row['bed']) ? $row['bed'] : ''}}</a></li>
                                        <li class="list-inline-item"><a href="#">{{ __("Baths") }}: {{ !empty($row['bathroom']) ? $row['bathroom'] : '' }}</a></li>
                                        <li class="list-inline-item"><a href="#">{{ __("Sq Ft") }}: {{ !empty($row['square']) ? $row['square'] : ''}}</a></li>
                                    </ul>
                                </div>
                                @if(!empty($row['content']))
                                    <h4 class="mb30">{{ __("Description") }}</h4>
                                    <div class="gpara second_para white_goverlay mt10 mb10">{!! clean(Str::words($translation->content,50)) !!}</div>

                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                            <p class="mt10 mb10">{!! clean($translation->content) !!}</p>
                                        </div>
                                    </div>
                                    <p class="overlay_close">
                                        <a class="text-thm fz14" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            {{__('Show More')}} <span class="flaticon-download-1 fz12"></span>
                                        </a>
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="additional_details">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="mb15">{{ __("Property Details") }}</h4>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <dl class="inline">
                                            <dt><p>{{ __("Property ID") }} :</p></dt>
                                            <dd><p>{{ $row->id ? $row->id : 0 }}</p></dd>
                                            <dt><p>{{ __("Price") }} :</p></dt>
                                            <dd><p>{{ $row->display_price ? $row->display_price : 0 }}</p></dd>
                                            <dt><p>{{ __("Property Size") }} :</p></dt>
                                            <dd><p>{!! !empty($row['square']) ? size_unit_format($row['square']) : 0 !!}</p></dd>
                                            <dt><p>{{ __("Year Built") }} :</p></dt>
                                            <dd><p>{{ $row->year_built ? $row->year_built : __('None') }}</p></dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <dl class="inline">
                                            <dt><p>{{ __("Bedrooms") }} :</p></dt>
                                            <dd><p>{{ $row->bed ? $row->bed : 0 }}</p></dd>
                                            <dt><p>{{ __("Bathrooms") }} :</p></dt>
                                            <dd><p>{{ $row->bathroom ? $row->bathroom : 0 }}</p></dd>
                                            <dt><p>{{ __("Garage") }} :</p></dt>
                                            <dd><p>{{ $row->garages ? $row->garages : 0 }}</p></dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-4">
                                        <dl class="inline">
                                            <dt><p>{{ __("Property Type") }} :</p></dt>
                                            <dd><p>{{ $row->category ? $row->category->name : '' }}</p></dd>
                                            <dt><p>{{ __("Property Status") }} :</p></dt>
                                            <dd><p><span>{{$row->property_type == 1 ? __('For Buy') : __('For Rent')}}</span></p></dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="additional_details">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="mb15">{{__('Additional details')}}</h4>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <dl class="inline">
                                            <dt><p>{{ __("Deposit") }} :</p></dt>
                                            <dd><p>{{ $row->deposit ? $row->deposit : 0 }}</p></dd>
                                            <dt><p>{{ __("Pool Size") }} :</p></dt>
                                            <dd><p><span>{!! $row->pool_size ? size_unit_format($row->pool_size) : 0 !!}</span></p></dd>
                                            <dt><p>{{ __("Additional Rooms") }} :</p></dt>
                                            <dd><p><span>{{ $row->additional_zoom ? $row->additional_zoom : 0 }}</span></p></dd>
                                        </dl>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <dl class="inline">
                                            <dt><p>{{ __("Last remodel year") }} :</p></dt>
                                            <dd><p>{{ $row->remodal_year ? $row->remodal_year : __('None') }}</p></dd>
                                            <dt><p>{{ __("Amenities") }} :</p></dt>
                                            <dd><p><span>{{ $row->amenities ? $row->amenities : 0 }}</span></p></dd>
                                            <dt><p>{{ __("Equipment") }} :</p></dt>
                                            <dd><p><span>{{ $row->equipment ? $row->equipment : 0 }}</span></p></dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('Property::frontend.layouts.details.property_feature')
                        @if(!empty($row->location->name))
                            @php $location =  $row->location->translate() @endphp
                        @endif
                        <div class="col-lg-12">
                            <div class="application_statics mt30">
                                <h4 class="mb30">{{ __("Location") }} <small class="application_statics_location float-right">{{ !empty($location->name) ? $location->name : '' }}</small></h4>
                                <div class="property_video p0">
                                    <div class="thumb">
                                        <div class="h400" id="map-canvas"></div>
                                        <div class="overlay_icon">
                                            <a href="#"><img class="map_img_icon" src="{{asset('findhouse/images/header-logo.png')}}" alt="header-logo.png"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('Property::frontend.layouts.details.property_video')
                        <div class="col-lg-12">
                            @include('Agencies::frontend.detail.review', ['review_service_id' => $row['id'], 'review_service_type' => 'property'])
                        </div>
                        @include('Property::frontend.layouts.details.property-related')
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4 mt50">
                    <div class="sidebar_listing_list">
                        <div class="sidebar_advanced_search_widget">
                            @include('Property::frontend.layouts.details.agent')
                            @include('Property::frontend.layouts.details.contact')
                        </div>
                    </div>
                    @include('Property::frontend.layouts.search.form-search')
                    @include('Property::frontend.sidebar.FeatureProperty')
                    @include('Property::frontend.sidebar.categoryProperty')
                    @include('Property::frontend.sidebar.recentViewdProperty')
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <link href="{{ asset('libs/fotorama/fotorama.css') }}" rel="stylesheet">
    <script src="{{ asset('libs/fotorama/fotorama.js') }}"></script>
    <link href="{{ asset('themes/findhouse/libs/magnific/magnific-popup.css') }}" />
    <script src="{{ asset('themes/findhouse/libs/magnific/jquery.magnific-popup.min.js') }}"></script>
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            new BravoMapEngine('map-canvas', {
                fitBounds: true,
                center: [{{$row->map_lat ?? "51.505"}}, {{$row->map_lng ?? "-0.09"}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    @if($row->map_lat && $row->map_lng)
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {}
                    });
                    @endif
                    engineMap.on('click', function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function (zoom) {
                        $("input[name=map_zoom]").attr("value", zoom);
                    });
                    engineMap.searchBox($('.bravo_searchbox'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                }
            });

            $('.review-picture-lists').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                }
            });
        })
    </script>
@endpush
