
@if(!empty($model_tag))
<div class="blog_tag_widget">
    <h4 class="title">{{ $item->title }}</h4>
    <ul class="tag_list">
        @php
            $list_tags = \Modules\News\Models\NewsTag::getTags();
        @endphp
        @if($list_tags)
            @foreach($list_tags as $tag)
                @php $translation = $tag->translate() @endphp
                <li class="list-inline-item"><a href="{{ $tag->getDetailUrl(app()->getLocale()) }}">{{$translation->name}}</a></li>
            @endforeach
        @endif
    </ul>
</div>
@endif
