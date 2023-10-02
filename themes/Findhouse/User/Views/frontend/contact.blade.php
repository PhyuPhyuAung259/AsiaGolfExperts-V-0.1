@extends('layouts.user')
@section('content')
    <div class="my_dashboard_review">
        <div class="candidate_revew_select style2 text-right mb30-991">
            <ul class="mb0">
                <li class="list-inline-item">
                    <form class="form-inline my-2" action="{{ route('user.showContact') }}" method="GET">
                        <select class="selectpicker show-tick" name="contact_type" onchange="this.form.submit()">
                            <option value="">{{ __('--Select Filter--') }}</option>
                            <option value="property_contact" @if(Request::input('contact_type')=='property_contact') selected @endif>{{ __('Property contact') }}</option>
                            <option value="agent_contact" @if(Request::input('contact_type')=='agent_contact') selected @endif>{{ __('Agent contact') }}</option>
                            <option value="agency_contact" @if(Request::input('contact_type')=='agency_contact') selected @endif>{{ __('Agency contact') }}</option>
                        </select>
                    </form>
                </li>
            </ul>
        </div>
        <div class="mb40 show-contact">
            <div class="property_table">
                <div class="table-responsive mt0">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Object') }}</th>
                                <th scope="col">{{ __('From') }}</th>
                                <th scope="col">{{ __('Guest name') }}</th>
                                <th scope="col">{{ __('Phone') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Message') }}</th>
                                <th scope="col">{{ __('Created at') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($rows) > 0)
                                @foreach($rows as $row)
                                    <tr>
                                        <td>
                                            @if ($row->object_model == 'agent')
                                                {{ __('Agent') }}
                                            @endif

                                            @if ($row->object_model == 'property')
                                                {{ __('Property') }}
                                            @endif

                                            @if ($row->object_model == 'agencies')
                                                {{ __('Agencies') }}
                                            @endif
                                        </td>

                                        <td>
                                            @if ($row->object_model == 'agent')
                                                {{ __('') }}
                                            @endif

                                            @if ($row->object_model == 'property')
                                                {{ $row->property_title }}
                                            @endif

                                            @if ($row->object_model == 'agencies')
                                                {{ $row->agency_title }}
                                            @endif
                                        </td>

                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->message }}</td>
                                        <td>{{ $row->created_at }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">Data not found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="mbp_pagination">
                    {{-- {{$rows->appends(request()->query())->links()}} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
