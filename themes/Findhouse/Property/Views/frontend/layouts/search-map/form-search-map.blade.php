<div class="row">
    <div class="col-lg-12">
        <form action="{{url( app_get_locale(false,false,'/').config('property.property_route_prefix') )}}" class="bravo_form_search_map home1-advnc-search home2 style2 mt30 mb30 dn-991 pl-0" method="get" onsubmit="return false;">
            <input type="hidden" name="_layout" value="{{request('_layout')}}">
            <input type="hidden" name="page" value="{{request('page',1)}}">
            <input type="hidden" name="filter" value="{{request('filter')}}">
            <input type="hidden" name="type" value="{{request('type')}}">
            <input type="hidden" name="layout_map" value="{{request('layout_map')}}">
            <input type="hidden" name="layout_map_size" value="{{request('layout_map_size')}}">
            <div class="h1ads_1st_list half_style mb0 row align-items-center">
            @php $property_map_search_fields = setting_item_array('property_map_search_fields');

            $property_map_search_fields = array_values(\Illuminate\Support\Arr::sort($property_map_search_fields, function ($value) {
                return $value['position'] ?? 0;
            }));

            @endphp
            @if(!empty($property_map_search_fields))
                @foreach($property_map_search_fields as $field)
                    <div class="custome_fields_half col-md-{{$field['size'] ?? 3}}">
                    @switch($field['field'])
                        @case ('location')
                            @include('Property::frontend.layouts.search-map.fields.location')
                            @break
                        @case ('type')
                            @include('Property::frontend.layouts.search-map.fields.type')
                            @break
                        @case ('keyword')
                            @include('Property::frontend.layouts.search-map.fields.keyword')
                            @break
                        @case ('attr')
                            @include('Property::frontend.layouts.search-map.fields.attr')
                            @break
                        @case ('price')
                            @include('Property::frontend.layouts.search-map.fields.price')
                            @break
                        @case ('advance')

                            <div class="filter-item filter-simple">
                                    <div class="filter-title toggle-advance-filter navbered" style="width: auto" data-target="#advance_filters">
                                        <span id="show_advbtn" class="dropbtn">{{__('Advanced')}} <i class="flaticon-more pl10 flr-520"></i></span>
                                    </div>
                            </div>
                            @break

                    @endswitch
                    </div>
                @endforeach
            @endif
            </div>
        </form>
    </div>
</div>
