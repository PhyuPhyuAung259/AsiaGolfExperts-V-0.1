@extends('layouts.user')
@section('content')
	<div class="col-lg-12 col-xl-12">
		<div class="candidate_revew_select style2 text-right mb30-991">
			<ul class="mb0">
				<li class="list-inline-item">
					<div class="candidate_revew_search_box course fn-520">
						<form class="form-inline my-2" action="{{ route('agency.vendor.agent.index',['agency_id'=>$current_agency->id]) }}" method="GET">
							<input class="form-control mr-sm-2" type="search" placeholder="{{__('Search Agent')}}" aria-label="Search" name="s" value="{{ Request::query("s") }}">
							<button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
						</form>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<div class="card text-left">
				<div class="card-header">
					<h4 class="card-title font-weight-bold">{{__('Create Agent')}}</h4>
				</div>
				<div class="card-body">
					@includeIf('Agencies::frontend.manageAgency.agent.form')
				</div>
			</div>
		</div>
		<div class="col-lg-8">
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
										<td class="title">{{$row->name}}</td>
										<td >{{ display_date($row->updated_at)}}</td>
										<td><span class="status_tag {{ $row->status == 'publish' ? 'badge2' : ($row->status == 'draft' ? 'badge' : '') }}">{{ $row->status }}</span></td>
										
										<td>
											<a class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove" href="{{route('agency.vendor.agent.remove',['agency_id'=>$current_agency->id,'id'=>$row->id])}}"><span class="flaticon-garbage"></span></a>
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
	</div>
	
@endsection
