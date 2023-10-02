@php
    /**
    * @var $row \Modules\Location\Models\Location
    * @var $to_location_detail bool
    * @var $service_type string
    */
    $translation = $row->translate();
    $link_location = false;
@endphp

<a href="{{route('property.search', ['location_id' => $row->id])}}">
    <div class="properti_city bg_img_placeholder property_city_bg_style_3 {{ $layout == "style_2" ? 'home5' : '' }}"
         style="background-image: url('{{$row->getImageUrl()}}')">

        <div class="overlay">
            <div class="details ">
                <div  class="{{ $layout == "style_2" ? 'left' : '' }}">
                    <h4 >{{$translation->name}}</h4>
                </div>
                <p class="desc">
                    @php $count = $row->getDisplayNumberServiceInLocation('property') @endphp
                    <span>{{$count}}</span>
                </p>
            </div>
        </div>
    </div>
</a>
