@if(!empty($list_item))
    <!-- Why Chose Us -->
	<section id="why-chose" class="whychose_us bgc-f7 pb30">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-title text-center">
                        <h2>{{$title ?? ''}}</h2>
                        <p>{{$desc ?? '' }}</p>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach($list_item as $key=>$item)
                    <div class="col-sm-6 col-lg-3">
                        <a href="{{$item['link_more']}}" class="btn btn-default w100">
                            @php 
                                $img = "";
                                if(!empty($item['bg_image_item']))  
                                $img = get_file_url($item['bg_image_item'],'full') 
                            @endphp
                            <div class="icon_hvr_img_box" style="background-image: url({{ $img }});">
                                <div class="overlay">
                                    @if(!empty($item['featured_icon']))
                                        <div class="icon">
                                            <span class="{{$item['featured_icon']}}"></span>
                                        </div>
                                    @endif
                                    <div class="details">
                                        <h4>{{$item['title']}}</h4>
                                        <p>{!! $item['desc'] !!}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
			</div>
		</div>
	</section>
@endif