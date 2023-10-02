<?php $location_name = ""; $location_id = ''; $list_json = [];
$traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json , &$location_name, &$location_id) {
    foreach ($locations as $location) {
        $translate = $location->translate();
        if (Request::query('location_id') == $location->id){
            $location_name = $translate->name;
            $location_id = $location->id;
        }
        $list_json[] = [
            'id' => $location->id,
            'title' => $prefix . ' ' . $translate->name,
        ];
        $traverse($location->children, $prefix . '-');
    }
};
$traverse($list_location ?? $tour_location);
if (empty($inputName)){
    $inputName = 'location_id';
}
?>
<div class="searchMenu-loc js-form-dd js-liverSearch item">
    <span class="clear-loc absolute bottom-0 text-12"><i class="icon-close"></i></span>
    <div data-x-dd-click="searchMenu-loc">
        <h4 class="text-15 fw-500 ls-2 lh-16">{{ $field['title'] }}</h4>
        <div class="text-15 text-light-1 ls-2 lh-16">
            <input type="hidden" name="{{$inputName}}" class="js-search-get-id" value="{{ $location_id ?? '' }}">
            <input autocomplete="off" type="text" placeholder="{{ __('Where are you going?') }}" class="js-search js-dd-focus" value="{{ $location_name ?? '' }}" />
        </div>
    </div>
    <div class="searchMenu-loc__field shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active">
        <div class="bg-white px-30 py-30 sm:px-0 sm:py-15 rounded-4">
            <div class="y-gap-5 js-results">
                @foreach($list_json as $location)
                    <div class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option" data-id="{{ $location['id'] }}">
                        <div class="d-flex align-items-center">
                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                            <div class="ml-10">
                                <div class="text-15 lh-12 fw-500 js-search-option-target">{{ $location['title'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
