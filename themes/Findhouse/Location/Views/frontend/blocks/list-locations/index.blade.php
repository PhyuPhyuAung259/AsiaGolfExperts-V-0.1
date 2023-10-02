<section id="property-city" class="property-city pb30 {{ $layout ?? "" }}" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title text-center">
                    @if($title)
                        <h2>{{$title}}</h2>
                    @endif
                    @if($desc)
                        <p>{{$desc}}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <?php $size_col = 0; ?>
            @foreach($rows as $key=>$row)
                <?php
                    if(($key % 2) == 0 && $size_col != 0) {
                        $size_col = 4 ? 8 : 4;
                    }else {
                        $size_col = $size_col == 4 ? 8 : 4;
                    }
                ?>
                <div class="col-lg-{{$size_col}} col-xl-{{$size_col}}">
                    @include('Location::frontend.blocks.list-locations.loop')
                </div>
            @endforeach
        </div>
    </div>
</section>