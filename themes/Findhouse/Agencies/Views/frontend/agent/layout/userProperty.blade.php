@foreach($userProperties as $userProperty)
    <div class="col-lg-12">
        @include('Property::frontend.layouts.search.loop-list',['row'=>$userProperty,'wrap_class'=>'feat_property list style2 hvr-bxshd bdrrn mb10 mt20'])
    </div>
@endforeach
