@if(empty($hide_form_search))
    <div class="home_adv_srch_opt mt20 mb20">
        <form method="get" action="{{route('property.search')}}">
            @csrf
            <input type="hidden" name="property_type" id="property_type" value="1">
            <div class="home1-advnc-search {{$class_form??""}}">
                <ul class="h1ads_1st_list mb0">
                    @include('Property::frontend.layouts.search.fields.service_name', ['holder' => __('Enter keyword ...'), 'name' => 'service_name'])
                    @include('Property::frontend.layouts.search.fields.option',['list' => $list_category,'holder' => __('Property Category'), 'name' => 'category_id'])
                    @include('Property::frontend.layouts.search.fields.option',['list' => $list_location, 'holder' => __('Location'), 'name' => 'location_id'])
                
                    <?php
                    $price_min = $pri_from = floor ( App\Currency::convertPrice($property_min_max_price[0]) );
                    $price_max = $pri_to = ceil ( App\Currency::convertPrice($property_min_max_price[1]) );
                    if (!empty($price_range = Request::query('price_range'))) {
                        $pri_from = explode(";", $price_range)[0];
                        $pri_to = explode(";", $price_range)[1];
                    }
                    $currency = App\Currency::getCurrency( App\Currency::getCurrent());
                    ?>
                    @include('Property::frontend.layouts.search.fields.price',['list' => [],'holder' => __('Choose Price'), 'name' => 'price','class_form'=>$class_form??""])
                    <li class="custome_fields_520 list-inline-item">
                        <div class="navbered">
                            <div class="mega-dropdown">
                                <span id="show_advbtn" class="dropbtn">{{__('Advanced')}} <i class="flaticon-more pl10 flr-520"></i></span>
                                <div class="dropdown-content">
                                    @if(!empty($attr_hide))
                                        @foreach($attr_hide as $attr)
                                            <div class="row p15">
                                                <div class="col-lg-12">
                                                    <h4 class="text-thm3">{{$attr->name}}</h4>
                                                </div>
                                                <div class="col-xxs-6 col-sm col-lg col-xl">
                                                    <ul class="ui_kit_checkbox selectable-list">
                                                        @foreach($attr->terms as $term)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input name="terms[]" type="checkbox" class="custom-control-input" value="{{$term->id}}" id="{{$term->slug}}">
                                                                    <label class="custom-control-label" for="{{$term->slug}}">{{$term->name}}</label>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="row p-md-1 pt0-xsd">
                                        <div class="col-lg-11 col-xl-10">
                                            <ul class="apeartment_area_list mb0">
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
                                                @include('Property::frontend.layouts.search.fields.option',['list' => $list_number,'holder' => __('Bathrooms'), 'name' => 'bathroom'])
                                                @include('Property::frontend.layouts.search.fields.option',['list' => $list_number,'holder' => __('Bedrooms'), 'name' => 'bedroom'])
                                                @include('Property::frontend.layouts.search.fields.option',['list' => $list_number,'holder' => __('Garages'), 'name' => 'garage'])
                                                @include('Property::frontend.layouts.search.fields.option',['list' => $list_year,'holder' => __('Year built'), 'name' => 'year_built'])
                                        
                                            </ul>
                                        </div>
                                        <div class="col-lg-1 col-xl-2">
                                            <div class="mega_dropdown_content_closer">
                                                <h5 class="text-thm text-right mt15"><span id="hide_advbtn" class="curp">{{__('Hide')}}</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="search_option_button {{ $class_form ?? "" }}">
                            <button type="submit" class="btn btn-thm">{{__('Search')}}</button>
                        </div>
                    </li>
                </ul>
            </div>
        </form>
    </div>
@endif