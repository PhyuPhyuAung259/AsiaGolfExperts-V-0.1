<!-- Results count and sort -->
<div class="row y-gap-10 items-center justify-between">
    <div class="col-auto">
        <div class="text-18 fw-500">
            @if($rows->total() > 1)
                {!! __(":count boats found",['count'=>$rows->total()])  !!}
            @else
                {!! __(":count boat found",['count'=>$rows->total()])  !!}
            @endif
        </div>
    </div>

    <div class="col-auto">
        <div class="row x-gap-20 y-gap-20">
            <div class="col-auto">
                @include('Boat::frontend.layouts.search.orderby')
            </div>
        </div>
    </div>
</div>
<!-- End Results count and sort -->

<!--Filter mobile-->
<div class="filterPopup bg-white" data-x="filterPopup" data-x-toggle="-is-active">
    <aside class="sidebar -mobile-filter">
        <div data-x-click="filterPopup" class="-icon-close">
            <i class="icon-close"></i>
        </div>

        @include('Boat::frontend.layouts.search.sidebar-form-search', ['layout' => $layout])
        <!-- Mobile form -->
    </aside>
</div>
<!--End Filter mobile-->
@if($layout == 'grid')
    <div class="pt-30 mt-30 border-top-light"></div>
@else
    <div class="pt-30"></div>
@endif

<div class="row y-gap-30">
    @if($rows->total() > 0)
        @foreach($rows as $row)

            @if($layout == 'grid')
                <div class="col-lg-4 col-sm-6">
                    @include('Boat::frontend.layouts.search.loop-grid-2')
                </div>
            @else
                <div class="col-12">
                    @include('Boat::frontend.layouts.search.loop-list')
                </div>
            @endif
        @endforeach
    @else
        <div class="col-lg-12">
            {{__("Boat not found")}}
        </div>
    @endif
</div>

<div class="bravo-pagination">
    {{$rows->appends(request()->query())->links()}}
    @if($rows->total() > 0)
        <div class="text-center mt-30 md:mt-10">
            <div class="text-14 text-light-1">{{ __("Showing :from - :to of :total boats",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</div>
        </div>
    @endif
</div>

