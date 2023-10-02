
<li>
    <div class="small_dropdown2 {{$class_form??""}}">
        <div id="prncgs2" class="btn dd_btn property_select_price">
            <span>{{__('Price')}}</span>
            <label ><span class="dropdown-toggle"></span></label>
        </div>
        <div class="dd_content2 property_select_price--slider {{$class_form??""}}">
            <div class="pricing_acontent">
                <div class="clearfix">
                    <input type="text" name="price_range[0]" class="amount" placeholder="0">
                    <input type="text" name="price_range[1]" class="amount2" placeholder="{{$property_min_max_price[1]}}">
                </div>
                <input type="hidden" id="max_value" value="{{$property_min_max_price[1]}}" >
                {{-- <input type="text"  name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" /> --}}
                <div class="slider-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                    {{-- <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 2.79875%; width: 57.8438%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 2.79875%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 60.6425%;"></span> --}}
                </div>
            </div>
        </div>
    </div>
</li>
