<section class="inner_page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb_content">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url("/") }}">{{ __("Home") }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $name }}</li>
                    </ol>
                    <h1 class="breadcrumb_title">{{ $name }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title text-center">
                    <h2 class="mt0">{{ $title }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-xl-7">
                <div class="about_content">
                    {!! $content !!}
                    @if ($list_item)
                    <ul class="ab_counting">
                        @foreach($list_item as $item)
                        <li class="list-inline-item">
                            <div class="about_counting">
                                <div class="icon"><span class="{{ $item['featured_icon'] }}"></span></div>
                                <div class="details">
                                    <h3>{{ $item['value'] }}</h3>
                                    <p>{{ $item['name'] }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-xl-5">
                <div class="about_thumb">
                    <img class="img-fluid w100" src="{{ get_file_url($image_video,'full')}}" >
                    <a class="popup-iframe popup-youtube color-white" href="{{ $link_video }}"><i class="flaticon-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>