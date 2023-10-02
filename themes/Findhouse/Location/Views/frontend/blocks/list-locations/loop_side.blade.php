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

    <div class="{{ $class_form ?? "" }}">
        <div class="thumb-container">
            <div class="thumb citi_side_con bg_img_placeholder" style="background-image:url({{$row->getImageUrl()}});"></div>
        </div>
        <div class="details">
            <h4>{{$translation->name}}</h4>
            @php $count = $row->getDisplayNumberServiceInLocation('property') @endphp
            <p>{{$count}}</p>
        </div>
    </div>
</a>

