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
	?>	
	<section class="full-wrapper-section main-blog-page clearfix">
		<div class="blog-left">
			<?php
			$blog_cats = get_categories();
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$term_ids = [];
			foreach($blog_cats as $blog_cat){
					wp_reset_query();
						$term_ids[] = $blog_cat->term_id;
			}
						$blog_args = array('post_type' => 'post',
							'paged' => $paged,
					        'tax_query' => array(
					            array(
					                'taxonomy' => 'category',
					                'field' => 'term_id',
					                'terms' => $term_ids,
					            ),
					        ),
					     );
					$loop = new WP_Query($blog_args);	

				if ( $loop-> have_posts() ) :
					while ( $loop->have_posts() ) : $loop->the_post();
						$url = wp_get_attachment_url( get_post_thumbnail_id() );
			?>
			<div class="main-article">
				<div class="article-inner">
				<a class="postImg" style="background-image: url(<?php echo isset($url) ? $url : '';  ?>); " href="<?php the_permalink();  ?>"></a>
					<div class="article-content">
						<?php
							$blog_terms = get_the_category();
							foreach($blog_terms as $blog_term){
								if($blog_term->category_parent != 0){
						?>	
						<p class="category">
						<?php
							echo $blog_term->name;
						?>	
						</p>
						<?php
								}
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
						endwhile;
					endif; ?>
		<nav class="pagination">
	        <?php pagination_bar( $loop ); ?>
	    </nav>
		</div>  
		
	</section>
	<!-- <div id="helloWorld" style="height: 2px;clear: both;padding-bottom: 70px;"></div> -->
	<div class="detail-recent-post Case clearfix">
		<div class="main-title"> <h3> Case Studies </h3> </div>
		<div class="recent-row">
				<?php
				$args = array( 'post_type'=> 'casestudy','numberposts' => '3','post_status' => 'publish' );	
				$recent_posts = wp_get_recent_posts($args);
					foreach( $recent_posts as $recent ){
						$post_url = get_permalink($recent["ID"]);
						$img_url = wp_get_attachment_url( get_post_thumbnail_id($recent["ID"]) );
				?>
				<div class="detail-recent-box">
				<div class="detail-recent-box-inner">
					<a class="postImg" style="background-image: url(<?php echo isset($img_url) ? $img_url : '';  ?>);" href="<?php echo $post_url;  ?>"></a>		
					<div class="article-content detail-card-content tst">
						<?php 
							$category_detail = get_the_terms($recent["ID"],'casestudy_category');
							foreach($category_detail as $cd){
								if($cd->parent != 0){
									$rec_cat_name = $cd->name;
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
					</div>
				</div>
				</div>
				<?php }  ?>
			</div>
	</div>
	<div class="otherService clearfix">
	       <div class="container">
	       	<div class="other-inner-service">
				<div class="otherLeft">
					<h6> Other Services </h6>
					<h3> Looking for something else? </h3>
					<p> Wondering how we can tailor our expertise to help your company unlock your data? Tell us about your project.</p>
					
				</div>
				<div class="otherRight">
					<div class="contactButton"> <a href="/contact/"> Contact Us </a> </div> 
				</div>
			</div>
		</div>
	  </div>
<?php get_footer();  ?>