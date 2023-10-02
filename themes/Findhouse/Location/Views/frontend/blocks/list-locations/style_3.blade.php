
<!-- Property Cities -->
<section id="property-city" class="property-city pt0 pb30 style_3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title">
                    <h2>{{$title}}</h2>
                    <p>{{$desc}} <a class="float-right" href="{{route('property.search')}}">{{__('View All')}} <span
                                class="flaticon-next"></span></a></p>

                </div>
            </div>
        </div>
        <div class="row">
            @foreach($rows as $key=>$row)

                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl">
                    @include('Location::frontend.blocks.list-locations.loop_style_3')
                </div>
            @endforeach


        </div>
    </div>
</section>
