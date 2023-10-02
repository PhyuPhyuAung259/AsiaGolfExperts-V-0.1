@extends('layouts.app')
@section('content')
<div class="wrapper">
    <div class="preloader"></div>
    <!-- Listing Grid View -->
    <section class="our-listing bgc-f7 pb30-991">
        <div class="container">
            @include('Agencies::frontend.detail.search_mobile')
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb_content style2 mb0-991">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __("Home") }}</a></li>
                            <li class="breadcrumb-item active text-thm" aria-current="page">{{ __("All Agents") }}</li>
                        </ol>
                        <h2 class="breadcrumb_title">{{ __("Our Agencies") }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="sidebar_listing_grid1 dn-991">
                        @include('Property::frontend.sidebar.FeatureProperty')
                        @include('Property::frontend.sidebar.categoryProperty')
                        @include('Property::frontend.sidebar.recentViewdProperty')
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="grid_list_search_result style2">
                            <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                                <div class="left_area">
                                    <p>{{$agencies_count}} {{__('Search results')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if ($agencies->isNotEmpty())
                            @foreach($agencies as $item)
                                <div class="col-md-6 col-lg-6">
                                    @include('Agencies::frontend.detail.list-item-agency')
                                </div>
                            @endforeach
                        @endif
                        <div class="col-lg-12 mt20">
                            <div class="mbp_pagination">
                                {{$agencies->appends(request()->query())->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
