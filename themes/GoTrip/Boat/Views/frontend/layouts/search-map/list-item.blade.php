<div class="listing_items">
    <div class="bravo-list-item @if(!$rows->count()) not-found @endif">

        <div class="row y-gap-10 justify-between items-center pt-20">
            <div class="col-auto">
                <div class="text-18 fw-500">
                    @if($rows->total() > 1)
                        {{ __(":count boats found",['count'=>$rows->total()]) }}
                    @else
                        {{ __(":count boat found",['count'=>$rows->total()]) }}
                    @endif
                </div>
            </div>

            <div class="col-auto">
                @include('Boat::frontend.layouts.search.orderby', ["hidden_map_button" => true])
            </div>
        </div>

        @if($rows->count())
            <div class="row y-gap-20 pt-20">
                @foreach($rows as $row)
                    <div class="col-12">
                        @include('Boat::frontend.layouts.search.loop-list')
                    </div>
                @endforeach
            </div>

            <div class="goTrip-bravo-pagination">
                {{$rows->appends(array_merge(request()->query(),['_ajax'=>1]))->links()}}
                @if($rows->total() > 0)
                    <div class="text-center mt-30 md:mt-10">
                        <div class="text-14 text-light-1">{{ __("Showing :from - :to of :total boats",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</div>
                    </div>
                @endif
            </div>
        @else
            <div class="not-found-box">
                <h3 class="n-title">{{__("We couldn't find any boats.")}}</h3>
                <p class="p-desc">{{__("Try changing your filter criteria")}}</p>
                {{--<a href="#" onclick="return false;" click="" class="btn btn-danger">{{__("Clear Filters")}}</a>--}}
            </div>
        @endif
    </div>
</div>
