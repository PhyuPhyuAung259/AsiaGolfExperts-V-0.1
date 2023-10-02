@php
    $translation = $row->translate();
@endphp
<div class="for_blog feat_property">
    <a href="{{$row->getDetailUrl()}}">
        <div class="thumb">
            <img src="{{get_file_url($row->image_id,'medium')}}" class="img-whp" alt="{{$translation->name ?? ''}}">
        </div>
        <div class="details">
            <div class="tc_content">
                @php $category = $row->category; @endphp
                @if(!empty($category))
                    @php $t = $category->translate(); @endphp
                    <p class="text-thm">
                        <a href="{{$category->getDetailUrl(app()->getLocale())}}">
                            {{$t->name ?? ''}}
                        </a>
                    </p>
                @endif
                <h4><a href="{{$row->getDetailUrl(app()->getLocale())}}">{{$translation->title}}</a></h4>
            </div>
            <div class="fp_footer">
                <ul class="fp_meta float-left mb0">
                    @if(!empty($row->user->id))
                    <li class="list-inline-item"><a href="#">
                    @if($avatar_url = $row->user->getAvatarUrl())
                        <img class="avatar" src="{{$avatar_url}}" alt="{{$row->user->getDisplayName()}}">
                    @else
                        <span class="avatar-text-list">{{ucfirst($row->user->getDisplayName()[0])}}</span>
                    @endif
                    </a></li>
                    <li class="list-inline-item"><a href="#">{{$row->user->getDisplayName()}}</a></li>
                    @endif
                </ul>
                <a class="fp_pdate float-right" href="#">{{ display_date($row->updated_at)}}</a>
            </div>
        </div>
    </a>
</div>
