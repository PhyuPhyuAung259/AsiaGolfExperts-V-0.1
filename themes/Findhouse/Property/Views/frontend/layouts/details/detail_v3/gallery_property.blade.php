@if ($row->getGallery())
<?php $listGallery = $row->getGallery(); ?>
<section class="listing-title-area p0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 p0">
                <div class="listing_single_property_slider">
                    @foreach ($listGallery as $key => $item)
                    <div class="item">
                        <img class="img-fluid" src="{{ $item['large'] }}" alt="lsslider1.jpg">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif