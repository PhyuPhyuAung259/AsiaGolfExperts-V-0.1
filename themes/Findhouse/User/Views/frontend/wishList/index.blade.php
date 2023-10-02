@extends('layouts.user')
@section('content')
    <div class="my_dashboard_review">
        <div class="mb40">
            @include('admin.message')
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
                                        @include('User::frontend.wishList.loop-list')
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
@endsection
