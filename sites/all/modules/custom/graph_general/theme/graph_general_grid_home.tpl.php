<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    	<?php $i=1; ?>
	  	<?php foreach ($data['values'] as $key => $item): ?>
	  		<?php if($i==1): ?>
		        <div class="item active">
		            <img src="<?php print $item['grid_path_foto'] ?>" alt="">
		        </div>
	        <?php else: ?>
		        <div class="item">
		            <img src="<?php print $item['grid_path_foto'] ?>" alt="">
		        </div>
	       <?php endif; ?>
	       <?php $i++ ?>
	    <?php endforeach; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
               