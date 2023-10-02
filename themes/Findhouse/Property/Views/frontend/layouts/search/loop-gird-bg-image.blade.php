@php
    $translation = $row->translate();
@endphp
<div class="item">
    <div class="feat_property home3">
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
                        <div class=" thumb_img bg_img_placeholder {{ $img_bg_class ?? ''  }}"
                             style="background-image:url({{$row->image_url}})">
                                <div class="home3_bg_overlay_color">
                                </div>
                        </div>
                    </a>
                @endif
            @else
                <span class="avatar-text-large">{{$row->vendor ? $row->vendor->getDisplayNameAttribute()[0] : ''}}</span>
            @endif
            <div class="property-tag">
                <a>{{$row->property_type == 1 ? __('For Buy') : __('For Rent')}}</a>

                @if($row->is_featured)
                    <a>{{__('Featured')}}</a>
                @endif
            </div>
            @if($row->is_sold)
                <a class="sold_out">{{__("Sold Out")}}</a>
            @endif

            <div class="property-action">
                <a class="service-wishlist @if($row->hasWishList) active @endif" data-id="{{$row->id}}" data-type="property"><i class="fa fa-heart"></i></a>
                <a class="fp_price" href="#">{{$row->prefix_price}} {{ $row->display_price }}</a>
            </div>
        </div>
        <div class="details">
            <div class="tc_content">
                @if($row->Category)
                    <p class="text-thm">{{$row->Category->name}}</p>
                @endif
                <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}">
                    <h4>{{$translation->title}}</h4>
                </a>
                @if(!empty($row->location->name))
                    @php $location =  $row->location->translate() @endphp
                @endif
                <p><span class="flaticon-placeholder"></span> {{$location->name ?? ''}}</p>
                <ul class="prop_details mb0">
                    <li class="list-inline-item">{{__('Beds:')}} {{$row->bed}}</li>
                    <li class="list-inline-item">{{__('Baths:')}} {{$row->bathroom}}</li>
                    <li class="list-inline-item">{{__('Sq:')}} {!! size_unit_format($row->square) !!}</li>
                </ul>
            </div>
            <div class="fp_footer">
                @if(!empty($row->user->id))
                <ul class="fp_meta float-left mb0">
                    <li class="list-inline-item"><a href="{{route('agent.detail', ['id' => $row->user->id])}}">
                    @if($avatar_url = $row->user->getAvatarUrl())
                        <img class="avatar" src="{{$avatar_url}}" alt="{{$row->user->getDisplayName()}}">
                    @else
                        <span class="avatar-text-list">{{ucfirst($row->user->getDisplayName()[0])}}</span>
                    @endif
                    </a></li>
                    <li class="list-inline-item"><a href="{{route('agent.detail', ['id' => $row->user->id])}}">{{$row->user->getDisplayName()}} @include('Property::frontend.layouts.details.verify-badge',['user'=>$row->user])</a></li>
                </ul>
                @endif
                <div class="fp_pdate float-right">{{ display_date($row->updated_at)}}</div>
            </div>
        </div>
    </div>
</div>
