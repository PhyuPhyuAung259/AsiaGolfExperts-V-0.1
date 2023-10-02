@php
    $list_category = $model_category
        ->with('translation')
        ->withCount('news')
        ->orderBy('id')
        ->get()
        ->toTree();
@endphp
@if(!empty($list_category))
<div class="terms_condition_widget">
    <h4 class="title">{{ $item->title }}</h4>
    <div class="widget_list">
        <ul class="list_details">
            <?php
            $traverse = function ($categories, $prefix = '') use (&$traverse) {
                foreach ($categories as $category) {
                    $translation = $category->translate();
                    ?>
                        <li>
                            <a href="{{ $category->getDetailUrl() }}">
                                <i class="fa fa-caret-right mr10"></i>{{$prefix}} {{$translation->name}}<span class="float-right">{{ $category->news_count }} {{$category->news_count < 1 ? __('property') : __('properties')}}</span>
                            </a>
                        </li>
                    <?php
                    $traverse($category->children, $prefix . '-');
                }
            };
            $traverse($list_category);
            ?>
        </ul>
    </div>
</div>
@endif
