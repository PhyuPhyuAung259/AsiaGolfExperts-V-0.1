@php
$recent_news = $model_news->orderBy('updated_at', 'DESC')->orderBy('id', 'DESC')->limit(5)->get();
@endphp
@if(!empty($recent_news))
    <div class="sidebar_feature_listing">
        <h4 class="title">{{ $item->title }}</h4>
        @foreach($recent_news as $r_news)
            @php
                $translation = $r_news->translate(); @endphp

                <div class="media">
                    @if($image_url = get_file_url($r_news->image_id, 'full'))
                        <a href="{{ $r_news->getDetailUrl() }}">
                            <img class="align-self-start mr-3" src="{{ $image_url  }}" alt="{{$translation->title}}">
                        </a>
                    @endif
                    <div class="media-body">
                        <div class="news-date small mb-1">{{ display_date($r_news->updated_at)}}</div>
                        <a href="{{ $r_news->getDetailUrl() }}">
                            <h5 class="mt-0 post_title">{{ $translation->title }}</h5>
                        </a>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endif
