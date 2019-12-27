<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Betheme
 * @author Navtej Singh
 * @link http://muffingroup.com
 */
$_GET['blue-logo-menus'] = 1;
get_header();
$site_url = get_site_url();
?>
<!-----------------html start --------------->

<section class="main-blog-page post-blog-page">
		<div class="blog-left">
			<div class="post-blog test">
				<?php
					$term = get_queried_object();
					$categories = get_the_terms($term->ID,'casestudy_category');
					if($categories){
						foreach( $categories as $category){
								if($category->parent != 0)
								{ ?>
								<a href="" class="category">
								<?php
									echo $name = $category->name;
								} ?>
								</a>
								<?php
						}
					}
				?>
				<?php
					//foreach ($name as $key => $value) { ?>
						<!-- <a href="" class="category"> -->
					<?php
						//echo $value;
					?>
						<!-- </a> -->
				<?php
					//}
				?>
				<!-- <a href="" class="category"> -->
				<?php
					//echo implode(',',$name);
				?>
				<!-- </a> -->
				<h2><?php echo get_the_title(); ?></h2>
				 <div class="author">

					<!-- <img src="http://18.232.244.255/wp-content/uploads/2019/12/user-1.jpg" alt="author"> -->
					
					<?php
							$author_image_url = get_field('author_image');
							if($author_image_url){
						?>
						<img src="<?php echo $author_image_url['url']; ?>" alt="author">
						<?php
							}else{ ?>
						<img src="/wp-content/uploads/2019/12/user-1.jpg" alt="author">		
						<?php	}
						?>
					<span><?php echo the_author_meta( 'display_name' , $post->post_author ); ?></span>
					<span class="date"><?php echo get_the_date(); ?></span>
				</div>  
				<?php
					$url = wp_get_attachment_url( get_post_thumbnail_id() );
				?>
				<?php if( !empty($url) ): ?>
				<div class="postImg" style="background-image: url(<?php echo $url;  ?>); "></div>
				<!--<img src="<?php //echo $url;  ?>"  class="article-img" alt="">-->
				<?php endif;  ?>
				<div class="content">
					<p><?php echo get_post_field('post_content', $post->ID); ?></p>
				</div>

			</div>
				<div class=backToList><a href="/case-study/">Back To List</a></div>
			<hr class="bordr">

			<div class="tag-space-left">
				<?php
				// $tags = get_tags(array(
				// 	  'hide_empty' => true
				// ));
				$tags = get_the_terms( $term->ID, 'casestudy_tag');
				if($tags){
					foreach ($tags as $tag) {
					?>
					<?php /*<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><span class="colSpan3" style="width:20%;"> <?php echo $tag->name;  ?> </span></a> */ ?>
					<span class="colSpan3" style="width:20%;">
					<?php
						echo $tag->name;
					?>
					</span>
					<?php
					}
				}
				?>
			</div>
			<div class="tag-space-right">
				<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
			</div>
		</div>

<div id="helloWorld" style="height: 2px;clear: both;"></div>
<div class="blog-post-bottom-section">
	<a href="<?php home_url();  ?>/contact" >
	<div class="post-bottom-left">
		<img class="logo-sticky scale-with-grid" src="http://18.232.244.255/wp-content/uploads/2018/07/logo-colored.png" data-retina="http://18.232.244.255/wp-content/uploads/2018/07/logo-colored.png" data-height="810" alt="logo-colored" pagespeed_url_hash="2313240229">
	</div>

	<div class="post-bottom-right">
		<h4> Full-service data transformation to make it easy to get from raw data to insights.</h4>
		<button  class="ContactDetailBtn"> Contact </button>
	</div>
  </a>
</div>


</section>
	
<div class="detail-recent-post clearfix">
	<hr class="bordr">
				<?php
					$args = array( 'post_type'=> 'post','numberposts' => '3','post_status' => 'publish' );
					$recent_posts = wp_get_recent_posts($args);
				?>
				<div class="main-title"> <h3> Recent posts </h3> </div>
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
						  <p><?php echo wp_trim_words( $recent['post_content'], 20, '...' ); ?></p></a>
						</div>
				</div>
				</div>
				<?php }  ?>
</div>



<?php get_footer();

// Omit Closing PHP Tags