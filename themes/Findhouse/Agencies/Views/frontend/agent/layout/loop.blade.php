<div class="row">
    <div class="grid_list_search_result style2">
        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
            <div class="left_area">
                <p>{{$count}} {{__('Search results')}}</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
            <div class="right_area style2 text-right">
                <form>
                    <ul>
                        <li class="list-inline-item"><span class="shrtby">{{__('Sort by')}}:</span>
                            <select onchange="this.form.submit()" name="filter" class="selectpicker show-tick">
                                <option @if($order == 'a-z') selected @endif value="a-z">{{__('Name ( a -> z )')}}</option>
                                <option @if($order == 'z-a') selected @endif value="z-a">{{__('Name ( z -> a )')}}</option>
                            </select>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @foreach ($rows as $row)
    <div class="col-md-6 col-lg-6">
        <div class="feat_property home7 agent">
            <div class="thumb">
                @if($avatar_url = $row->getAvatarUrl())
                    <img class="img-whp" src="{{$avatar_url}}" alt="{{$row->getDisplayName()}}">
                @else
                    <span class="avatar-text-large">{{ucfirst($row->getDisplayName()[0])}}</span>
                @endif
                <div class="thmb_cntnt">
                    <ul class="tag mb0">
                        <li class="list-inline-item dn"></li>
                        <li class="list-inline-item"><a href="#">{{$row->property->count()}} {{__('Listings')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="details">
                <div class="tc_content">
                    <h4>
                        <a href="{{route('agent.detail', ['id' => $row->id])}}">{{$row->getDisplayName()}}
                            @include('Property::frontend.layouts.details.verify-badge',['user'=>$row])
                        </a>
                    </h4>
                    <p class="text-thm">{{('Agent')}}</p>
                    <ul class="prop_details mb0">
                        <li><a href="#">{{('Mobile')}}: {{$row->phone}}</a></li>
                        <li><a href="#">{{('Email')}}: {{$row->email}}</a></li>
                    </ul>
                </div>
                <div class="fp_footer">
                    <ul class="fp_meta float-left mb0">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                    </ul>
                    <div class="fp_pdate float-right text-thm"><a href="{{route('agent.detail', ['id' => $row->id])}}">{{__('View My Listing')}} <i class="fa fa-angle-right"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-lg-12 mt20">
        <div class="mbp_pagination">
            {{$rows->links()}}
        </div>
    </div>
</div>
