@extends('layouts.user')
@section('head')

@endsection
@section('content')
    <div class="my_dashboard_review mt30">
        <form action="{{route('user.profile.profile_post')}}" method="post" class="input-has-icon bravo_user_profile_form">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-title">
                        <strong>{{__("Personal Information")}}</strong>
                    </div>
                    @if($is_vendor_access)
                        <div class="form-group">
                            <label>{{__("Business name")}}</label>
                            <input type="text" value="{{old('business_name',$dataUser->business_name)}}" name="business_name" placeholder="{{__("Business name")}}" class="form-control">
                            <i class="fa fa-user input-icon"></i>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>{{__("E-mail")}}</label>
                        <input type="text" name="email" value="{{old('email',$dataUser->email)}}" placeholder="{{__("E-mail")}}" class="form-control">
                        <i class="fa fa-envelope input-icon"></i>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__("First name")}}</label>
                                <input type="text" value="{{old('first_name',$dataUser->first_name)}}" name="first_name" placeholder="{{__("First name")}}" class="form-control">
                                <i class="fa fa-user input-icon"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__("Last name")}}</label>
                                <input type="text" value="{{old('last_name',$dataUser->last_name)}}" name="last_name" placeholder="{{__("Last name")}}" class="form-control">
                                <i class="fa fa-user input-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__("Phone Number")}}</label>
                        <input type="text" value="{{old('phone',$dataUser->phone)}}" name="phone" placeholder="{{__("Phone Number")}}" class="form-control">
                        <i class="fa fa-phone input-icon"></i>
                    </div>
                    <div class="form-group">
                        <label>{{__("Birthday")}}</label>
                        <input type="text" value="{{ old('birthday',$dataUser->birthday? display_date($dataUser->birthday) :'') }}" name="birthday" placeholder="{{__("Birthday")}}" class="form-control date-picker">
                        <i class="fa fa-birthday-cake input-icon"></i>
                    </div>
                    <div class="form-group">
                        <label>{{__("About Yourself")}}</label>
                        <textarea name="bio" rows="5" class="form-control">{{old('bio',$dataUser->bio)}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>{{__("Avatar")}}</label>
                        <div class="upload-btn-wrapper">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        {{__("Browse")}}… <input type="file">
                                    </span>
                                </span>
                                <input type="text" data-error="{{__("Error upload...")}}" data-loading="{{__("Loading...")}}" class="form-control text-view" readonly value="{{ $dataUser->getAvatarUrl()?? __("No Image")}}">
                            </div>
                            <input type="hidden" class="form-control" name="avatar_id" value="{{ $dataUser->avatar_id?? ""}}">
                            <img class="image-demo" src="{{ $dataUser->getAvatarUrl()?? ""}}"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-title">
                        <strong>{{__("Location Information")}}</strong>
                    </div>
                    <div class="form-group">
                        <label>{{__("Address Line 1")}}</label>
                        <input type="text" value="{{old('address',$dataUser->address)}}" name="address" placeholder="{{__("Address")}}" class="form-control">
                        <i class="fa fa-location-arrow input-icon"></i>
                    </div>
                    <div class="form-group">
                        <label>{{__("Address Line 2")}}</label>
                        <input type="text" value="{{old('address2',$dataUser->address2)}}" name="address2" placeholder="{{__("Address2")}}" class="form-control">
                        <i class="fa fa-location-arrow input-icon"></i>
                    </div>
                    <div class="form-group">
                        <label>{{__("City")}}</label>
                        <input type="text" value="{{old('city',$dataUser->city)}}" name="city" placeholder="{{__("City")}}" class="form-control">
                        <i class="fa fa-street-view input-icon"></i>
                    </div>
                    <div class="form-group">
                        <label>{{__("State")}}</label>
                        <input type="text" value="{{old('state',$dataUser->state)}}" name="state" placeholder="{{__("State")}}" class="form-control">
                        <i class="fa fa-map-signs input-icon"></i>
                    </div>
                    <div class="form-group">
                        <label>{{__("Country")}}</label>
                        <select name="country" class="form-control">
                            <option value="">{{__('-- Select --')}}</option>
                            @foreach(get_country_lists() as $id=>$name)
                                <option @if((old('country',$dataUser->country ?? '')) == $id) selected @endif value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{__("Zip Code")}}</label>
                        <input type="text" value="{{old('zip_code',$dataUser->zip_code)}}" name="zip_code" placeholder="{{__("Zip Code")}}" class="form-control">
                        <i class="fa fa-map-pin input-icon"></i>
                    </div>


                    <div class="form-group profile-social">
                        <label>{{ __('User Social') }}</label>
                        <div class="panel">
                            {{-- <div class="panel-title"><strong>{{__("Social Info")}}</strong></div> --}}
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="form-controls">
                                        <div class="form-group-item">
                                            <div class="form-group-item">
                                                <div class="g-items-header">
                                                    <div class="row">
                                                        <div class="col-md-3">{{__("Name social")}}</div>
                                                        <div class="col-md-3">{{__('Code icon')}}</div>
                                                        <div class="col-md-3">{{__('Link social')}}</div>
                                                        <div class="col-md-3"></div>
                                                    </div>
                                                </div>
                                                <div class="g-items">
                                                    <?php
                                                    $social = $dataUser->user_social;

                                                    if(!empty($social)) $social = json_decode($social,true);
                                                    if(empty($social) or !is_array($social))
                                                        $social = [];
                                                    ?>
                                                    @foreach($social as $key=>$item)
                                                        <div class="item" data-number="{{$key}}">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <input type="text" name="user_social[{{$key}}][title]" class="form-control" value="{{$item['title']}}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input name="user_social[{{$key}}][code]" rows="5" class="form-control" value="{{$item['code']}}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input name="user_social[{{$key}}][link]" rows="5" class="form-control" value="{{$item['link']}}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="text-right">
                                                    <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
                                                </div>
                                                <div class="g-more hide">
                                                    <div class="item" data-number="__number__">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <input type="text" __name__="user_social[__number__][title]" class="form-control" value="">
                                                            </div>

                                                            <div class="col-md-3">
                                                                <input __name__="user_social[__number__][code]" class="form-control" rows="5" value="">
                                                            </div>

                                                            <div class="col-md-3">
                                                                <input __name__="user_social[__number__][link]" class="form-control" rows="5" value="">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <textarea name="user_social" class="form-control" id="" cols="30" rows="10" placeholder="html code">{{old('user_social',$dataUser->user_social)}}</textarea> --}}
                    </div>

                </div>
                <div class="col-md-12">
                    <hr>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> {{__('Save Changes')}}</button>
                </div>
            </div>
        </form>
        @if(!empty(setting_item('user_enable_permanently_delete')) and !is_admin())
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-danger">
                        {{__("Delete account")}}
                    </h4>
                    <div class="mb-4 mt-2">
                        {!! clean(setting_item_with_lang('user_permanently_delete_content','',__('Your account will be permanently deleted. Once you delete your account, there is no going back. Please be certain.'))) !!}
                    </div>
                    <a data-toggle="modal" data-target="#permanentlyDeleteAccount" class="btn btn-danger" href="">{{__('Delete your account')}}</a>
                </div>

                <!-- Modal -->
                <div class="modal  fade" id="permanentlyDeleteAccount" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h5 class="modal-title">{{__('Confirm permanently delete account')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="my-3">
                                    {!! clean(setting_item_with_lang('user_permanently_delete_content_confirm')) !!}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                                <a href="{{route('user.permanently.delete')}}" class="btn btn-danger">{{__('Confirm')}}</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('footer')

@endsection
