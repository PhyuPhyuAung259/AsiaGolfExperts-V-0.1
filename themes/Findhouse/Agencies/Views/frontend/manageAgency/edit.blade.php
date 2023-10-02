<?php $container = 1 ?>
@extends('layouts.user')
@section('content')
    <div class="col-lg-12 mb10">
    </div>
    <div class="mb-3">
        @if($row->id)
            @include('Language::admin.navigation')
        @endif
    </div>
    <form class="" action="{{route('agency.vendor.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
        @csrf
            <div class="row">
                <div class="col-sm-9">
                @include('Agencies::admin.agency.include.content',['hide_list_agent'=>true])
                </div>
                <div class="col-sm-3">
                    <div class="panel">
                        <div class="panel-title"><strong>{{__('Publish')}}</strong></div>
                        <div class="panel-body">
                            <div class="my_profile_setting_input text-center">
                                <button type="submit" class="btn btn2 ">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-image">
                    <div class="panel-title"><strong>{{__('Feature Image')}}</strong></div>
                    <div class="panel-body">
                        {!! \Modules\Media\Helpers\FileHelper::fieldUpload('image_id',$row->image_id) !!}
                    </div>
                </div>
                </div>
            </div>



    </form>

@endsection
@section('script.body')
    <script type="text/javascript" src="{{ asset('libs/tinymce/js/tinymce/tinymce.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/condition.js?_ver='.config('app.asset_version')) }}"></script>
    {!! App\Helpers\MapEngine::scripts() !!}
@endsection
