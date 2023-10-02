@if(count($property_related) > 0)
    <div class="col-lg-12">
        <h4 class="mt30 mb30">{{ __("Similar Properties") }}</h4>
    </div>
    @foreach($property_related as $k => $item)
        <div class="col-lg-6">
            @include('Property::frontend.layouts.search.loop-gird',['row'=> $item,'include_param'=>0])
        </div>
    @endforeach
@endif
