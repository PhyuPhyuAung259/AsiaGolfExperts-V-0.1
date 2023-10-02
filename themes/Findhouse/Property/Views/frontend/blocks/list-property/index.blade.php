<section id="feature-property" class="feature-property bgc-f7">
    @if(empty($hide_scroll_down))
        <div class="mouse_scroll">
            <a href="#feature-property">
                <div class="icon">
                    <h4>{{__('Scroll Down')}}</h4>
                    <p>{{__('to discover more')}}</p>
                </div>
                <div class="thumb">
                    <img src="{{asset('themes/findhouse/images/resource/mouse.png')}}" alt="mouse.png">
                </div>
            </a>
        </div>
    @endif
    <div class="container ovh">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title text-center mb40">
                    @if($title)
                    <h2>{{$title}}</h2>
                    @endif
                    @if($desc)
                    <p>{{$desc}}</p>
                    @endif
                </div>
            </div>
            <div class="col-lg-12">
                <div class="feature_property_slider">
                    @foreach($rows as $row)
                        @include('Property::frontend.layouts.search.loop-gird')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
