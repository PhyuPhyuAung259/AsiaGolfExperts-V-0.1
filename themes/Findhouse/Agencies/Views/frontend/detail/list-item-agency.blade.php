
<div class="feat_property home7 agency">
    <div class="thumb">
        <img class="img-fluid" src="{{ get_file_url($item->image_id, 'thumb') }}" alt="1.jpg">
        <div class="thmb_cntnt">
            <ul class="tag mb0">
                <li class="list-inline-item dn"></li>
                <li class="list-inline-item"><a href="#">{{ $item['count_listing'] > 1 ? $item['count_listing'] : ''}} {{ __('Listings') }}</a></li>
            </ul>
        </div>
    </div>
    <div class="details">
        <div class="tc_content">
            <a href="{{ route('agencies.detail', ['slug' => $item->slug]) }}">
                <h4>{{$item->name}}</h4>
            </a>
            <p class="text-thm">{{ __('Agency') }}</p>
            <ul class="prop_details mb0">
                @if ($item->office)
                    <li><a href="#">{{ __("Office") }}: {{ $item->office }}</a></li>
                @endif
                @if ($item->mobile)
                    <li><a href="#">{{ __("Mobile") }}: {{ $item->mobile}}</a></li>
                @endif
                @if ($item->fax)
                    <li><a href="#">{{ __("Fax") }}: {{ $item->fax}}</a></li>
                @endif
                @if ($item->email)
                    <li><a href="#">{{ __("Email") }}: <span>{{ $item->email}}</span></a></li>
                @endif
            </ul>
        </div>
        <div class="fp_footer">
            <?php
                $social = $item->social;

                if(!empty($social)) $social = json_decode($social,true);
                if(empty($social) or !is_array($social))
                    $social = [];
            ?>
            @if(count($social) > 0)
                <ul class="fp_meta float-left mb0">
                    @foreach($social as $socialItem)
                        {{-- {!! $socialItem['code'] !!} --}}
                        <li class="list-inline-item"><a href="{{ isset($socialItem['link']) ? $socialItem['link'] : '' }}"><i class="{{ isset($socialItem['code']) ? $socialItem['code'] : '' }}" target="_blank"></i></a></li>
                    @endforeach
                </ul>
            @endif
            <a href="{{ route('agencies.detail', ['slug' => $item->slug]) }}">
                <div class="fp_pdate float-right text-thm">{{ __('View My Listing') }} <i class="fa fa-angle-right"></i></div>
            </a>
        </div>
    </div>
</div>
