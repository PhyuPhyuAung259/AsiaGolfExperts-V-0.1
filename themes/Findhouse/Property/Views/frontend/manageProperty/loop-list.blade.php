
    <th scope="row">
        <div class="feat_property list favorite_page style2 bg-transparent">
            <div class="thumb">
                @if($row->image_url)
                    <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}">
                        <img class="img-whp" src="{{$row->image_url}}" alt="{{$row->title}}">
                    </a>
                @endif
                <div class="thmb_cntnt">
                    <ul class="tag mb0">
                        <li class="list-inline-item dn"></li>
                        <li class="list-inline-item"><a href="#">{{ $row->property_type == 1 ? __('For Buy') : ($row->property_type == 2 ? __('For Rent') : '') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="details">
                <div class="tc_content">
                    <h4><a href="{{$row->getDetailUrl()}}" target="_blank">{{$row->title}}</a></h4>
                    @if(!empty($row->location->name))
                        <p><span class="flaticon-placeholder"></span> {{$row->location->name ?? ''}}</p>
                    @endif
                    <a class="fp_price text-thm" href="#">{{ $row->display_price_admin }}<small>{{ __('/mo') }}</small></a>
                </div>
            </div>
        </div>
    </th>
    <td>{{ display_datetime($row->updated_at ?? $row->created_at) }}</td>
    <td>
        <span class="status_tag {{ $row->status == 'publish' ? 'badge2' : 'badge' }}">
            {{ $row->status }}
        </span>
    </td>
    <td>{{ $row->view }}</td>
    <td>
        <ul class="view_edit_delete_list mb0">
            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{__('Preview')}}"><a href="{{$row->getDetailUrl()}}"><span class="fa fa-eye"></span></a></li>
            @if(Auth::user()->hasPermission('property_update'))
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><a href="{{ route("property.vendor.edit",[$row->id]) }}"><span class="flaticon-edit"></span></a></li>
            @endif
            @if(Auth::user()->hasPermission('property_delete'))
                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><a href="{{ route("property.vendor.delete",[$row->id]) }}"><span class="flaticon-garbage"></span></a></li>
            @endif
        </ul>
    </td>
