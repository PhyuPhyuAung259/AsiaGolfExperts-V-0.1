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
    <div class="properti_city {{ $layout == "style_2" ? 'home5' : '' }}">
        <div class="thumb"><img class="img-fluid w100" src="{{$row->getImageUrl()}}" alt=""></div>
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
