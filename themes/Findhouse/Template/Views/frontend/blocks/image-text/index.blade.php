<!-- About Text Content -->
<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center">
                    <h2 class="mt0">{{ $title ?? '' }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="@if(!empty($image)) col-lg-8 col-xl-7 @else col-12 @endif">
                <div class="about_content">
                    {!! @clean($description ?? '') !!}
                    @if(!empty($list_item))
                    <ul class="ab_counting">
                        @foreach($list_item as $item)
                        <li class="list-inline-item">
                            <div class="about_counting">
                                <div class="icon"><span class="{{ $item['icon_class'] ?? '' }}"></span></div>
                                <div class="details">
                                    <h3>{{ $item['value'] ?? '' }}</h3>
                                    <p>{{ $item['title'] ?? '' }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            @if(!empty($image))
                <div class="col-lg-4 col-xl-5">
                    <div class="about_thumb">
                        <img class="img-fluid w100" src="{{ \Modules\Media\Helpers\FileHelper::url($image, 'full') }}" alt="{{ $title ?? '' }}">
                        @if(!empty($video_url))
                            <a class="popup-iframe popup-youtube color-white" href="{{ $video_url }}"><i class="flaticon-play"></i></a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
