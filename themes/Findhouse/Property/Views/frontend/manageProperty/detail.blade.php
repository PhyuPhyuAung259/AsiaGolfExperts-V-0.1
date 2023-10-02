<?php $container = 1 ?>
@extends('layouts.user')
@section('content')
    <div class="col-lg-12 mb10">
    </div>
    <div class="mb-3">
        @if($row->id)
            @include('Language::admin.navigation')
        @endif
    </div>
    <form class="" action="{{route('property.vendor.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
        @csrf
            <div class="row">
                <div class="col-sm-9">
                @include('Property::admin.property.content',['hide_gallery'=>true,'property_type'=>1])
                @include('Property::admin.property.location')

                </div>
                <div class="col-sm-3">
                    <div class="panel">
                        <div class="panel-title"><strong>{{__('Settings')}}</strong></div>
                        <div class="panel-body">
                            @if($row->status=='publish')
                                <div>
                                    <label class="cursor-pointer">
                                        <input checked type="radio" name="status" value="publish" disabled> {{__("Publish")}}
                                    </label>
                                </div>
                            @endif
                            @if($row->status=='pending')
                                <div>
                                    <label class="cursor-pointer">
                                        <input checked  type="radio" name="status" value="pending" disabled> {{__("Pending")}}
                                    </label>
                                </div>
                            @endif
                            <div class="my_profile_setting_input text-center">
                                <button type="submit" class="btn btn2 ">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>
                    @if(is_default_lang())
                        <div div class="panel">
                            <div class="panel-title"><strong>{{__("Category")}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="">
                                        <select name="category_id" class="form-control">
                                            <option value="">{{__("-- Please Select --")}}</option>
                                            <?php
                                            $traverse = function ($categories, $prefix = '') use (&$traverse, $row) {
                                                foreach ($categories as $category) {
                                                    $selected = '';
                                                    if ($row->category_id == $category->id)
                                                        $selected = 'selected';
                                                    printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $category->name);
                                                    $traverse($category->children, $prefix . '-');
                                                }
                                            };
                                            $traverse($property_category);
                                            ?>
                                        </select>
                                    </div>
                                </div>`
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title"><strong>{{__("Property type")}}</strong></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div >
                                        <label class="cursor-pointer">
                                            <input type="radio" name="property_type" id="property_type_buy" value="1" @if(old('property_type',($row->property_type ?? 0) ? : 1) == 1) checked @endif>
                                            {{__("For buy") }}
                                        </label>
                                    </div>
                                    <div>
                                        <label class="cursor-pointer">
                                            <input type="radio" name="property_type" id="property_type_rent"  value="2" @if(old('property_type',$row->property_type ?? 0) == 2) checked @endif>
                                            {{__("For rent")}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="panel">
                        <div class="panel-title"><strong>{{__('Sold')}}</strong></div>
                        <div class="panel-body">
                        <div class="form-switch">
                                <div>
                                    <label>
                                        <input type="checkbox" name="is_sold" value="1" @if($row->is_sold) checked @endif> {{__("Sold Out")}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-title"><strong>{{__("Availability")}}</strong></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>{{__('Property Featured')}}</label>
                                <br>
                                <label>
                                    <input type="checkbox" name="is_featured" @if($row->is_featured) checked @endif value="1"> {{__("Enable featured")}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-image">
                        <div class="panel-title"><strong>{{__('Property Image')}}</strong></div>
                        <div class="panel-body">
                            {!! \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id) !!}
                        </div>
                    </div>
                    @include('Property::admin.property.attributes')
                </div>
            </div>



    </form>

@endsection
@section('script.body')
    <script type="text/javascript" src="{{ asset('libs/tinymce/js/tinymce/tinymce.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/condition.js?_ver='.config('app.asset_version')) }}"></script>
    <script type="text/javascript" src="{{url('module/core/js/map-engine.js?_ver='.config('app.asset_version'))}}"></script>
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            new BravoMapEngine('map_content', {
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
        })
    </script>
@endsection
