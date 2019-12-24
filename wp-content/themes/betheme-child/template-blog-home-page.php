<?php /* Template Name: Blog Home Page */ ?>

<?php
get_header();
$page = get_page_by_title('Blue Orange Blog');  
$url = wp_get_attachment_url( get_post_thumbnail_id($page->ID) );
$site_url = get_site_url();
?>

<section class="blog-banner" style="background-image: url('<?php echo $url;  ?>'); background-size: cover;
    background-position: center bottom;
    background-repeat: no-repeat;">
		<div class="blue-blog-banner">
			<h2><?php echo $title = get_the_title($page->ID); ?></h2>
			<?php 
				$query = get_post($page->ID); 
				$content = apply_filters('the_content', $query->post_content);
				echo $content; 
			?>
		</div>
</section>
	<?php
		$all_categories = get_categories(array('order' => 'DSC'));
		$top_categories_ids = [];
		foreach( $all_categories as $category ) {
			if( ! $category->parent ) {
		    	$top_categories_ids[] = $category->term_id;
			}
		}
		$blog_category_id[] = $top_categories_ids[1];
	?>	
	<section class="full-wrapper-section main-blog-page clearfix">
		<?php  /*<div class="sidebar-left">
			<div class="right-top">
				<?php
					foreach ($all_categories as $category) {
						if( in_array( $category->parent, $blog_category_id )) {
				?>
				<h2><?php echo $category->name;  ?></h2>
				<div class="category-inner" id="all-categories">
				  <label class="check-contain">All
					  <input type="checkbox" checked="checked" class="br" id="all-chk" data-category="<?php echo $category->name;  ?>">
					  <span class="checkmark"></span>
				  </label>
				  <?php  
			  		$sub_sub_categories = get_categories( array('child_of' => $category->term_id,'order' => 'DSC') );
			  		foreach ($sub_sub_categories as $sub_sub_category) {
				  ?>
				  <label class="check-contain"><?php echo $sub_sub_category->name;  ?>
					  <input type="checkbox" name="<?php echo $category->name;  ?>" value="<?php echo $sub_sub_category->name;  ?>" id="<?php echo $sub_sub_category->term_id;  ?>" parent-id="<?php echo $category->term_id;  ?>" class="br sub-cats">
					  <span class="checkmark"></span>
				  </label>
				  <?php
				  	}	
				  ?>
				  <a class="clear-btn">Clear</a>
				</div>
				<br> <br>
				<?php
						}
					}
				?>
			</div>
		
			<!-- <div class="right-tags">
				<h2 class="tags">Industries</h2>
				<div class="tag-space-left">
					<label class="check-contain">All
						  <input type="checkbox" checked="checked">
						  <span class="checkmark"></span>
					  </label>
					  <label class="check-contain">Modern Data pipelines & infrastructure
						  <input type="checkbox">
						  <span class="checkmark"></span>
					  </label>
					  <label class="check-contain">Predictive Modeling & Advanced Analytics
						  <input type="checkbox">
						  <span class="checkmark"></span>
					  </label>
					  <a class="clear-btn">Clear</a>
				</div>
			</div> -->
			<button class="reset-btn"> Reset</button>
		</div> */ ?>
		<?php /*<div class="blog-left">
			<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				foreach ($all_categories as $category) {
						if( in_array( $category->parent, $blog_category_id )) {
							$sub_sub_categories = get_categories( array('child_of' => $category->term_id,'order' => 'DSC') );
							foreach ($sub_sub_categories as $sub_sub_category){
								
								$args = array( 'cat' => $sub_sub_category->term_id, 'post_type' => 'post', 'post_status' => 'publish','paged' => $paged,'posts_per_page' => 6,  );
	                			$query = new WP_Query($args);
	                			if ( $query-> have_posts() ) :
								while ( $query->have_posts() ) : $query->the_post();
								$url = wp_get_attachment_url( get_post_thumbnail_id() );							
			?>		
								<div class="main-article">
									<div class="article-inner">	
									<?php if( !empty($url) ): ?>
									<a class="postImg" style="background-image: url(<?php echo $url;  ?>); " href="<?php the_permalink();  ?>"></a>
									<?php endif;  ?>
										<div class="article-content">
											<a href="" class="category">
											<?php 
												$categories = get_the_category();
												$name = [];
												foreach( $categories as $category){
													if($category->category_parent != 0 )
													{
														$name = $category->name;
													}
												} 
												//echo implode(',',$name); 
												echo "Financial Services";
											?>
											</a>
											<a href="<?php the_permalink();  ?>"><h3><?php the_title();  ?></h3>
												<p><?php 
												echo limit_words(get_the_excerpt(), '20').' ...';  
												?></p></a>
											<hr class="border-bottom"> </hr>
										</div>	
									</div>
								</div>	
			<?php
								endwhile;
								?>
								<nav class="pagination">
						        <?php pagination_bar( $args ); ?>
						    	</nav>
								<?php
								endif;
						}
					}
				}
			?>
		</div> */ ?>

<!-- old blog posts div -->

		<?php 
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$case_study_id = get_cat_ID('Case Study');
			$child_categories = get_categories(
			    array( 'parent' => $case_study_id )
			);
			$exclude_ids[] = $case_study_id;
			foreach ($child_categories as $child_category) {
				$exclude_ids[] = $child_category->term_id;
			}
			if($site_url == 'http://18.232.244.255'){
				$terms = '26';
			}elseif ($site_url == 'http://34.226.240.9') {
				$terms = '11';
			}
				$args = array(
					'post_type'=> 'post',
					'orderby'    => 'date',
					'post_status' => 'publish',
					'order'    => 'DESC',
					'posts_per_page' => 9, // this will retrive all the post that is published 
					'paged'          => $paged,
					'tax_query' => [
			            [
			                'taxonomy' => 'category',
			                'field'    => 'term_id',
			                'terms'    => $terms,
			            ],
			        ],
					);
					$result = new WP_Query( $args );
			
			?>
		<div class="blog-left">
			<?php
				if ( $result-> have_posts() ) :
					while ( $result->have_posts() ) : $result->the_post();
						$url = wp_get_attachment_url( get_post_thumbnail_id() );
			?>
			<div class="main-article">
				<div class="article-inner">
				<a class="postImg" style="background-image: url(<?php echo isset($url) ? $url : '';  ?>); " href="<?php the_permalink();  ?>"></a>
					<div class="article-content">
						<?php 
							$category_detail = get_the_category($recent["ID"]);
							if($site_url == 'http://18.232.244.255'){
								foreach($category_detail as $cd){
										$slug = $cd->slug;
										if($cd->category_parent == 48){
											$name = $cd->name;
										}
								}
							}elseif ($site_url == 'http://34.226.240.9') {
								foreach($category_detail as $cd){
										$slug = $cd->slug;
										if($cd->category_parent == 13){
											$name = $cd->name;
										}
								}
							}
							if($name){
						?>	
						<p class="category">
						<?php
							echo $name;
						?>	
						</p>
						<?php
							}
						?>	
						<a href="<?php the_permalink();  ?>"><h3><?php the_title();  ?></h3>
						<p><?php 
						echo wp_trim_words( get_the_content(), 20, '...' );   
						?></p></a>
					<hr class="border-bottom"> </hr>
					</div>
				</div>
			</div>
			<?php
					endwhile; ?>
				<nav class="pagination">
			        <?php pagination_bar( $result ); ?>
			    </nav>	<?php
							endif;
						?>
		</div>  
		
	</section>
	<!-- <div id="helloWorld" style="height: 2px;clear: both;padding-bottom: 70px;"></div> -->
	<div class="detail-recent-post Case clearfix">
				<?php
					if($site_url == 'http://18.232.244.255'){
						$args = array( 'post_type'=> 'post','numberposts' => '3','post_status' => 'publish','tax_query' => [ [ 'taxonomy' => 'category','field'    => 'term_id','terms'    => '22', ] ], );
					}elseif ($site_url == 'http://34.226.240.9') {
						$args = array( 'post_type'=> 'post','numberposts' => '3','post_status' => 'publish','tax_query' => [ [ 'taxonomy' => 'category','field'    => 'term_id','terms'    => '12', ] ], );
					}
					
					$recent_posts = wp_get_recent_posts($args);
				?>
				<div class="main-title"> <h3> Case Studies </h3> </div>
				<?php
					foreach( $recent_posts as $recent ){
						$post_url = get_permalink($recent["ID"]);
						$categories = get_the_category( $recent["ID"] );
						$img_url = wp_get_attachment_url( get_post_thumbnail_id($recent["ID"]) );
				?>
				<div class="detail-recent-box">
				<div class="detail-recent-box-inner">
					<a class="postImg" style="background-image: url(<?php echo isset($img_url) ? $img_url : '';  ?>);" href="<?php echo $post_url;  ?>"></a>		
					<div class="article-content detail-card-content">
						<?php 
							$category_detail = get_the_category($recent["ID"]);
							foreach($category_detail as $cd){
									$slug = $cd->slug;
									if($site_url == 'http://18.232.244.255'){
										if($cd->category_parent == 50){
											$rec_cat_name = $cd->name;
										}
									}elseif ($site_url == 'http://34.226.240.9') {
										if($cd->category_parent == 14){
											$rec_cat_name = $cd->name;
										}
									}
							}
							if($rec_cat_name){
						?>
						<p class="category">
						<?php
							echo $rec_cat_name;
						?>		
						</p>
						<?php
							}
						?>
					  <a href="<?php echo $post_url;  ?>"><h3> <?php echo $recent['post_title']; ?> </h3>
					  <p><?php 
						echo wp_trim_words(  $recent['post_content'], 20, '...' );  
						?></p></a>
					<?php /*<div class="detail-card-date"><?php
							 	$dat = $recent['post_date'];
								//echo $newDate = date('F d, Y', strtotime($dat)); 
						?></div> */ ?>
					</div>
				</div>
				</div>
				<?php }  ?>
	</div>
	<div class="otherService clearfix">
	       <div class="container">
	       	<div class="other-inner-service">
				<div class="otherLeft">
					<h6> Other Services </h6>
					<h3> Looking for something else? </h3>
					<p> Wondring how we can tailor our expertise to help your company unlock your data? Tell us about your project.</p>
					
				</div>
				<div class="otherRight">
					<div class="contactButton"> <a href="/contact/"> Contact Us </a> </div> 
				</div>
			</div>
		</div>
	  </div>
<?php get_footer();  ?>