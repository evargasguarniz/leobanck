<?php if(!empty($data)) : ?>
	<div class="row">
		<div class="col-lg-6 col-md-6  col-sm-6 col-xs-12 margin-bottom-30 " >
			<div class="flexslider-internal text-center">
			  <div class="img-thumbnail margin-bottom-15">
			  	<?php $pathThumb = base_path() . drupal_get_path('theme', 'best_responsive') . '/images/thumbail_1.png'; ?>
			      <img src="<?php print $data['image']; ?>" />
			   </div>
				<div class="">
					<?php if(!empty($data['dataImages'])) : ?>
						<?php foreach ($data['dataImages'] as $key => $item2): ?>
							<div class="img-thumbnail margin-bottom-15">
								<img data-image = "<?php print $item2['imagePreset']; ?>" src="<?php print $item2['imageThumbanil']; ?>" alt="">
							</div>
						<?php endforeach ?>
					<?php endif ?>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6  col-sm-6 col-xs-12 ">
			<div class="page-internal-title">
				<h4 class="text-409086"><?php print $data['title']; ?></h4>
			</div>
			<div class="price-product">
				<span class="h4"><?php print $data['price']; ?></span> :  <span class="h4 font-color-e33b01">s/. 10</span>
			</div>
			<?php print $data['body']; ?>
		</div>
	</div>
<?php endif ?>