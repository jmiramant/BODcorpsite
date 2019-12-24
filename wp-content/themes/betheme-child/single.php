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
?>
<!-----------------html start --------------->

<section class="main-blog-page post-blog-page">
		<div class="blog-left">
			<div class="post-blog">
				<?php
					$categories = get_the_category();
					foreach( $categories as $category){
						if($category->category_parent == 48 || $category->category_parent == 50 )
						{ ?>
						<a href="" class="category">
						<?php
							echo $name = $category->name;
						} ?>
						</a>
						<?php
					}
				?>
				<?php
					foreach ($name as $key => $value) { ?>
						<a href="" class="category">
					<?php
						echo $value;
					?>
						</a>
				<?php
					}
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
			<?php
				foreach( $categories as $category){
					if($category->name == 'Blog'){ ?>
						<div class=backToList><a href="/blue-orange-blog/">Back To List</a></div>
				<?php	}elseif ($category->name == 'Case Study') { ?>
						<div class=backToList><a href="/case-study/">Back To List</a></div>
				<?php	}
				}
			?>
			
			<hr class="bordr">

			<div class="tag-space-left">
				<?php
				$tags = get_tags(array(
					  'hide_empty' => true
				));
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
				?>
			</div>
			<div class="tag-space-right">
				<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
			</div>
		</div>
		<?php /* <div class="blog-right">
			<div class="right-top">
			<h2>Categories</h2>
			<?php 
				$categories = get_categories( array(
					'post_type'=> 'post',
				    'orderby' => 'name',
				    'order'   => 'ASC',
				    'post_status' => 'publish'
				) );
			?>
			<div class="category-inner">
			<a href="" class="all"> All </a>
			<ul>
				<?php 
					foreach ($categories as $category) {
						$cat_slug = get_category_link( $category->term_id );
				?>
				<a href="<?php echo $cat_slug; ?>"><li><?php echo $category->name;  ?><span> <?php echo $category->category_count;  ?></span> </li></a>
				<?php
					}
				?>
			</ul>
		</div>
		</div>
		<div class="recent-posts">
				<?php
					$args = array( 'post_type'=> 'post','numberposts' => '3','post_status' => 'publish' );
					$recent_posts = wp_get_recent_posts($args);
				?>
				<h2>Recent Posts</h2>
				<?php  
				foreach( $recent_posts as $recent ){	
				?>
					<div class="post">
						<div class="post-img">
							<?php
							$post_url = get_permalink($recent["ID"]);
							if ( has_post_thumbnail( $recent["ID"]) ) { 
							?>
							<a href="<?php echo $post_url;  ?>">
							<?php echo  get_the_post_thumbnail($recent["ID"],'thumbnail'); ?>
								</a>
							<?php }  ?>
						</div>
						<div class="post-right-text">
							<a href="<?php echo $post_url;  ?>"><h4><?php echo $recent['post_title']; ?></h4></a>
							<p><?php
							 	$dat = $recent['post_date'];
								echo $newDate = date('F d, Y', strtotime($dat)); 
							 ?></p>
						</div>
					</div>
				<?php }  ?>
				</div>
		<div class="right-tags">
			<h2 class="tags">Tags</h2>
			<div class="tag-space-left">
				<?php
					$tags = get_tags(array(
					  'hide_empty' => true
					));
					foreach ($tags as $tag) {
				?>
					<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><span class="colSpan3" style="width:20%;"> <?php echo $tag->name;  ?> </span></a>
				<?php
					}
				?>
			</div>
		</div>

		</div> */ ?>

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
									$slug = $cd->slug;
									if($cd->category_parent == 48){
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
						  <?php /*<div class="detail-card-date"><?php
								 	$dat = $recent['post_date'];
									//echo $newDate = date('F d, Y', strtotime($dat)); 
							?></div> */ ?>
						</div>
				</div>
				</div>
				<?php }  ?>
</div>



<?php get_footer();

// Omit Closing PHP Tags