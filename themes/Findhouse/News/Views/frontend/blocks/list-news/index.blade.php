<!-- Our Blog -->
<section class="our-blog bb1 pb30"  style="background-color: {{ $bg_color  }};background-image: url('{{$bg_image_url}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title text-center">
                    <h2>{{$title}}</h2>
                    @if(!empty($desc))
                    <p>{{$desc}}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($rows as $row)
                <div class="col-md-6 col-lg-4 col-xl-4">
                    @include('News::frontend.blocks.list-news.loop')
                </div>
            @endforeach
        </div>
    </div>
</section>