<div class="row y-gap-30">
    <div class="col-xl-3 col-lg-4">
        @include('Flight::frontend.layouts.search.filter-search')
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="bravo-list-item">
            <div class="row y-gap-10 justify-between items-center">
                <div class="col-auto">
                    <div class="text-18"><span class="fw-500">
                             @if($rows->total() > 1)
                                {{ __(":count flights found",['count'=>$rows->total()]) }}
                            @else
                                {{ __(":count flight found",['count'=>$rows->total()]) }}
                            @endif
                           </span>
                    </div>
                </div>

                <div class="col-auto">
                    @include('Flight::frontend.layouts.search.orderby')

                </div>
            </div>
            <div class="list-item" id="flightFormBook">
                <div class="row">
                    @if($rows->total() > 0)
                        @foreach($rows as $row)
                            <div class="col-12">
                                @include('Flight::frontend.layouts.search.loop-grid')
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            {{__("Flight not found")}}
                        </div>
                    @endif
                </div>
            </div>
            @include('Flight::frontend.layouts.search.modal-form-book')

            <div class="bravo-pagination">
                {{$rows->appends(request()->query())->links()}}
                @if($rows->total() > 0)
                    <div class="text-center mt-30 md:mt-10">
                        <span class="count-string text-14 text-light-1">{{ __("Showing :from - :to of :total Flights",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
