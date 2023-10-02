@extends('layouts.app')
@section('content')
    <section class="our-agent-single bgc-f7 pb30-991">
        <div class="container">
            @include('Agencies::frontend.detail.search_mobile')
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb_content style2 mt30-767 mb30-767">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url("/") }}">{{ __('Home') }}</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('agencies.search') }}">{{ __('Agencies') }}</a></li>
                                    <li class="breadcrumb-item active text-thm" aria-current="page">{{ $translation->name }}</li>
                                </ol>
                                <h2 class="breadcrumb_title">{{ $translation->name }}</h2>
                            </div>
                            <div class="dn db-991 mt30 mb0">
                                <div id="main2">
                                    <span id="open2" class="flaticon-filter-results-button filter_open_btn style3"> {{ __("Show Filter") }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="feat_property list agency">
                                <div class="thumb">
                                    <img class="img-whp" src="{{ get_file_url($row['image_id'], 'full') }}" alt="2.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item dn"></li>
                                            <li class="list-inline-item"><a href="#">{{ $countListing }} {{ __('Listings') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <h4>{{ $translation->name }}</h4>
                                        <p class="text-thm">{{__('Agency')}}</p>
                                        <ul class="prop_details mb0">
                                            <li><a href="#">{{__('Office')}}: {{ $row['office'] ? $row['office'] : '' }}</a></li>
                                            <li><a href="#">{{__('Mobile')}}: {{ $row['mobile'] ? $row['mobile'] : '' }}</a></li>
                                            <li><a href="#">{{__('Fax')}}: {{ $row['fax'] ? $row['fax'] : '' }}</a></li>
                                            <li><a href="#">{{__('Email')}}: {{ $row['email'] ? $row['email'] : '' }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="fp_footer">
                                        <?php
                                            $social = $row->social;

                                            if(!empty($social)) $social = json_decode($social,true);
                                            if(empty($social) or !is_array($social))
                                                $social = [];
                                        ?>
                                        @if(count($social) > 0)
                                            <ul class="fp_meta float-left mb0">
                                                @foreach($social as $socialItem)
                                                    {{-- {!! $socialItem['code'] !!} --}}
                                                    <li class="list-inline-item"><a href="{{ $socialItem['link'] }}"><i class="{{ $socialItem['code'] }}" target="_blank"></i></a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="shop_single_tab_content style2 mt30">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">{{__('Description')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="listing-tab" data-toggle="tab" href="#listing" role="tab" aria-controls="listing" aria-selected="false">{{__('Listing')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="agent-tab" data-toggle="tab" href="#agent" role="tab" aria-controls="agent" aria-selected="false">{{__('Agents')}}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">{{__("Reviews")}}</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                        <div class="product_single_content">
                                            <div class="mbp_pagination_comments">
                                                <div class="mbp_first media">
                                                    <div class="media-body">
                                                        <p class="mb25">{!! clean($translation->content)  !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade row pl15 pl0-1199 pr15 pr0-1199" id="listing" role="tabpanel" aria-labelledby="listing-tab">
                                        @if ($listings->isNotEmpty())
                                            @foreach($listings as $property)
                                                @php $translation = $property->translate() @endphp
                                                <div class="col-lg-12">
                                                    @include('Property::frontend.layouts.search.loop-list',['row'=>$property,'wrap_class'=>'feat_property list style2 hvr-bxshd bdrrn'])
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="product_single_content">
                                                <div class="mbp_pagination_comments">
                                                    <div class="mbp_first media">
                                                        <div class="media-body">
                                                            <p class="mb25">{{ __('No data') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade row pl15 pl0-1199 pr15 pr0-1199" id="agent" role="tabpanel" aria-labelledby="agent-tab">
                                        @if ($row->agent)
                                            @foreach($row->agent as $itemAgent)
                                            <div class="col-lg-12">
                                                <div class="feat_property list style2 agent hvr-bxshd bdrrn mb10 mt20">
                                                    <div class="thumb">
                                                        <a class="c-inherit" href="{{route('agent.detail',['id'=>$itemAgent->id])}}">
                                                        @if($avatar_url = $itemAgent->getAvatarUrl())
                                                            <img src="{{$avatar_url}}" class="img-whp" alt="{{$itemAgent->getDisplayName()}}">
                                                        @else
                                                            <span class="img-whp" >{{ucfirst($itemAgent->getDisplayName()[0])}}</span>
                                                        @endif
                                                        </a>
                                                        <div class="thmb_cntnt">
                                                            <ul class="tag mb0">
                                                                <li class="list-inline-item dn"></li>
                                                                <li class="list-inline-item"><a href="#">{{ $countListing }} {{ __('Listings') }}</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="details">
                                                        <div class="tc_content">
                                                            <h4>
                                                                <a class="c-inherit" href="{{route('agent.detail',['id'=>$itemAgent->id])}}">
                                                                    {{ $itemAgent->getDisplayName() }}
                                                                    @include('Property::frontend.layouts.details.verify-badge',['user'=>$itemAgent])
                                                                </a>
                                                            </h4>
                                                            <p class="text-thm">{{__('Agent')}}</p>
                                                            <ul class="prop_details mb0">
                                                                @if ($itemAgent['address'])
                                                                <li><a href="">{{ __("Address") }}: {{ $itemAgent['address'] }}</a></li>
                                                                @endif
                                                                @if ($itemAgent['phone'])
                                                                <li><a href="">{{ __("Mobile") }}: {{ $itemAgent['phone'] }}</a></li>
                                                                @endif
                                                                @if ($itemAgent['fax'])
                                                                    <li><a href="">{{ __("Fax") }}: {{ $itemAgent['fax']}}</a></li>
                                                                @endif
                                                                @if($itemAgent['email'])
                                                                    <li><a href="">{{ __("Email") }}: <span>{{$itemAgent['email'] }}</span></a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <div class="fp_footer">
                                                            <?php
                                                                $socialUser = $itemAgent->user_social;

                                                                if(!empty($socialUser)) $socialUser = json_decode($socialUser,true);
                                                                if(empty($socialUser) or !is_array($socialUser))
                                                                    $socialUser = [];
                                                            ?>
                                                            @if(count($socialUser) > 0)
                                                                <ul class="fp_meta float-left mb0">
                                                                    @foreach($socialUser as $socialUserItem)
                                                                        {{-- {!! $socialItem['code'] !!} --}}
                                                                        <li class="list-inline-item"><a href="{{ $socialUserItem['link'] }}"><i class="{{ $socialUserItem['code'] }}" target="_blank"></i></a></li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    @include('Agencies::frontend.detail.review', ['row' => $row, 'review_service_type' => 'agencies'])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="sidebar_listing_grid1 dn-991">
                        @include('Agencies::frontend.agent.layout.contact', ['row' => $row, 'object_model' => 'agencies','vendor_id' => $row->author_id])
                        @include('Property::frontend.sidebar.FeatureProperty')
                        @include('Property::frontend.sidebar.categoryProperty')
                        @include('Property::frontend.sidebar.recentViewdProperty')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <link href="{{ asset('themes/findhouse/libs/magnific/magnific-popup.css') }}" />
    <script src="{{ asset('themes/findhouse/libs/magnific/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.review-picture-lists').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
                }
            });
        });
    </script>
@endpush
