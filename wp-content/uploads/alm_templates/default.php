<div class="filter-item filter <?php echo $category->slug; ?>">
		                <a href="<?php the_permalink();  ?>"><img src="http://fakeimg.pl/365x365/" class="filter-image">
		                <div class="filter-item-overlap"><h3><span><?php the_title(); ?></span></h3><h4><?php echo $category->name; ?></h4></div></a>
		            </div>