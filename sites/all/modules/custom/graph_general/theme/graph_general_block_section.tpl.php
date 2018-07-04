<div class="row">
	<div class="col-lg-12">
		<h3 class="h4 backgroun-color-968b7c padding-top-15 padding-bottom-15 text-white text-center">TAZAS</h3>
	</div>
</div>
	<div class="row">
	<?php $data =array(1,2,3,4) ?>
	<?php foreach ($data as $key => $value): ?>
		<div class="col-lg-4 col-md-4 col-sm-6  col-xs-12 text-center center-block margin-bottom-30">
			<div class="img-thumbnail  ">
				<a class ="" href="#">
					<img class="img-responsive center-block border-transitions-1" src="<?php print base_path() . drupal_get_path('theme', 'best_responsive') . '/images/produc.png'; ?>" alt="">
				</a>
				<div class="border-top" >
					<a href="#" class="h5" >Es un hecho establecido</a>
					<p class="text-muted">Es un hecho establecido hace demasiado tiempo.</p>
				</div>
			</div>
		</div>
	<?php endforeach ?>
	</div>