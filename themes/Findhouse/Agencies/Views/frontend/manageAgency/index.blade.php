@extends('layouts.user')
@section('content')
	<div class="col-lg-12 col-xl-12">
		<div class="candidate_revew_select style2 text-right mb30-991">
			<ul class="mb0">
				<li class="list-inline-item">
					<div class="candidate_revew_search_box course fn-520">
						<form class="form-inline my-2" action="{{ route('agency.vendor.index') }}" method="GET">
							<input class="form-control mr-sm-2" type="search" placeholder="{{__('Search Agency')}}" aria-label="Search" name="s" value="{{ Request::query("s") }}">
							<button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="mb40">
			<div class="property_table">
				<div class="table-responsive mt0">
					<table class="table">
						<thead class="thead-light">
						<tr>
							<th scope="col">{{ __('Name') }}</th>
							<th scope="col">{{ __('Date') }}</th>
							<th scope="col">{{ __('Status') }}</th>
							<th scope="col">{{ __('Action') }}</th>
						</tr>
						</thead>
						<tbody>
						@if($rows->total() > 0)
							@foreach($rows as $row)
								<tr>
									<td class="title">
										<a href="{{route('agency.vendor.edit',['id'=>$row->id])}}">{{$row->name}}</a>
									</td>
									<td >{{ display_date($row->updated_at)}}</td>
									<td><span class="status_tag {{ $row->status == 'publish' ? 'badge2' : ($row->status == 'draft' ? 'badge' : '') }}">{{ $row->status }}</span></td>
									
									<td>
										<div class="btn-group">
											<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th" aria-hidden="true"></i>
											</button>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="{{route('agency.vendor.edit',['id'=>$row->id])}}">{{__('Edit')}}</a>
												<a class="dropdown-item" href="{{route('agency.vendor.agent.index',['agency_id'=>$row->id])}}">{{__('List Agent')}}</a>
											</div>
										</div>
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="4">{{__("No data")}}</td>
							</tr>
						@endif
						</tbody>
					</table>
				</div>
				<div class="mbp_pagination">
					{{$rows->appends(request()->query())->links()}}
				</div>
			</div>
		</div>
	</div>
@endsection
