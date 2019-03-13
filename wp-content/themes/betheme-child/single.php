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

<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
		<div class="sections_group">

				<div class="wrapper-study2 txt-f-center">
                    <h1 class="main-blog-titlle"><?php echo get_the_title(); ?></h1>
                    <div class="sub-blog-titlle"><?php the_excerpt(__('')); ?></div>
                    <div class="blog-authorr"><?php echo the_author_meta( 'display_name' , $post->post_author ); ?></div>
                    <div class="blog-post-date"><?php echo get_the_date(); ?></div>
                </div>

                <div class="section_wrapper mcb-section-inner blog-feature-post blog-feature-post blog-up-detail">
                    <div class="detals-blogie"><?php echo get_post_field('post_content', $post->ID); ?></div>
                    <div class="detals-blogie-img"><img src="<?php echo get_the_post_thumbnail_url(); ?>" /></div>
			<?php
			
				/*if( get_post_meta( get_the_ID(), 'mfn-post-template', true ) == 'builder' ){
						
					// Template | Builder -----------------------------------------------
						
					$single_post_nav = array(
						'hide-sticky'	=> false,
						'in-same-term'	=> false,
					);
						
					$opts_single_post_nav = mfn_opts_get( 'prev-next-nav' );
					if( isset( $opts_single_post_nav['hide-sticky'] ) ){
						$single_post_nav['hide-sticky'] = true;
					}
						
					// single post navigation | sticky
					if( ! $single_post_nav['hide-sticky'] ){
						if( isset( $opts_single_post_nav['in-same-term'] ) ){
							$single_post_nav['in-same-term'] = true;
						}
							
						$post_prev = get_adjacent_post( $single_post_nav['in-same-term'], '', true );
						$post_next = get_adjacent_post( $single_post_nav['in-same-term'], '', false );
							
						echo mfn_post_navigation_sticky( $post_prev, 'prev', 'icon-left-open-big' );
						echo mfn_post_navigation_sticky( $post_next, 'next', 'icon-right-open-big' );
					}
						
				
					while( have_posts() ){
						the_post();							// Post Loop
						mfn_builder_print( get_the_ID() );	// Content Builder & WordPress Editor Content
					}
						
				} else {
						
					// Template | Default -----------------------------------------------
						
					while( have_posts() ){
						the_post();
						get_template_part( 'includes/content', 'single' );
					}
	
				}*/

			?>
		</div>
		
		<!-- .four-columns - sidebar -->
		<?php //get_sidebar(); ?>

		</div>
			
	</div>
</div>

<?php get_footer();

// Omit Closing PHP Tags