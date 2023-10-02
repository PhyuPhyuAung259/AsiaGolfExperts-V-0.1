@if ($row->getGallery())
<?php $listGallery = $row->getGallery(); ?>
@php $large = $listGallery[0]; unset($listGallery[0]); $i = 1; @endphp
<div class="row">
    <div class="col-sm-7 col-lg-8">
        <div class="row">
            <div class="col-lg-12">
                <div class="spls_style_two mb30-520">
                    <a class="popup-img" href="{{$large['large']}}"><img class="img-fluid w100" src="{{$large['large']}}" alt="1.jpg"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-5 col-lg-4">
        <div class="row">
            @foreach ($listGallery as $key => $item)
                <div class="col-sm-6 col-lg-6">
                    <div class="spls_style_two mb30">
                        <a class="popup-img" href="{{ $item['large'] }}"><img class="img-fluid w100" src="{{ $item['large'] }}" alt="2.jpg"></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif