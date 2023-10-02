@extends('layouts.app')
@section('content')
<section class="our-listing bgc-f7 pb30-991">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="listing_sidebar dn db-991">
                    <div class="sidebar_content_details style3">
                        <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
                        <div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
                            <div class="sidebar_advanced_search_widget">
                                <h4 class="mb25">{{__('Advanced Search')}} <a class="filter_closed_btn float-right"><small>{{__('Hide Filter')}}</small> <span class="flaticon-close"></span></a></h4>
                                <ul class="sasw_list style2 mb0">
                                    @include('Property::frontend.layouts.search.fields.option',['list' => $list_category, 'holder' => 'Category', 'name' => 'category_id'])
                                    @include('Property::frontend.layouts.search.fields.option',['list' => $list_location, 'holder' => 'Location', 'name' => 'location_id'])
                                    <li>
                                        <div class="search_option_button">
                                            <button type="submit" class="btn btn-block btn-thm">{{__('Search')}}</button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="breadcrumb_content style2 mb0-991">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active text-thm" aria-current="page">{{__('All Agent')}}</li>
                    </ol>
                    <h2 class="breadcrumb_title">{{__('All Agents')}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="sidebar_listing_grid1 dn-991">
                    <div class="sidebar_listing_list">
                        <div class="sidebar_advanced_search_widget">
                            <h4 class="mb25">{{__('Find Agent')}}</h4>
                            <form>
                            <ul class="sasw_list mb0">
                                <li class="search_area">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control"  placeholder="{{__('Enter Agent Name')}}">
                                    </div>
                                </li>
                                @include('Property::frontend.layouts.search.fields.option',['list' => $list_category, 'holder' => 'Category', 'name' => 'category_id'])
                                @include('Property::frontend.layouts.search.fields.option',['list' => $list_location, 'holder' => 'Location', 'name' => 'location_id'])
                                <li>
                                    <div class="search_option_button">
                                        <button type="submit" class="btn btn-block btn-thm">{{__('Search')}}</button>
                                    </div>
                                </li>
                            </ul>
                            </form>
                        </div>
                    </div>
                    @include('Property::frontend.sidebar.FeatureProperty')
                    @include('Property::frontend.sidebar.categoryProperty')
                    @include('Property::frontend.sidebar.recentViewdProperty')
                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                @include('Agencies::frontend.agent.layout.loop')
            </div>
        </div>
    </div>
</section>
@endsection
