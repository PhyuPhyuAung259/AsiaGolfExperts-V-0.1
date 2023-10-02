<?php
$related_news = \Modules\News\Models\News::query()->with('translation')->where('status','publish')->where('cat_id', $row->cat_id)->where('id', '!=', $row->id)->limit(2)->get();
?>
@if(!empty($related_news))
    <div class="col-lg-12 mb20">
        <h4>{{ __("Related Posts") }}</h4>
    </div>
    @foreach($related_news as $new)
        @php
            $translation = $new->translate(); @endphp
        <div class="col-md-6 col-lg-6">
            <div class="for_blog feat_property">
                @if(get_file_url($new->image_id,'thumb'))
                    <div class="thumb">
                        <img class="img-whp" src="{{get_file_url($new->image_id,'thumb')}}">
                        {{-- <div class="tag">Construction</div> --}}
                    </div>
                @endif
                <div class="details">
                    <div class="tc_content">
                        <h4>{{$translation->title}}</h4>
                        <ul class="bpg_meta">
                            <li class="list-inline-item"><a href="#"><i class="flaticon-calendar"></i></a></li>
                            <li class="list-inline-item"><a href="#">{{ display_date($new->updated_at)}}</a></li>
                        </ul>
                        <p>{{ Str::limit($new->content, 70) }}</p>
                    </div>
                    <div class="fp_footer">
                        @if(!empty($row->author))
                            <ul class="fp_meta float-left mb0">
                                <li class="list-inline-item">
                                    @if($avatar_url = $row->author->getAvatarUrl())
                                        <a href="#"><img src="{{$avatar_url}}" alt="{{$row->author->getDisplayName()}}"></a>
                                    @endif
                                </li>
                                <li class="list-inline-item"><a href="#">{{ $row->author->getDisplayName() }}</a></li>
                            </ul>
                        @endif
                        <a class="fp_pdate float-right text-thm" href="{{ $row->getDetailUrl() }}">Read More <span class="flaticon-next"></span></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
