<div class="row">
	<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 margin-bottom-15">
		<h3 class="h4 backgroun-color-968b7c padding-top-15 padding-bottom-15 text-white text-center">CONTENIDO RELACIONADO</h3>
		<?php $pathThumb = base_path() . drupal_get_path('theme', 'best_responsive') . '/images/lapiceros.png'; ?>
		<?php $data =array(1,2,3,4) ?>
		<?php foreach ($data as $key => $value): ?>
			<div class="side-lef border-top">
				<div class="img-relateds">
					<a href="#">
						<img class="float-lg-left-12 margin-right-10 img-thumbnail" src="<?php print $pathThumb; ?>" alt="">
						<div class="details">
						<h4 class="text-409086 texthover-409086">Retractable ball pen list Add to Cart</h4 cjass="text-409086">
						</div>
					</a>
					<span class="h4">Precio</span> :  <span class="h4 font-color-e33b01">s/. 10</span>
				</div>
			</div>
			<div class="clearfix"></div>
		<?php endforeach ?>
		<div class="clearfix"></div>
	</div>
</div>