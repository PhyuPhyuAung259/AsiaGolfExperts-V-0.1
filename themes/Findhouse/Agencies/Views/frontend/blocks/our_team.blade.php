@if($list_item)
<section class="our-team bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title text-center">
                    <h2>{{ $title }}</h2>
                    <p>{{ $desc ? $desc : '' }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="team_slider">
                    @foreach($list_item as $item)
                        <?php $image_url = get_file_url($item['avatar'], 'full') ?>
                        <div class="item">
                            <div class="team_member">
                                <div class="thumb">
                                    <img class="img-fluid" src="{{ $image_url }}" >
                                    <div class="overylay">
                                        <ul class="social_icon">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4>{{ $item['name'] }}</h4>
                                    <p>{{ $item['type'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif