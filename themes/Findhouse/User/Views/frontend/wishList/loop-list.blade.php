<?php
$service = $row->service;
?>
@if(!empty($service))
    <th scope="row">
        <div class="feat_property list favorite_page style2">
            <div class="thumb">
                @if($service->image_url)
                    <img class="img-whp" src="{{$service->image_url}}" alt="">
                @endif
                <div class="thmb_cntnt">
                    <ul class="tag mb0">
                        <li class="list-inline-item dn"></li>
                        <li class="list-inline-item"><a href="#">{{ $service->property_type == 1 ? 'For Buy' : ($service->property_type == 2 ? 'For Rent' : '') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="details">
                <div class="tc_content">
                    <h4>{{$service->title}}</h4>
                    @if(!empty($service->location->name))
                        <p><span class="flaticon-placeholder"></span> {{$service->location->name ?? ''}}</p>
                    @endif
                    <a class="fp_price text-thm" href="#">{{ $service->display_price_admin }}<small>{{ __('/mo') }}</small></a>
                </div>
            </div>
        </div>
    </th>
    <td>{{ display_datetime($service->updated_at ?? $service->created_at) }}</td>
    <td><span class="status_tag {{ $service->status == 'publish' ? 'badge2' : ($service->status == 'draft' ? 'badge' : '') }}">{{ $service->status }}</span></td>
    <td>{{ $service->view }}</td>
    <td>
        <ul class="view_edit_delete_list mb0">
            @if(Auth::user()->hasPermission('property_update'))
        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{__('View')}}"><a href="{{ route("property.detail",[$service->slug]) }}"><span class="flaticon-view"></span></a></li>
            @endif
            @if(Auth::user()->hasPermission('property_delete'))
        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{__('Remove')}}"><a href="{{route('user.wishList.remove',['id'=>$service->id , 'type' => $service->type]) }}"><span class="flaticon-garbage"></span></a></li>
            @endif
        </ul>
    </td>
@endif
