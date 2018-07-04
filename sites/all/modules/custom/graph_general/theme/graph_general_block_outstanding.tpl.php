<?php if(!empty($data)) : ?>
	<?php foreach ($data as $key => $item): ?>
		<img class="img-responsive  margin-bottom-15 border-transitions-1  pull-float-left margin-right-10" src="<?php print $item['image']; ?>" alt="">
		<div class="margin-bottom-15">
		  <a href="<?php print $item['url']; ?>" class="" ><?php print $item['title']; ?></a>
		  <p class="font-size-12"><?php print $item['body_summary']; ?>..</p>
		</div>
	<?php endforeach ?>
<?php endif ?>