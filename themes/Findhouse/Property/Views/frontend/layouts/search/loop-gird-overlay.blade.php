@php
    $translation = $row->translate();
@endphp
<div class="item">
    <div class="properti_city home6">
        <div class="thumb">
            @if($row->image_url)
                @if(setting_item('property_thumb_open_gallery') and request()->routeIs('property.search'))
                @php $modalId = 'modal_gallery_'.$row->id @endphp
                <a class="thumb-image" data-toggle="modal" data-target="#{{$modalId}}">
                    <img class="img-whp" src="{{$row->image_url}}" alt="property image">
                </a>
                    @if(!empty($gallery = $row->getGallery()))
                        <div class="property_gallery_modal modal fade" id="{{$modalId}}" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="fullscreen-gallery">
                                            <div class="fotorama"
                                                 data-width="100%"
                                                 data-maxwidth="100%"
                                                 data-fit="cover"
                                                 data-ratio="16/9"
                                                 data-allowfullscreen="true"
                                                 data-nav="thumbs">
                                                @foreach ($gallery as $key => $item)
                                                    <img src="{{ $item['large'] }}">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <a class="thumb-image" @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}">
                    <div class=" thumb_img bg_img_placeholder feature_property_bg_image_overlay"
                         style="background-image:
                        url({{$row->image_url}})">

                    </div>


                    </a>
                @endif
            @else
                <span class="avatar-text-large">{{$row->vendor ? $row->vendor->getDisplayNameAttribute()[0] : ''}}</span>
            @endif
                <div class="thmb_cntnt">
                    <ul class="tag mb0">
                        <li class="list-inline-item"><a href="#">{{$row->property_type == 1 ? __('For Buy') : __('For Rent')}}</a></li>
                        @if($row->is_featured)
                        <li class="list-inline-item"><a href="#">{{__('Featured')}}</a></li>
                        @endif
                        @if($row->is_sold)
                            <li class="list-inline-item"><a class="sold_out">{{__("Sold Out")}}</a></li>
                        @endif
                    </ul>
                </div>



            <div class="property-action">
                <a class="service-wishlist @if($row->hasWishList) active @endif" data-id="{{$row->id}}" data-type="property"><i class="fa fa-heart"></i></a>

            </div>
        </div>
        <div class="overlay">
            <div class="details">

                <a class="fp_price" href="#">{{$row->prefix_price}} {{ $row->display_price }}</a>
                @if(!empty($row->location->name))
                    @php $location =  $row->location->translate() @endphp
                @endif
                <h4>{{$location->name ?? ''}}</h4>
                <ul class="prop_details mb0">

                    <li class="list-inline-item"><a href="#">{{__('Beds:')}} {{$row->bed}}</a></li>
                    <li class="list-inline-item"><a href="#">{{__('Baths:')}} {{$row->bathroom}}</a></li>
                    <li class="list-inline-item"><a href="#">{{__('Sq:')}} {!! size_unit_format($row->square) !!}</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>
