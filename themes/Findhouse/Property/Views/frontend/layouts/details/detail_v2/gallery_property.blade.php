@if ($row->getGallery())
<?php $listGallery = $row->getGallery(); ?>
<div class="single_page_listing_tab mt-n5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="slider-tab" data-toggle="tab" href="#slider_tabs" role="tab" aria-controls="slider_tabs" aria-selected="true"><span class="flaticon-photo-camera color-white"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="map-tab" data-toggle="tab" href="#map_tabs" role="tab" aria-controls="map_tabs" aria-selected="false"><span class="flaticon-pin color-white"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="street-view-tab" data-toggle="tab" href="#street_view" role="tab" aria-controls="street_view" aria-selected="false"><span class="flaticon-street-view color-white"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="slider_tabs" role="tabpanel" aria-labelledby="slider-tab">
              <!-- 10th Home Slider -->
            <div class="home10-mainslider">
                <div class="container-fluid p0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-banner-wrapper home10">
                                <div class="banner-style-one owl-theme owl-carousel">
                                    @foreach ($listGallery as $key => $item)
                                    <div class="slide slide-one" style="background-image: url('{{ $item['large'] }}');height: 600px;"></div>
                                    @endforeach
                                </div>
                                <div class="carousel-btn-block banner-carousel-btn">
                                    <span class="carousel-btn left-btn"><i class="flaticon-left-arrow-1 left"></i></span>
                                    <span class="carousel-btn right-btn"><i class="flaticon-right-arrow right"></i></span>
                                </div><!-- /.carousel-btn-block banner-carousel-btn -->
                            </div><!-- /.main-banner-wrapper -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="map_tabs" role="tabpanel" aria-labelledby="map-tab">
              <div class="h600" id="map-canvas"></div>
          </div>
          <div class="tab-pane fade" id="street_view" role="tabpanel" aria-labelledby="street-view-tab">
              <iframe class="h600 w100" src="https://www.google.com/maps/embed?pb=!4v1553797194458!6m8!1m7!1sR4K_5Z2wRHTk9el8KLTh9Q!2m2!1d36.82551718071267!2d-76.34864590837246!3f305.15097!4f0!5f0.7820865974627469" frameborder="0" allowfullscreen></iframe>
          </div>
    </div>
</div>
@endif