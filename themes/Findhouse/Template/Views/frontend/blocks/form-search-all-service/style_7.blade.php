<div class="home8-slider vh-100">
@if(!empty($list_slider))
    <div id="bs_carousel" class="carousel slide bs_carousel" data-ride="carousel" data-pause="false" data-interval="7000">
        <div class="carousel-inner">
        @foreach($list_slider as $key => $item)
            @php $img = get_file_url($item['bg_image'],'full') @endphp
            <div class="carousel-item {{ ($key == 0) ? "active" : "" }}" data-slide="{{ $key }}" data-interval="false">
                <div class="bs_carousel_bg" style="background-image: url({{$img}});"></div>
                <div class="bs-caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-lg-8">
                                <div class="main_title"> {!! $title ?? "" !!}</div>
                                <p class="parag">{{$sub_title ?? ""}}</p>
                            </div>
                            <div class="col-md-5 col-lg-4">
                                @if(!empty($property_id))
                                <div class="feat_property home8">
                                    @foreach($property_id as $key => $item)
                                    @php
                                        $translation = $item->translate();
                                    @endphp
                                        <div class="details">
                                            <div class="tc_content">
                                                <ul class="tag">
                                                    <li class="list-inline-item"><a>{{$item->property_type == 1 ? __('For Buy') : __('For Rent')}}</a></li>
                                                    @if($item->is_featured)
                                                        <li class="list-inline-item"><a href="#"><a>{{__('Featured')}}</a></a></li>
                                                    @endif
                                                </ul>
                                                @if($item->Category)
                                                    <p class="text-thm">{{$item->Category->name}}</p>
                                                @endif
                                                <a @if(!empty($blank)) target="_blank" @endif href="{{$item->getDetailUrl()}}">
                                                    <h4>{{$translation->title}}</h4>
                                                </a>
                                                @if(!empty($item->location->name))
                                                    @php $location =  $item->location->translate() @endphp
                                                @endif
                                                <p><span class="flaticon-placeholder"></span> {{$location->name ?? ''}}</p>

                                                <ul class="prop_details">
                                                    <li class="list-inline-item"><a href="#">{{__('Beds:')}} {{$item->bed}}</a></li>
                                                    <li class="list-inline-item"><a href="#">{{__('Baths:')}} {{$item->bathroom}}</a></li>
                                                    <li class="list-inline-item"><a href="#">{{__('Sq:')}} {!! size_unit_format($item->square) !!}</a></li>
                                                </ul>
                                                <a class="fp_price" href="#">{{$item->prefix_price}} {{ $item->display_price }}<small>/mo</small></a>
                                                <ul class="icon">
                                                    <li class="list-inline-item"><a class="service-wishlist @if($item->hasWishList) active @endif" data-id="{{$item->id}}" data-type="property"><span class="flaticon-heart"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="fp_footer">
                                                <ul class="fp_meta float-left mb0">
                                                    <li class="list-inline-item"><a href="{{route('agent.detail', ['id' => $item->user->id])}}">
                                                    @if($avatar_url = $item->user->getAvatarUrl())
                                                        <img class="avatar" src="{{$avatar_url}}" alt="{{$item->user->getDisplayName()}}">
                                                    @else
                                                        <span class="avatar-text-list">{{ucfirst($item->user->getDisplayName()[0])}}</span>
                                                    @endif
                                                    </a></li>
                                                    <li class="list-inline-item"><a href="{{route('agent.detail', ['id' => $item->user->id])}}">{{$item->user->getDisplayName()}}</a></li>
                                                </ul>
                                                <div class="fp_pdate float-right">{{ display_date($item->updated_at)}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="property-carousel-controls">
            <a class="property-carousel-control-prev" role="button" data-slide="prev">
                <span class="flaticon-left-arrow-1"></span>
            </a>
            <a class="property-carousel-control-next" role="button" data-slide="next">
                <span class="flaticon-right-arrow"></span>
            </a>
        </div>
    </div>

    <div class="carousel slide bs_carousel_prices" data-ride="carousel" data-pause="false" data-interval="false">
        <div class="carousel-inner"></div>
        <div class="property-carousel-ticker">
            <div class="property-carousel-ticker-counter"></div>
            <div class="property-carousel-ticker-divider">&nbsp;&nbsp;/&nbsp;&nbsp;</div>
            <div class="property-carousel-ticker-total"></div>
        </div>
    </div>
    @endif
</div>
