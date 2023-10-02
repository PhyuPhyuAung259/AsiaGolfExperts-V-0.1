@foreach($rows as $row)
    @php
        $translation = $row->translate(); @endphp
    <div class="for_blog feat_property">
        @if(get_file_url($row->image_id,'thumb'))
            <div class="thumb">
                <a href="{{$row->getDetailUrl()}}">
                    <img class="img-whp" src="{{get_file_url($row->image_id,'thumb')}}">
                    {{-- {!! $image_tag !!} --}}
                </a>
                <div class="blog_tag">
                    @php $category = $row->category; @endphp
                    @if(!empty($category))
                        @php $t = $category->translate(); @endphp
                        <a href="{{$category->getDetailUrl(app()->getLocale())}}">
                            {{$t->name ?? ''}}
                        </a>
                    @endif
                </div>
            </div>
        @endif
        <div class="details">
            <div class="tc_content">
                <h4 class="mb15"><a href="{{$row->getDetailUrl()}}" class="c-inherit">{{$translation->title}}</a></h4>
                <p>{!! get_exceprt($translation->content) !!}</p>
            </div>
            <div class="fp_footer">
                <ul class="fp_meta float-left mb0">
                    @if(!empty($row->author))
                        <li class="list-inline-item">
                            <a href="javascript:void(0)">
                                @if($avatar_url = $row->author->getAvatarUrl())
                                    <img class="avatar" src="{{$avatar_url}}" alt="{{$row->author->getDisplayName()}}">
                                @endif
                            </a>
                        </li>
                        <li class="list-inline-item"><a href="javascript:void(0)">{{$row->author->getDisplayName() ?? ''}}</a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><span class="flaticon-calendar pr10"></span> {{ display_date($row->updated_at)}}</a></li>
                    @endif
                </ul>
                <a class="fp_pdate float-right text-thm" href="{{$row->getDetailUrl()}}">{{ __('Read More')}}<span class="flaticon-next"></span></a>
            </div>
        </div>
    </div>
@endforeach
