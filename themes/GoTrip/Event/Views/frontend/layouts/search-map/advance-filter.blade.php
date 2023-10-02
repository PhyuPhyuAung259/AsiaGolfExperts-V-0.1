@php
    $event_map_search_fields = setting_item_array('event_map_search_fields');
    $usedAttrs = [];
    foreach ($event_map_search_fields as $field){
        if($field['field'] == 'attr' and !empty($field['attr']))
        {
            $usedAttrs[] = $field['attr'];
        }
    }
    $selected = (array) request()->query('terms');
@endphp


@php $event_map_search_fields = setting_item_array('event_map_search_fields');

    $event_map_search_fields = array_values(\Illuminate\Support\Arr::sort($event_map_search_fields, function ($value) {
        return $value['position'] ?? 0;
    }));

@endphp
<div class="row x-gap-10 y-gap-10 pt-20">
    @if(!empty($event_map_search_fields))
        @foreach($event_map_search_fields as $field)
            @switch($field['field'])
                @case ('attr')
                @include('Event::frontend.layouts.search-map.fields.attr')
                @php
                    $usedAttrs[] = $field['attr'];
                @endphp
                @break

                @case ('price')
                @include('Event::frontend.layouts.search-map.fields.price')
                @break
                @case ('advance')

                <div class="col-auto">

                    <div class="dropdown js-dropdown js-advance-active">
                        <div class="dropdown__button d-flex items-center text-14 rounded-100 border-light px-15 h-34" data-el-toggle=".js-advance-toggle" data-el-toggle-active=".js-advance-active">
                            <span class="js-dropdown-title">{{__('More filters')}}</span>
                            <i class="icon icon-chevron-sm-down text-7 ml-10"></i>
                        </div>

                        <div class="toggle-element -dropdown js-click-dropdown js-advance-toggle" style="min-width: 800px; left: 230%">
                            <div class="text-15 y-gap-15 js-dropdown-list">
                                @foreach ($attributes as $item)
                                    @if(empty($item['hide_in_filter_search']))
                                        @php
                                            if(in_array($item->id,$usedAttrs)) continue;
                                                $translate = $item->translate();
                                        @endphp
                                        <div class="filter-item">
                                            <div class="filter-title"><strong>{{$translate->name}}</strong></div>
                                            <ul class="filter-items row">
                                                @foreach($item->terms as $term)
                                                    @php $translate = $term->translate(); @endphp
                                                    <li class="filter-term-item col-xs-6 col-md-4">
                                                        <input style="width: 10%" @if(in_array($term->id,$selected)) checked @endif type="checkbox" name="terms[]" value="{{$term->id}}"> {{$translate->name}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
                @break
            @endswitch
        @endforeach
    @endif
</div>
