@if(!empty($breadcrumbs))
    <div class="breadcrumb_content style2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url("/") }}">{{ __('Home')}}</a></li>
            @foreach($breadcrumbs as $breadcrumb)
                <li class="breadcrumb-item text-thm {{$breadcrumb['class'] ?? ''}}" aria-current="page">
                    @if(!empty($breadcrumb['url']))
                        <a href="{{url($breadcrumb['url'])}}">{{ $breadcrumb['name'] }}</a>
                    @else
                        {{$breadcrumb['name']}}
                    @endif
                </li>
            @endforeach
        </ol>
        <h2 class="breadcrumb_title">{{__('News')}}</h2>
    </div>
@endif
