<section class="layout-pt-md layout-pb-lg">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                @include('Tour::frontend.layouts.search.filter-search')
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="row y-gap-10 items-center justify-between">
                    <div class="col-auto">
                        <div class="text-18">
                            <span class="fw-500">
                                @if($rows->total() > 1)
                                    {{ __(":count tours found",['count'=>$rows->total()]) }}
                                @else
                                    {{ __(":count tour found",['count'=>$rows->total()]) }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="row x-gap-20 y-gap-20">
                            @include('Tour::frontend.layouts.search.orderby')
                        </div>
                    </div>
                </div>
                @if($layout == 'grid')
                    <div class="border-top-light mt-30 mb-30"></div>
                @else
                    <div class="mt-30"></div>
                @endif
                <div class="row y-gap-30">
                    @if($rows->total() > 0)
                        @foreach($rows as $row)
                            @if($layout == 'grid')
                                <div class="col-lg-4 col-sm-6">
                                    @include('Tour::frontend.layouts.search.loop-grid')
                                </div>
                            @else
                                <div class="col-12">
                                    @include('Tour::frontend.layouts.search.loop-list')
                                </div>
                            @endif

                        @endforeach
                    @else
                        <div class="col-lg-12">
                            {{__("Tour not found")}}
                        </div>
                    @endif
                </div>
                <div class="bravo-pagination">
                    {{$rows->appends(request()->query())->links()}}
                    @if($rows->total() > 0)
                        <div class="text-center mt-30 md:mt-10">
                            <div class="text-14 text-light-1">{{ __("Showing :from - :to of :total Tours",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
