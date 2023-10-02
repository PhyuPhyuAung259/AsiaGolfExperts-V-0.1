<div class="listing_items">
    <div class="bravo-list-item @if(!$rows->count()) not-found @endif">
        <div class="row y-gap-10 justify-between items-center pt-20">
            <div class="col-auto">
                <div class="text-18">
                    <span class="fw-500">
                        @if($rows->total() > 1)
                            {{ __(":count events found",['count'=>$rows->total()]) }}
                        @else
                            {{ __(":count event found",['count'=>$rows->total()]) }}
                        @endif</span>
                </div>
            </div>
            <div class="col-auto">
                @include('Event::frontend.layouts.search-map.orderby')
            </div>
        </div>

        <div class="y-gap-20 pt-20">
            @if($rows->count())

            <div class="row gotrip-map-list-items">
                @foreach($rows as $row)
                    <div class="col-12">
                        @include('Event::frontend.layouts.search.loop-list')
                    </div>
                @endforeach
            </div>

            <div class="bravo-pagination">
                {{$rows->appends(array_merge(request()->query(),['_ajax'=>1]))->links()}}
            </div>

            @else
                <div class="not-found-box">
                    <h3 class="n-title">{{__("We couldn't find any events.")}}</h3>
                    <p class="p-desc">{{__("Try changing your filter criteria")}}</p>
                </div>
            @endif
        </div>
    </div>
</div>
