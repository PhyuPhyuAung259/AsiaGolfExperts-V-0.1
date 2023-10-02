@extends('layouts.user')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="candidate_revew_select style2 text-right mb30-991">
                <ul class="mb0">
                    <li class="list-inline-item">
                        <div class="course fn-520">
                            <form class="form-inline my-2" action="{{ route('property.vendor.index') }}" method="GET">
                                <input class="form-control form-control-sm mr-sm-2 rounded ml-2" type="search" placeholder="{{__('Search Properties')}}" aria-label="Search" name="s" value="{{ Request::query("s") }}">
                                <button class="btn my-2 my-sm-0 bn-sm btn-sm btn-primary" type="submit">{{ __("Search") }} <span class="flaticon-magnifying-glass"></span></button>
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
                                <th scope="col">{{ __('Listing Title') }}</th>
                                <th scope="col">{{ __('Date published') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col">{{ __('View') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($rows->total() > 0)
                                @foreach($rows as $row)
                                    <tr>
                                        @include('Property::frontend.manageProperty.loop-list')
                                    </tr>
                                @endforeach
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
