<!-- Start Partners -->
<section class="start-partners bgc-thm pt50 pb50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="start_partner tac-smd">
                    <h2>{{$title ?? ""}}</h2>
                    <p>{{$sub_title ?? ""}}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="parner_reg_btn text-right tac-smd">
                    @if($link_title)
                        <a class="btn btn-thm2" href="{{$link_more}}">{{$link_title}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
