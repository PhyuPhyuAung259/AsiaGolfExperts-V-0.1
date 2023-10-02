@php
	$attr_request = explode("|", $key);
    if(isset($attr_request[1])) {
		$attr_id = $attr_request[1];
		$attr = \Modules\Core\Models\Attributes::where('service', 'property')->with(['terms'])->find($attr_id);
	}
@endphp
@if(isset($attr))
	<li>
		<div id="accordion" class="panel-group">
			<div class="panel">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="#panelBodyRating{{$attr_id}}" class="accordion-toggle link" data-toggle="collapse" data-parent="#accordion"><i class="flaticon-more"></i> {{isset($attr)?$attr->name : ""}}</a>
					</h4>
				</div>
				<div id="panelBodyRating{{$attr_id}}" class="panel-collapse collapse">
					<div class="panel-body row">
						@if(isset($attr))
							<div class="col-lg-12">
								<ul class="ui_kit_checkbox selectable-list float-left fn-400">
									@foreach($attr->terms as $term)
									<li>
										<label class="custom-control custom-checkbox">
											<input type="checkbox" name="terms[]" value="{{$term->id}}" 
												class="custom-control-input" id="customCheck{{$term->id}}"
												@if(!empty(Request::input('terms')))
													@foreach(Request::input('terms') as $t)
														@if($t == $term->id)
															checked
														@endif
													@endforeach
												@endif
											>
											<span class="custom-control-label" for="customCheck{{$term->id}}">{{$term->name}}</span>
										</label>
									</li>
									@endforeach
								</ul>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</li>
@endif
