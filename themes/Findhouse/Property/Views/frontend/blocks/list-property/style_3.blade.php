<!-- Property Cities -->
<section id="best-property" class="best-property mt80 pb50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title">
                    @if($title)
                        <h2>{{clean($title)}}</h2>
                    @endif
                    <p>
                    @if($desc)
                        {{clean($desc)}}.
                    @endif
                    <a class="float-right" href="{{route('property.search')}}">{{__('View All')}} <span
                            class="flaticon-next"></span></a></p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($rows as $row)
                <div class="col-sm-6 col-lg-4">
                    @include('Property::frontend.layouts.search.loop-gird-bg-image',
                        ['img_bg_class'=>'feature_property_bg_image_st3'])
                </div>
            @endforeach


        </div>
    </div>
</section>

