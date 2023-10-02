<div class="bravo_filter sidebar">
    @if($layout == 'grid_2')
        <div class="g-filter-item sidebar__item -no-border bravo-form-search">
            <div class="px-20 py-20 bg-light-2 rounded-4">
                <h5 class="text-18 fw-500 mb-10">{{setting_item_with_lang("hotel_page_search_title")}}</h5>
                @include('Hotel::frontend.layouts.search.form-search')
            </div>
        </div>
    @endif
    <form action="{{ route('hotel.search') }}" class="bravo_form_filter lg:d-none" data-x="filterPopup" data-x-toggle="-is-active">
        @if( !empty(Request::query('location_id')) )
            <input type="hidden" name="location_id" value="{{Request::query('location_id')}}">
        @endif
        @if( !empty(Request::query('map_place')) )
            <input type="hidden" name="map_place" value="{{Request::query('map_place')}}">
        @endif
        @if( !empty(Request::query('map_lat')) )
            <input type="hidden" name="map_lat" value="{{Request::query('map_lat')}}">
        @endif
        @if( !empty(Request::query('map_lgn')) )
            <input type="hidden" name="map_lgn" value="{{Request::query('map_lgn')}}">
        @endif
        @if( !empty(Request::query('start')) and !empty(Request::query('end')) )
            <input type="hidden" value="{{Request::query('start',date("d/m/Y",strtotime("today")))}}" name="start">
            <input type="hidden" value="{{Request::query('end',date("d/m/Y",strtotime("+1 day")))}}" name="end">
            <input type="hidden" name="date" value="{{Request::query('date')}}">
        @endif
        <aside class="sidebar y-gap-40 p-4 p-lg-0">
            <div data-x-click="filterPopup" class="-icon-close is_mobile pb-0">
                <i class="icon-close"></i>
            </div>
            <div class="g-filter-item sidebar__item -no-border">
                    <div class="flex-center ratio ratio-15:9 js-lazy" data-bg="{{ get_file_url(setting_item('hotel_map_image'),'full') }}">
                        <a href="{{ route('hotel.search',['_layout'=>'map']) }}" class="button py-15 px-24 -blue-1 bg-white text-dark-1 absolute w-auto h-auto" style="left: initial; top: initial">
                            <i class="icon-destination text-22 mr-10"></i>
                            {{ __('Show on map') }}
                        </a>
                    </div>
                </div>
                <div class="sidebar__item pb-30">
                    <h5 class="text-18 fw-500 mb-10">{{__('Price')}}</h5>
                    <div class="row x-gap-10 y-gap-30">
                        <div class="col-12">
                            <div class="js-price-searchPage">
                                <div class="text-14 fw-500"></div>
                                <?php
                                $price_min = $pri_from = floor ( App\Currency::convertPrice($hotel_min_max_price[0]) );
                                $price_max = $pri_to = ceil ( App\Currency::convertPrice($hotel_min_max_price[1]) );
                                if (!empty($price_range = Request::query('price_range'))) {
                                    $pri_from = explode(";", $price_range)[0];
                                    $pri_to = explode(";", $price_range)[1];
                                }
                                $currency = App\Currency::getCurrency( App\Currency::getCurrent() );
                                ?>
                                <input type="hidden" class="filter-price irs-hidden-input" name="price_range"
                                       data-symbol=" {{$currency['symbol'] ?? ''}}"
                                       data-min="{{$price_min}}"
                                       data-max="{{$price_max}}"
                                       data-from="{{$pri_from}}"
                                       data-to="{{$pri_to}}"
                                       readonly="" value="{{$price_range}}">
                                <div class="d-flex justify-between mb-20">
                                    <div class="text-15 text-dark-1">
                                        <span class="js-lower"></span>
                                        -
                                        <span class="js-upper"></span>
                                    </div>
                                </div>
                                <div class="px-5">
                                    <div class="js-slider"></div>
                                </div>
                                <button type="submit" class="flex-center bg-blue-1 rounded-4 px-3 py-1 mt-3 text-12 fw-600 text-white btn-apply-price-range mt-20">{{__("APPLY")}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="g-filter-item sidebar__item">
                <div class="item-title">
                    <h5 class="text-18 fw-500 mb-10">{{__("Hotel Star")}}</h5>
                </div>
                <div class="item-content sidebar-checkbox">
                    @for ($number = 5 ;$number >= 1 ; $number--)
                        <div class="row y-gap-10 items-center justify-between">
                            <div class="col-auto">
                                <div class="d-flex items-center">
                                    <div class="form-checkbox ">
                                        <input type="checkbox" name="star_rate[]" @if(  in_array($number , request()->query('star_rate',[])) )  checked @endif value="{{$number}}">
                                        <div class="form-checkbox__mark">
                                            <div class="form-checkbox__icon icon-check"></div>
                                        </div>
                                    </div>

                                    <div class="text-15 ml-10">
                                        @for ($review_score = 1 ;$review_score <= $number ; $review_score++)
                                            <i class="fa fa-star" style="color: #fa5636"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="g-filter-item sidebar__item">
                <div class="item-title">
                    <h5 class="text-18 fw-500 mb-10">{{__("Review Score")}}</h5>
                </div>
                <div class="item-content sidebar-checkbox">
                    @for ($number = 5 ;$number >= 1 ; $number--)
                        <div class="row y-gap-10 items-center justify-between">
                            <div class="col-auto">
                                <div class="d-flex items-center">
                                    <div class="form-checkbox ">
                                        <input type="checkbox" name="review_score[]" @if(  in_array($number , request()->query('review_score',[])) )  checked @endif value="{{$number}}">
                                        <div class="form-checkbox__mark">
                                            <div class="form-checkbox__icon icon-check"></div>
                                        </div>
                                    </div>

                                    <div class="text-15 ml-10">
                                        @for ($review_score = 1 ;$review_score <= $number ; $review_score++)
                                            <i class="fa fa-star text-yellow-1"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            @php
                $selected = (array) Request::query('terms');
            @endphp
            @foreach ($attributes as $item)
                @if(empty($item['hide_in_filter_search']))
                    @php
                        $translate = $item->translate();
                    @endphp
                    <div class="g-filter-item sidebar__item">
                        <div class="item-title">
                            <h5 class="text-18 fw-500 mb-10"> {{$translate->name}} </h5>
                        </div>
                        <div class="item-content sidebar-checkbox">
                            @foreach($item->terms as $key => $term)
                                @php $translate = $term->translate(); @endphp
                                <div class="row y-gap-10 items-center justify-between @if($key > 2 and empty($selected)) hide @endif">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input @if(in_array($term->id,$selected)) checked @endif type="checkbox" name="terms[]" value="{{$term->id}}">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">{!! $translate->name !!}</div>
                                    </div>
                                </div>
                            @endforeach
                            @if(count($item->terms) > 3 and empty($selected))
                                <button type="button" class="btn btn-link btn-more-item">{{__("More")}} <i class="fa fa-caret-down"></i></button>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </aside>
    </form>
</div>


