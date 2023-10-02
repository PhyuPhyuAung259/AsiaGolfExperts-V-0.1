<div class="sidebar_search_widget">
    <div class="blog_search_widget">
        <form method="get" class="search" action="{{ url(app_get_locale(false,false,'/').config('news.news_route_prefix')) }}">
            <div class="input-group">
                <input type="text" class="form-control" value="{{ Request::query("s") }}" name="s" placeholder="{{__("Search Here")}}" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><span class="flaticon-magnifying-glass"></span></button>
                </div>
            </div>
        </form>
    </div>
</div>