@php
    $terms_ids = $row->terms->pluck('term_id');
    $attributes = \Modules\Core\Models\Terms::getTermsById($terms_ids);
@endphp
@if(!empty($terms_ids) and !empty($attributes))
    @foreach($attributes as $attribute )
        @php $translate_attribute = $attribute['parent']->translate() @endphp
        @if(empty($attribute['parent']['hide_in_single']))
            <div class="col-lg-12">
                <div class="application_statics mt30 g-attributes {{$attribute['parent']->slug}} attr-{{$attribute['parent']->id}}" >
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="mb10">{{ $translate_attribute->name }}</h4>
                        </div>
                        @php $terms = $attribute['child'] @endphp
                        @foreach($terms as $term )
                            @php $translate_term = $term->translate() @endphp
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <ul class="order_list list-inline-item">
                                    <li><a href="#">
                                        @if($translate_term->icon)
                                            <span class="{{ $translate_term->icon }}"></span>
                                        @else
                                            <span class="flaticon-tick"></span>
                                        @endif
                                        {{$translate_term->name}}
                                    </a></li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif
