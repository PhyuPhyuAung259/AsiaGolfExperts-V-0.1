<?php
if(empty($row->user->id)) return;
?>
<div class="sl_creator">
    <h4 class="mb25">{{ __("Listed By") }}</h4>
    <div class="media">
        <a href="{{route('agent.detail',['id'=>$row->user->id])}}" class="c-inherit">
            @if($avatar_url = $row->user->getAvatarUrl())
                <img class="mr-3" src="{{$avatar_url}}" alt="{{$row->user->getDisplayName()}}">
            @else
                <span class="mr-3">{{ucfirst($row->user->getDisplayName()[0])}}</span>
            @endif
        </a>
        <div class="media-body">
            <h5 class="mt-0 mb0">
                <a href="{{route('agent.detail',['id'=>$row->user->id])}}" class="c-inherit">{{ $row->user->getDisplayName() }}
                    @include('Property::frontend.layouts.details.verify-badge',['user'=>$row->user])
                </a>
            </h5>
            <p class="mb0">{{ !empty($row->user->phone) ? $row->user->phone : '' }}</p>
            <p class="mb0">{{ !empty($row->user->email) ? $row->user->email : '' }}</p>
            <a class="text-thm" href="{{route('agent.detail',['id'=>$row->user->id])}}">{{ __("View My Listing") }}</a>
        </div>
    </div>
</div>
