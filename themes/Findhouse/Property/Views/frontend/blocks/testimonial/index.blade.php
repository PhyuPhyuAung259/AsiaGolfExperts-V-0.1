@if ($list_item)
<!-- Our Testimonials -->
<section id="our-testimonials" class="our-testimonial"  style="background-image: url('{{$bg_image_url}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title text-center">
                    <h2 class="color-white">{{$title ?? ''}}</h2>
                    <p class="color-white">{{$sub_title ?? '' }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="testimonial_grid_slider">
                    @foreach ($list_item as $item)
                    <?php $avatar_url = get_file_url($item['avatar'], 'full'); ?>
                    <div class="item">
                        <div class="testimonial_grid">
                            <div class="thumb">
                                <img src="{{ $avatar_url }}" alt="{{ $item['name'] ?? '' }}">
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
@endif
