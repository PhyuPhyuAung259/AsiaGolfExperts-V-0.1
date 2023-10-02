<div class="filter-item ">
    <div class="form-group mb-0">
        <div class="form-content">
            <?php
            $location_name = "";
            $list_json = [
                'id'=>'',
                'title'=>__("All Location")
            ];
            $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json , &$location_name) {
                foreach ($locations as $location) {
                    $translate = $location->translate();
                    if (request()->query('location_id') == $location->id){
                        $location_name = $translate->name;
                    }
                    $list_json[] = [
                        'id' => $location->id,
                        'title' => $prefix . ' ' . $translate->name,
                    ];
                    $traverse($location->children, $prefix . '-');
                }
            };
            $traverse($list_location);
            ?>
            <div class="smart-search normal-control">
                <input type="text" class="smart-search-location parent_text form-control" {{ ( empty(setting_item("property_location_search_style")) or setting_item("property_location_search_style") == "normal" ) ? "readonly" : ""  }} placeholder="{{__("Location")}}" value="{{ $location_name }}" data-onLoad="{{__("Loading...")}}"
                       data-default="{{ json_encode($list_json) }}">
                <input type="hidden" class="child_id" name="location_id" value="{{Request::query('location_id')}}">
            </div>
        </div>
    </div>
</div>
