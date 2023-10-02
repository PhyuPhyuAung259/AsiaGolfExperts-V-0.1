@php $listviewtype =  request()->input('type','grid') @endphp
<section class="our-listing bgc-f7 pb30-991">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				@include('Property::frontend.layouts.search.filter-search-mobile')
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="dn db-991">
					<div id="main2">
						<span id="open2" class="flaticon-filter-results-button filter_open_btn style3"> {{__('Show Filter')}}</span>
					</div>
				</div>
				<div class="breadcrumb_content style2 mt30-767 mb30-767">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
						<li class="breadcrumb-item active text-thm" aria-current="page">{{__('List Property')}}</li>
					</ol>
					<h2 class="breadcrumb_title">{{__('List Property')}}</h2>
				</div>
			</div>
            <div class="col-lg-6">
                <div class="listing_list_style mb20-xsd tal-991">
                    <ul class="mb0">
                        <li class="list-inline-item {{ $listviewtype == 'grid' ? 'active' : '' }} link_for_grid_view" onclick="javascript:window.location='{{ request()->fullUrlWithQuery(['type'=>'grid']) }}'"><a href="javascript:void(0)" ><span class="fa fa-th-large"></span></a></li>
                        <li class="list-inline-item {{ $listviewtype == 'list' ? 'active' : '' }} link_for_list_view" onclick="javascript:window.location='{{ request()->fullUrlWithQuery(['type'=>'list']) }}'"><a href="javascript:void(0)" ><span class="fa fa-th-list"></span></a></li>
                    </ul>
                </div>

            </div>
		</div>
		<div class="row">

			<div class="col-md-12 col-lg-8">
				<div class="bravo-list-item">
					<div class="row">
						<div class="grid_list_search_result">
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-5">
								<div class="left_area tac-xsd">
									<p>
										@if($rows->total() > 1)
											{{ __(":count properties found",['count'=>$rows->total()]) }}
										@else
											{{ __(":count property found",['count'=>$rows->total()]) }}
										@endif
									</p>
								</div>
							</div>
							<div class="col-sm-12 col-md-8 col-lg-8 col-xl-7">
								<div class="right_area text-right tac-xsd">
									<ul>
										<li class="list-inline-item"><span class="shrtby">{{__('Sort by')}}:</span>
											<select value="{{$filter}}" onchange="changeFilterProperty(this)" name="filter" class="selectpicker property-select-filter show-tick">
												<option data-url="{{ request()->fullUrlWithQuery(['filter'=>'new']) }}" value="new" @if(Request::input('filter') == 'new') selected @endif>{{__('Newest')}}</option>
												<option data-url="{{ request()->fullUrlWithQuery(['filter'=>'old']) }}" value="old" @if(Request::input('filter') == 'old') selected @endif>{{__('Oldest')}}</option>
												<option data-url="{{ request()->fullUrlWithQuery(['filter'=>'price_high']) }}" value="price_high" @if(Request::input('filter') == 'price_high') selected @endif>{{__('Price [high to low]')}}</option>
												<option data-url="{{ request()->fullUrlWithQuery(['filter'=>'price_low']) }}" value="price_low" @if(Request::input('filter') == 'price_low') selected @endif>{{__('Price [low to high]')}}</option>
												<option data-url="{{ request()->fullUrlWithQuery(['filter'=>'name_high']) }}" value="name_high" @if(Request::input('filter') == 'name_high') selected @endif>{{__('Name [a->z]')}}</option>
												<option data-url="{{ request()->fullUrlWithQuery(['filter'=>'name_low']) }}" value="name_low" @if(Request::input('filter') == 'name_low') selected @endif>{{__('Name [z->a]')}}</option>
											</select>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="list-item">
						<div class="row">
							@if($rows->total() > 0)
								@foreach($rows as $row)
                                    @if($listviewtype=='grid')
									<div class="col-lg-6 col-md-6 display_type_grid">
										@include('Property::frontend.layouts.search.loop-gird')
									</div>
                                    @else
                                    <div class="col-lg-12  display_type_list">
										@include('Property::frontend.layouts.search.loop-list')
									</div>
                                    @endif
								@endforeach
							@else
								<div class="col-lg-12">
									<div class="border rounded p-3 bg-white">
										{{__("Property not found")}}
									</div>
								</div>
							@endif
						</div>
					</div>
					<div class="col-lg-12 mt20">
						<div class="mbp_pagination">
							{{$rows->appends(request()->query())->links()}}
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-xl-4">
				@include('Property::frontend.layouts.search.form-search')
				@include('Property::frontend.sidebar.FeatureProperty')
                @include('Property::frontend.sidebar.categoryProperty')
                @include('Property::frontend.sidebar.recentViewdProperty')
			</div>
		</div>
	</div>
</section>
