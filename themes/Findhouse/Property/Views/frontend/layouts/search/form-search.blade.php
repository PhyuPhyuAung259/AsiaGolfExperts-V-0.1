<div class="sidebar_listing_list dn-991">
    <div class="sidebar_advanced_search_widget">
        <ul class="sasw_list mb0">
            <form action="{{ route("property.search") }}" class="form bravo_form" method="get">
                <input type="hidden" name="filter" value="{{request()->query('filter')}}">
                <input type="hidden" name="layout" value="{{request()->query('layout')}}">
                <input type="hidden" name="type" value="{{request()->query('type')}}">

                @php $property_search_fields = setting_item_array('property_search_fields');
                $property_search_fields = array_values(\Illuminate\Support\Arr::sort($property_search_fields, function ($value) {
                    return $value['position'] ?? 0;
                }));
                $list_number = [
                    (object)['id' => 1,'name' => '1'],
                    (object)['id' => 2,'name' => '2'],
                    (object)['id' => 3,'name' => '3'],
                    (object)['id' => 4,'name' => '4'],
                    (object)['id' => 5,'name' => '5'],
                    (object)['id' => 6,'name' => '6'],
                    (object)['id' => 7,'name' => '7'],
                    (object)['id' => 8,'name' => '8']
                ];
                $list_garages_value = [
                    (object)['id' => 1,'name' => 'Yes'],
                    (object)['id' => 2,'name' => 'No'],
                    (object)['id' => 3,'name' => 'Others']
                ];
                $current_year = (int)date("Y");
                $list_year = [];
                for($year = $current_year;$year >= ($current_year - 8);$year--) {
                    $list_year[] = (object)['id' => $year,'name' => $year];
                }

                @endphp
                @if(!empty($property_search_fields))
                    @foreach($property_search_fields as $field)
                        @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp

                    @switch($field['field'])
                            @case ('service_name')
                                @include('Property::frontend.layouts.search.fields.service_name', ['holder' => $field['title'], 'name' => 'service_name'])
                            @break
                            @case ('location')
                                @include('Property::frontend.layouts.search.fields.option',['list' => $list_location, 'holder' => $field['title'], 'name' => 'location_id'])
                            @break
                            @case ('category')
                                @include('Property::frontend.layouts.search.fields.option',['list' => $list_category,'holder' => $field['title'], 'name' => 'category_id'])
                            @break
                            @case ('property_type')
                                @include('Property::frontend.layouts.search.fields.option',['list' => [(object)['id' => 1,'name' => 'For Buy'],(object)['id' => 2,'name' => 'For Rent']],'holder' => $field['title'], 'name' => 'property_type'])
                            @break
                            @case ('bathrooms')
                                @include('Property::frontend.layouts.search.fields.option',['list' => $list_number,'holder' => $field['title'], 'name' => 'bathroom'])
                            @break
                            @case ('bedrooms')
                                @include('Property::frontend.layouts.search.fields.option',['list' => $list_number,'holder' => $field['title'], 'name' => 'bedroom'])
                            @break
                            @case ('garages')
                                @include('Property::frontend.layouts.search.fields.option',['list' => $list_number,'holder' => $field['title'], 'name' => 'garage'])
                            @break
                            @case ('year_built')
                                @include('Property::frontend.layouts.search.fields.option',['list' => $list_year,'holder' => $field['title'], 'name' => 'year_built'])
                            @break
                            @case ('price')
                                @include('Property::frontend.layouts.search.fields.price',['list' => $list_year,'holder' => $field['title'], 'name' => 'price'])
                            @break
                            @case (null)
                            @break
                            @default
                                @include('Property::frontend.layouts.search.fields.attribute',['key' => $field['field'],'holder' => $field['title']])
                            @break
                        @endswitch
                    @endforeach
                @endif
                <li>
                    <div class="search_option_button">
                        <button type="submit" class="btn btn-block btn-thm">{{__('Search')}}</button>
                    </div>
                </li>
            </form>
        </ul>
    </div>
</div>
