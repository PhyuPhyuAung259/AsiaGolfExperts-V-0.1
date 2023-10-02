<form class="" action="{{route('agency.vendor.agent.store',['agency_id'=>$current_agency->id,'lang'=>request()->query('lang')])}}" method="post">
	@csrf
	<div class="form-group">
		<input type="text" required value="{{old('first_name')}}" name="first_name" placeholder="{{__("First name")}}" class="form-control">
	</div>
	
	<div class="form-group">
		<input type="text" required value="{{old('last_name')}}" name="last_name" placeholder="{{__("Last name")}}" class="form-control">
	</div>
	<div class="form-group">
		<input type="text" value="{{old('business_name')}}" name="business_name" placeholder="{{__("Business name")}}" class="form-control">
	</div>
	
	<div class="form-group">
		<input type="email" required value="{{old('email')}}" placeholder="{{ __('Email')}}" name="email" class="form-control">
	</div>
	
	<div class="form-group">
		<input type="text" value="{{old('phone')}}" placeholder="{{ __('Phone')}}" name="phone" class="form-control" required>
	</div>
	<div class="form-group">
		<input type="password" value="" placeholder="{{ __('Password')}}" name="password" class="form-control" required>
	</div>
	<div class="right">
		<button type="submit" class="btn btn-info  float-right">{{ __('Create') }}</button>
	</div>
</form>