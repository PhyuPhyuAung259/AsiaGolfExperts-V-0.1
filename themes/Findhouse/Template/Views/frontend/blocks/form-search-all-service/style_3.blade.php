<!-- Home Design -->
<section class="home-one home5-overlay home5_bgi5 parallax" data-stellar-background-ratio="1.5"  style="background-image: url('{{$bg_image_url}}');">
		<div class="container">
			<div class="row posr">
				<div class="col-lg-7">
					<div class="home_content home5">
						<div class="home-text home5">
							@if(!empty($title))
							<h2 class="fz55">{{$title}}</h2>
							@endif
								@if(!empty($sub_title))
								<p class="discounts_para fz18 color-white">{{$sub_title}}</p>
								@endif
								@if(!empty($category_ids))
									<h4>{{__('What are you looking for?')}}</h4>
									<ul class="mb0">
										@foreach($category_ids as $category)
										<li class="list-inline-item">
											<div class="icon_home5">
												<div class="icon"><span class="{{$category->icon}}"></span></div>
												<p>{{$category->name}}</p>
											</div>
										</li>
										@endforeach
									</ul>
								@endif
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="home_content home5 style2">
                        @include("Template::frontend.blocks.form-search-all-service.form-search",['class_form'=>"home5"])
					</div>
				</div>
			</div>
		</div>
	</section>