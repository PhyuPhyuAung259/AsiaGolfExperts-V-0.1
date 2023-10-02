<section id="our-testimonials" class="our-testimonials">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title text-center">
                    <h2 class="mt0">{{$title ?? ''}}</h2>
                    <p>{{$sub_title ?? '' }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-xl-6 m-auto">
                <div class="testimonialsec">
                    <ul class="tes-nav">
                        @foreach ($list_item as $item)
                            <?php $avatar_url = get_file_url($item['avatar'], 'full'); ?>
                            <li>
                                <img class="img-fluid" src="{{ $avatar_url }}" alt="{{ $item['name'] }}"/>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="tes-for">
                        @foreach ($list_item as $item)
                        <li>
                            <div class="testimonial_item">
                                <div class="details">
                                    <h4>{{ $item['name'] ?? "" }}</h4>
                                    <span class="small text-thm">{{  $item['position'] ?? "" }}</span>
                                    <p>{{ $item['desc'] ?? "" }}</p>
                                    <p class="mt25">{{ $item['number_star'] ?? "" }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>