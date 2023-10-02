<?php
$featured_news = \Modules\News\Models\News::query()->with('translation')->where("status", "publish")->where('is_featured', 1)->limit(3)->get()
?>
@if(count($featured_news) > 0)
    <div class="sidebar_feature_listing">
        <h4 class="title">{{ __("Featured Listings") }}</h4>
        @foreach($featured_news as $feature_new)
            @php
                $translation = $feature_new->translate(); @endphp
            <div class="media">
                @if($image_url = get_file_url($feature_new->image_id, 'full'))
                    <img class="align-self-start mr-3" src="{{ $image_url  }}" alt="{{$translation->title}}">
                @endif
                <div class="media-body">
                    <h5 class="mt-0 post_title">{{ $translation->title }}</h5>
                    <a href="#">${{ $feature_new->price }}/<small>{{__('/mo')}}</small></a>
                    <ul class="mb0">
                        <li class="list-inline-item">{{ __('Beds:') }} {{ $feature_new->bed }}</li>
                        <li class="list-inline-item">{{ __('Baths:') }} {{ $feature_new->bath }}</li>
                        <li class="list-inline-item">{{ __('Sq Ft:') }} {{ $feature_new->acreage }}</li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endif
