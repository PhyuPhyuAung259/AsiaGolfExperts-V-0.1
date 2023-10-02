<div class="panel">
    <div class="panel-title"><strong>{{__("Agency Content")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <label>{{__("Name")}}</label>
            <input type="text" value="{{ old('name',$translation->name) }}" placeholder="{{__("Agency name")}}" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">{{__("Content")}}</label>
            <div class="">
                <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10">{{ old('content',$translation->content) }}</textarea>
            </div>
        </div>
        @if(is_default_lang())
        <div class="row form-group">
            <div class="col-md-6 col-sm-12">
                <label class="control-label">{{__("Office")}}</label>
                <input type="text" name="office" class="form-control" value="{{ $row->office ? $row->office : old('office') }}" placeholder="{{__("Office")}}">
            </div>
            <div class="col-md-6 col-sm-12">
                <label class="control-label">{{__("Mobile")}}</label>
                <input type="text" name="mobile" class="form-control" value="{{ $row->mobile ? $row->mobile : old('mobile') }}" placeholder="{{__("Mobile")}}">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-6 col-sm-12">
                <label class="control-label">{{__("Email")}}</label>
                <input type="text" name="email" class="form-control" value="{{ $row->email ? $row->email : old('email') }}" placeholder="{{__("Email")}}">
            </div>
            <div class="col-md-6 col-sm-12">
                <label class="control-label">{{__("Fax")}}</label>
                <input type="text" name="fax" class="form-control" value="{{ $row->fax ? $row->fax : old('fax') }}" placeholder="{{__("Fax")}}">
            </div>
        </div>
        @endif

        @if(is_default_lang())
            <div class="form-group">
                <label class="control-label">{{__("Banner Image")}}</label>
                <div class="form-group-image">
                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('banner_image_id',$row->banner_image_id) !!}
                </div>
            </div>
        @endif
    </div>
</div>
@if(is_default_lang())
<div class="panel">
    <div class="panel-title"><strong>{{__("Social Info")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <div class="form-controls">
                <div class="form-group-item">
                    <div class="form-group-item">
                        <div class="g-items-header">
                            <div class="row">
                                <div class="col-md-3">{{__("Name social")}}</div>
                                <div class="col-md-4">{{__('Code icon')}}</div>
                                <div class="col-md-4">{{__('Link social')}}</div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                        <div class="g-items">
                            <?php
                            $social = $row->social;

                            if(!empty($social)) $social = json_decode($social,true);
                            if(empty($social) or !is_array($social))
                                $social = [];
                            ?>
                            @foreach($social as $key=>$item)
                                <div class="item" data-number="{{$key}}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" name="social[{{$key}}][title]" class="form-control" value="{{$item['title']}}">
                                        </div>
                                        <div class="col-md-4">
                                            <textarea name="social[{{$key}}][code]" rows="5" class="form-control">{{$item['code']}}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <textarea name="social[{{$key}}][link]" rows="5" class="form-control">{{$item['link']}}</textarea>
                                        </div>
                                        <div class="col-md-1">
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
                                        <input type="text" __name__="social[__number__][title]" class="form-control" value="">
                                    </div>

                                    <div class="col-md-4">
                                        <textarea __name__="social[__number__][code]" class="form-control" rows="5"></textarea>
                                    </div>

                                    <div class="col-md-4">
                                        <textarea __name__="social[__number__][link]" class="form-control" rows="5"></textarea>
                                    </div>
                                    <div class="col-md-1">
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
@endif
