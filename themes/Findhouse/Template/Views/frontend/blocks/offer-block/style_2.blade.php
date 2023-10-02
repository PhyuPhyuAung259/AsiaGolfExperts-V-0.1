@if(!empty($list_item))
    <!-- Why Chose Us -->
    <section class="you-looking-for" style="background-image: url({{$bg_image_url}}); ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title text-center mb30">
                        <h2>{{$title ? clean($title) : ''}}</h2>
                        <p>{{ $desc ? clean($desc) : '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Property Cities -->
    <section id="property-city" class="property-city pb30">
        <div class="container">
            <div class="row features_row">
                @foreach($list_item as $key=>$item)
                <div class="col-sm-6 col-lg-3 col-xl-3 p0">
                    <a href="{{$item['link_more']}}">
                    <div class="why_chose_us home6">
                        @if(!empty($item['featured_icon']))
                        <div class="icon">
                            <span class="{{$item['featured_icon']}}"></span>
                        </div>
                        @endif
                        <div class="details">
                            <h4>{{clean($item['title'])}}</h4>
                            <p>{!! $item['desc'] !!}</p>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </section>

@endif
