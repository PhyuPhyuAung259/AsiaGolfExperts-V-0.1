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

                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    @include('Location::frontend.blocks.list-locations.loop_side',['class_form'=>'property_city_home6'])
                </div>
            @endforeach
</div>
</div>