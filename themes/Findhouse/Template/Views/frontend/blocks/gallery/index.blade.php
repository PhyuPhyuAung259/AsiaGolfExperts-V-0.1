@if(!empty($gallery))
    <section class="about-section gallery--block pb30">
        <div class="container">
            <div class="row">
                @foreach($gallery as $item)
                    @if(!empty($item['image']))
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="gallery_item">
                                <img class="img-fluid img-circle-rounded w100" src="{{ \Modules\Media\Helpers\FileHelper::url($item['image'], 'medium') }}" alt="fp1.jpg">
                                <div class="gallery_overlay"><a class="icon popup-img" href="{{ \Modules\Media\Helpers\FileHelper::url($item['image'], 'full') }}"><span class="flaticon-zoom-in"></span></a></div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif
