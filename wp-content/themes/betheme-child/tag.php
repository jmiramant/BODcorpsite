<?php
get_header();
$page = get_page_by_title('Blue Orange Blog');
$url = wp_get_attachment_url( get_post_thumbnail_id($page->ID) );
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

	<section class="main-blog-page clearfix">
	<div class="blog-left">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
					the_post();
					$url = wp_get_attachment_url( get_post_thumbnail_id() );
			?>
			<div class="main-article">
				<div class="article-inner">
				<?php if( !empty($url) ): ?>
				<a href="<?php the_permalink();  ?>"><img class="article-main" src="<?php echo $url; ?>" alt="article"></a>
				<?php endif;  ?>
				<div class="article-content">
					<a href="" class="category">
					<?php 
						$categories = get_the_category(); 
						$name = [];
						foreach( $categories as $category){
							if($category->category_parent != 0 )
							{
								$name[] = $category->name;
							}
						} 
						echo implode(',',$name); 
					?>
					</a>				
					<a href="<?php the_permalink();  ?>"><h3><?php the_title();  ?></h3>
					<p><?php echo limit_words(get_the_excerpt(), '40').' ...';  ?></p></a>
				<hr class="border-bottom"> </hr>
				<div class="article-bottom">
					<div class="author">
						<img src="/wp-content/uploads/2019/12/user-1.jpg" alt="author">
						<span><?php echo $aut = get_the_author_meta('display_name'); ?> </span><span class="date"><?php echo get_the_date(); ?></span>
					</div>
					<div class="like">
						<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
					</div>
				</div>
				</div>
				</div>
			</div>
			<?php
				endwhile; 
				endif;
			?>
			<nav class="pagination">
		        <?php wp_pagenavi(); ?>
		    </nav>	
		</div>
		<div class="blog-right">
			<div class="right-top">
				<h2>Categories</h2>
				<?php 
					$categories = get_categories( array(
						'post_type'=> 'post',
					    'orderby' => 'name',
					    'order'   => 'ASC',
					    'post_status' => 'publish',
					    'parent' => 26
					) );
				?>
				<div class="category-inner">
			
			<ul>
				<li><a href="/blue-orange-blog/" class="all"><span class="span-left">All</span></a></li>
				<?php 
					$term = get_queried_object();
					foreach ($categories as $category) {
						if($category->category_parent != 0){  
							$cat_slug = get_category_link( $category->term_id );
				?>
				<li><a href="<?php echo $cat_slug; ?>"><span class="span-left"><?php echo $category->name;  ?></span><span> <?php echo $category->category_count;  ?></span></a></li>
				<?php
						}
					}
				?>
			</ul>
		</div>
		</div>
		<?php  /* <div class="recent-posts">
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
		</div> */ ?>
		<div class="right-tags">
			<h2 class="tags">Tags</h2>
			<div class="tag-space-left">
				<?php
					$tags = get_tags(array(
					  'hide_empty' => true
					));
					$term = get_queried_object();
					foreach ($tags as $tag) {
				?>
					<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="<?php echo $tag->slug == $term->slug? 'active' : '';  ?>"><span class="colSpan3" style="width:20%;"> <?php echo $tag->name;  ?> </span></a>
				<?php
					}
				?>
			</div>
		</div>
		</div>
	</section>
<div id="helloWorld" style="height: 2px;clear: both;padding-bottom: 70px;"></div>
<?php
get_footer();
?>