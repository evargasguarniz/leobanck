	<?php if(!empty($sections)) : ?>
		<div class="row">
			<?php  $cn = 1; ?>
				<?php foreach ($sections as $key => $item): ?>
					<?php if($cn == 1 ) : ?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center margin-bottom-30">
							<a class ="btn-block text-white padding-top-15 padding-bottom-15 background-color-ff9000 background-color-ff9000hover" href="<?php print $item['url_seccion']; ?>">
								<span class="h2">01 <?php print $item['title_section']; ?></span>
								<p><?php print strip_tags($item['description']); ?></p>
							</a>
						</div>
					<?php elseif($cn == 2 ) : ?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center margin-bottom-30">
							<a class ="btn-block text-white padding-top-15 padding-bottom-15 background-color-64c4b8 background-color-64c4b8hover " href="<?php print $item['url_seccion']; ?>">
								<span class="h2">02 <?php print $item['title_section']; ?></span>
								<p><?php print strip_tags($item['description']); ?></p>
							</a>
						</div>
					<?php elseif($cn == 3 ) : ?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center margin-bottom-30">
							<a class ="btn-block text-white padding-top-15 padding-bottom-15 background-color-e82d50 background-color-e82d50hover" href="<?php print $item['url_seccion']; ?>">
								<span class="h2">03. <?php print $item['title_section']; ?></span>
								<p><?php print strip_tags($item['description']); ?></p>
							</a>
						</div>
					<?php endif; ?>
				<?php $cn++; ?>
				<?php endforeach; ?>
		</div>
	<?php endif ?>
	
		<div class="row">
			<?php foreach ($data as $key => $item): ?>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center center-block margin-bottom-30">
					<div class="img-thumbnail padding-top-15 ">
						<a class ="" href="<?php print $item['url']; ?>">
							<img class="img-responsive center-block border-transitions-1" src="<?php print $item['image']; ?>" alt="">
						</a>
						<div class="border-top" >
							<a href="<?php print $item['url']; ?>" class="h5" ><?php print $item['title']; ?></a>
							<p class="text-muted"><?php print strip_tags($item['body_summary']); ?></p>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>