<section id="property-city" class="property-city pb30 bb1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title text-center">
                    <h2>{{clean($title)}}</h2>
                    <p>{{clean($desc)}}</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($rows as $key=>$row)
                <div class="col-sm-6 col-lg-4 col-xl">
                    @include('Location::frontend.blocks.list-locations.loop_side',['class_form'=>"properti_city_home8 text-center"])
                </div>
            @endforeach
        </div>
    </div>
</section>
