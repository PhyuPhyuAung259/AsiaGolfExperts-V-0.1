<!-- Our Testimonials -->
<section class="our-testimonials">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="main-title text-center mb20">
                    <h2>{{$title ?? ''}}</h2>
                    <p>{{$sub_title ?? '' }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="testimonial_grid_slider style2">
                    @foreach ($list_item as $item)
                        <?php $avatar_url = get_file_url($item['avatar'] ?? '', 'full'); ?>
                        <div class="item">
                            <div class="testimonial_grid style2">
                                <div class="thumb">
                                    @if(!empty($avatar_url))
                                        <img src="{{ $avatar_url }}" alt="{{ $item['name'] ?? '' }}">
                                    @endif
                                    <div class="tg_quote"><span class="fa fa-quote-left"></span></div>
                                </div>
                                <div class="details">
                                    <h4>{{ $item['name'] ?? "" }}</h4>
                                    <p>{{  $item['position'] ?? "" }}</p>
                                    <p class="mt25">{{ $item['desc'] ?? "" }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
