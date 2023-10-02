@if(!empty($list_slider))
	<section class="p0">
		<div class="container-fluid p0">
			<div class="home8-slider vh-100">
				<div id="bs_carousel" class="carousel slide bs_carousel" data-ride="carousel" data-pause="true" data-interval="7000">
					<div class="carousel-inner">
						@foreach($list_slider as $i=> $item)
							@php
								$img = get_file_url($item['bg_image'],'full');
							@endphp
							<div class="carousel-item @if($i==0) active @endif" data-slide="0" data-interval="false">
								<div class="bs_carousel_bg" @if(!empty($img)) style="background-image: url({{$img}});" @endif></div>
								<div class="bs-caption">
									<div class="container">
										<div class="row">
											<div class="col-md-7 col-lg-8">
												@if(!empty($item['title']))
													<div class="main_title">{{$item['title']}}</div>
												@endif
												@if(!empty($item['sub_title']))
													<p class="parag">{{$item['title']}}</p>
												@endif
											</div>
											<div class="col-md-5 col-lg-4">
												@if(!empty($property = $item['row']))
                                                    <?php
                                                    $translation = $property->translate();
                                                    ;?>
													<div class="feat_property home8">
														<div class="details">
															<div class="tc_content w-100">
																<ul class="tag">
																	<li class="list-inline-item"><a href="#">{{$property->property_type == 1 ? __('For Buy') : __('For Rent')}}</a></li>
																	@if($property->is_featured)
																		<li class="list-inline-item"><a href="#">Featured</a></li>
																	@endif
																</ul>
																@if($property->Category)
																	<p class="text-thm">{{$property->Category->name}}</p>
																@endif
																<a @if(!empty($blank)) target="_blank" @endif href="{{$property->getDetailUrl()}}">
																	<h4>{{$translation->title}}</h4>
																</a>
																@if(!empty($property->location->name))
																	@php $location =  $property->location->translate() @endphp
																@endif
																<p><span class="flaticon-placeholder"></span> {{$location->name ?? ''}}</p>
																<ul class="prop_details">
																	<li class="list-inline-item"><a href="#">{{__('Beds:')}} {{$property->bed}}</a></li>
																	<li class="list-inline-item"><a href="#">{{__('Baths:')}} {{$property->bathroom}}</a></li>
																	<li class="list-inline-item"><a href="#">{{__('Sq:')}} {!! size_unit_format($property->square) !!}</a></li>
																</ul>
																<a class="fp_price" href="#">{{$property->prefix_price}} {{ $property->display_price }}</a>
																<ul class="icon">
																	<li class="list-inline-item"><i class="fa fa-heart"></i></li>

																	<li class="list-inline-item">
																		<a class="service-wishlist @if($property->hasWishList) active @endif" data-id="{{$property->id}}" data-type="property"><i class="fa fa-heart"></i></a></li>
																</ul>
															</div>
															<div class="fp_footer">
                                                                @if($property->user->id)
																<ul class="fp_meta float-left">
																	<li class="list-inline-item"><a href="{{route('agent.detail', ['id' => $property->user->id])}}">
																			@if($avatar_url = $property->user->getAvatarUrl())
																				<img class="avatar" src="{{$avatar_url}}" alt="{{$property->user->getDisplayName()}}">
																			@else
																				<span class="avatar-text-list">{{ucfirst($property->user->getDisplayName()[0])}}</span>
																			@endif
																		</a></li>
																	<li class="list-inline-item"><a href="{{route('agent.detail', ['id' => $property->user->id])}}">{{$property->user->getDisplayName()}}
                                                                            @include('Property::frontend.layouts.details.verify-badge',['user'=>$property->user])</a></li>
																</ul>
                                                                @endif
																<div class="fp_pdate float-right">{{ display_date($property->updated_at)}}</div>
															</div>
														</div>
													</div>
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					@if($hide_slider_controls != 1)
						<div class="property-carousel-controls">
							<a class="property-carousel-control-prev" role="button" data-slide="prev">
								<span class="flaticon-left-arrow-1"></span>
							</a>
							<a class="property-carousel-control-next" role="button" data-slide="next">
								<span class="flaticon-right-arrow"></span>
							</a>
						</div>
					@endif
				</div>
				@if($hide_slider_controls != 1)
					<div class="carousel slide bs_carousel_prices" data-ride="carousel" data-pause="false" data-interval="false">
						<div class="carousel-inner"></div>
						<div class="property-carousel-ticker">
							<div class="property-carousel-ticker-counter"></div>
							<div class="property-carousel-ticker-divider">&nbsp;&nbsp;/&nbsp;&nbsp;</div>
							<div class="property-carousel-ticker-total"></div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</section>
@endif
