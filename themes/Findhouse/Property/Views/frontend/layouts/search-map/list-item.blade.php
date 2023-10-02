<?php
$grid_class = "col-lg-4 col-md-6";
$type = request('type','grid');
switch (12 - ($property_layout_map_size ?? 4)){
    case 4:
    case 5:
        $type = 'list';
        break;
    case 6:
        $grid_class = "col-lg-6 col-md-6";
        break;
}
if($type == 'list'){
    $grid_class = "col-md-12";
}
?>
<div class="bravo-list-item @if(!$rows->count()) not-found @endif">
    @if($rows->count())
        <div class="row">
            <div class="grid_list_search_result ">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-5">
                <div class="left_area tac-xsd">
                    <p>
                        @if($rows->total() > 1)
                            {{ __(":count properties found",['count'=>$rows->total()]) }}
                        @else
                            {{ __(":count property found",['count'=>$rows->total()]) }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-7">
                <div class="half_map_advsrch_navg  text-right tac-xsd">
                    <ul>
                        <li class="list-inline-item"><span class="shrtby">{{__('Sort by')}}:</span>
                            <select onchange="setFieldAndReload('filter',this.value)" name="filter" class="selectpicker property-select-filter show-tick">
                                <option data-url="{{ request()->fullUrlWithQuery(['filter'=>'new']) }}" value="new" @if(Request::input('filter') == 'new') selected @endif>{{__('Newest')}}</option>
                                <option data-url="{{ request()->fullUrlWithQuery(['filter'=>'old']) }}" value="old" @if(Request::input('filter') == 'old') selected @endif>{{__('Oldest')}}</option>
                                <option data-url="{{ request()->fullUrlWithQuery(['filter'=>'price_high']) }}" value="price_high" @if(Request::input('filter') == 'price_high') selected @endif>{{__('Price [high to low]')}}</option>
                                <option data-url="{{ request()->fullUrlWithQuery(['filter'=>'price_low']) }}" value="price_low" @if(Request::input('filter') == 'price_low') selected @endif>{{__('Price [low to high]')}}</option>
                                <option data-url="{{ request()->fullUrlWithQuery(['filter'=>'name_high']) }}" value="name_high" @if(Request::input('filter') == 'name_high') selected @endif>{{__('Name [a->z]')}}</option>
                                <option data-url="{{ request()->fullUrlWithQuery(['filter'=>'name_low']) }}" value="name_low" @if(Request::input('filter') == 'name_low') selected @endif>{{__('Name [z->a]')}}</option>
                            </select>
                        </li>
                        <li class="list-inline-item"><a class="hvr-text-thm @if($type == 'grid') active @endif" onclick="setTypeParam('grid',this)" href="#"><span class="fa fa-th-large"></span></a></li>
                        <li class="list-inline-item"><a class="hvr-text-thm @if($type == 'list') active @endif" onclick="setTypeParam('list',this)" href="#"><span class="fa fa-th-list"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div class="list-item">
            <div class="row">
                @foreach($rows as $row)
                    <div class="{{$grid_class}}">
                        @if($type == 'grid')
                            @include('Property::frontend.layouts.search.loop-gird')
                        @else
                            @include('Property::frontend.layouts.search.loop-list')
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mbp_pagination">
            {{$rows->appends(array_merge(request()->query(),['_ajax'=>1]))->links()}}
        </div>
    @else
        <div class="not-found-box">
            <h3 class="n-title">{{__("We couldn't find any properties.")}}</h3>
            <p class="p-desc">{{__("Try changing your filter criteria")}}</p>
        </div>
    @endif
</div>
