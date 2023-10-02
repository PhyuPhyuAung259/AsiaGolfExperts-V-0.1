@if($list_item)
<section id="our-partners" class="our-partners">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title text-center">
                    <h2>{{ $title }}</h2>
                    <p>{{ $desc }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($list_item as $item)
                <?php $link_image = get_file_url($item['avatar'], 'full')?>
            <div class="col-sm-6 col-md-4 col-lg">
                <div class="our_partner">
                    <img class="img-fluid" src="{{ $link_image }}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif