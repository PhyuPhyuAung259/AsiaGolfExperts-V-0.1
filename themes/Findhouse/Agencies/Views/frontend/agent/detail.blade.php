@extends('layouts.app')
@section('content')
    <section class="our-agent-single bgc-f7 pb30-991">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb_content style2 mt30-767 mb30-767">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">{{__('Home')}}</a></li>
                                    <li class="breadcrumb-item active text-thm" aria-current="page">{{ __('Agent Single') }}</li>
                                </ol>
                                <h2 class="breadcrumb_title">{{ $row->getDisplayName() }}</h2>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="feat_property list style2 agent">
                                <div class="thumb">
                                    <img class="img-whp" src="{{ $row->getAvatarUrl() }}">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item dn"></li>
                                            <li class="list-inline-item"><a>{{$row->property->count()}} {{ __(' Listings') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <h4>{{ $row->getDisplayName() }} @include('Property::frontend.layouts.details.verify-badge',['user'=>$row])</h4>
                                        <p class="text-thm">{{ __('Agent') }}</p>
                                        <ul class="prop_details mb0">
                                            <li><a href="#">{{ __('Mobile: ') }} {{ $row->phone }}</a></li>
                                            <li><a href="#">{{ __('Email: ') }} <span class="__cf_email__" data-cfemail="1565747e6079797455737c7b717d7a6066703b767a78">{{ $row->email }}</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="fp_footer">
                                        <?php
                                            $social = $row->user_social;

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
                                        <a href="{{ route('property.search', ['agent_id' => $row->id]) }}">
                                            <div class="fp_pdate float-right text-thm">{{ __('View My Listing') }} <i class="fa fa-angle-right"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="shop_single_tab_content style2 mt30">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">{{ __('Description') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="listing-tab" data-toggle="tab" href="#listing" role="tab" aria-controls="listing" aria-selected="false">{{ __('Listing') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">{{ __('Reviews') }}</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                        @include('Agencies::frontend.agent.layout.description')
                                    </div>
                                    <div class="tab-pane fade row pl15 pl0-1199 pr15 pr0-1199" id="listing" role="tabpanel" aria-labelledby="listing-tab">
                                        @include('Agencies::frontend.agent.layout.userProperty')

                                    </div>
                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                        @include('Agencies::frontend.detail.review', ['row' => $row, 'review_service_type' => 'agent'])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="sidebar_listing_grid1 dn-991">
                        @include('Agencies::frontend.agent.layout.contact', ['row' => $row, 'object_model' => 'agent', 'vendor_id' => $row->id])
                        @include('Property::frontend.sidebar.FeatureProperty')
                        @include('Property::frontend.sidebar.categoryProperty')
                        @include('Property::frontend.sidebar.recentViewdProperty')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
