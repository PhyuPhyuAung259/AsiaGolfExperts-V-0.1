<?php
use App\Helpers\Assets;
$random = Str::random(5);
;?>
<!-- Home Design -->
<section class="home-two p0">
	<div class="container-fluid p0">
		<div class="row">
			<div class="col-lg-12">
				<div class="home_two_map">
					<div class="map-canvas skin2 h660" id="bravo_results_map{{$random}}"></div>
				</div>
			</div>
		</div>
	</div>
</section>
@if(!empty($markers))
    <?php
    $str = "
				var markers_".$random." = ".json_encode($markers)."
				var mapEngine = new BravoMapEngine('bravo_results_map".$random."',{
				fitBounds:true,
				center:[51.505, -0.09],
				zoom:6,
				disableScripts:true,
				ready: function (engineMap) {
					engineMap.addMarkers2(markers_".$random.");
				}
			});";
    Assets::registerJs($str, true, 10, false, true);
    ;?>
@endif
