<?php
/**
 * Template Name: Landing Page Template
 * Description: A Page Template that display Talent acquisition.
 *
 * @package Betheme
 * @author Muffin Group
 */
$_GET['blue-logo-menus'] = 1;
try{
    $parsed_url = explode('/',parse_url(get_permalink())['path']);
    $page_slug = preg_replace('/\s+/', '_', $parsed_url[1]);
    if( isset($parsed_url[2]) && !empty($parsed_url[2]) ){
        $page_slug .= '_' . preg_replace('/\s+/', '_', $parsed_url[2]);
    }
}catch(Exception $e){
    $page_slug = '';
}
?>
<!DOCTYPE html>
<?php
	if( $_GET && key_exists('mfn-rtl', $_GET) ):
		echo '<html class="no-js" lang="ar" dir="rtl">';
	else:
?>
<html class="no-js<?php echo mfn_user_os(); ?>" <?php language_attributes(); ?><?php mfn_tag_schema(); ?>>
<?php endif; ?>

<!-- head -->
<head>

<!-- meta -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php
	if( mfn_opts_get('responsive') ){
		if( mfn_opts_get('responsive-zoom') ){
			echo '<meta name="viewport" content="width=device-width, initial-scale=1" />';
		} else {
			echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
		}

	}
?>

<?php do_action('wp_seo'); ?>

<link rel="shortcut icon" href="<?php mfn_opts_show( 'favicon-img', THEME_URI .'/images/favicon.ico' ); ?>" />
<?php if( mfn_opts_get('apple-touch-icon') ): ?>
<link rel="apple-touch-icon" href="<?php mfn_opts_show( 'apple-touch-icon' ); ?>" />
<?php endif; ?>
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/aos.css" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/animations-stylesheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/normalize.css" rel="stylesheet" type="text/css" />

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/aos.js"></script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>

<script>
    jQuery(document).ready(function () {
        AOS.init({
            duration: 1200
        });
        if( $('nav#menu #menu-main-menu li:last span').html() == 'Blog' ){
        	$('nav#menu #menu-main-menu li:last').remove();
        }
    });
</script>
<!-- wp_head() -->
<?php wp_head(); ?>

<style type="text/css">
    #Wrapper{
        min-height: 130px;
    }
    #form-fiix h2, #footr-updat p{
        color: #fff !important;
    }
    .camp-fix-footer {
        /*position: fixed;
        bottom: -50px;*/
        z-index: 9999;
        text-align: center;
        width: 100%;
        background: #21426D;
    }
    .camp-img .photo_wrapper {
        min-height: 180px;
    }
    .camp-col-contact {
        border:none;
    }
    .camp-fifth-sec h2 {
        font-size: 34px;
    }
    #Top_bar .menu_wrapper {
        float: right;
    }
    #Top_bar .logo {
        margin: 0 30px 0 14px;
    }
    .top_bar_left.clearfix {
        margin: 21px 0;
    }
    #Top_bar .column.one .top_bar_left{
        width:99% !important;
    }
    #menu-main-menu li {
        padding-left: 0;
    }
    .header-transparent.ab-hide #Top_bar .column.one {
        padding: 0;
        margin: 0;
    }
    #Top_bar .menu>li>a {
        margin: 20px 0;
        padding:0;
    }
    #Top_bar .menu > li > a span:not(.description) {
        padding: 0 15px;
    }
    #Top_bar .menu > li > a {
        text-decoration: none;
        border: 1px solid transparent;
        border-radius: 12px;
    }
    #Top_bar .menu > li > a:hover {
        text-decoration: none;
        border: 1px solid #204069;
    }
    #Top_bar .menu > li > a span:not(.description) {
        line-height: 42px;
        letter-spacing: 0;
    }
    .header-transparent #Top_bar .menu > li > a::after {
        background: none !important;
    }
    #Top_bar #logo img {
        width: 95px;
    }
    #talent-acquisition-footer-id{
        padding:0px !important;
    }
    #talent-acquisition-footer-id h3.widget-title{
        display: none;
    }
    #Top_bar .menu > li:last-of-type > a {
        text-decoration: none;
        border: 1px solid #204069;
    }
    .camp-forth-sec .story_box{
        padding: 0 8%;
    }
    #Top_bar .menu > li > a span {
        color: #1A2C45 !important;
    }
    #Top_bar .column.one .top_bar_left {
        width: 92% !important;
        margin: 30px auto 0px auto;
        float: none;
    }
    .section-post-intro-share,
    .section-post-about,
    .fixed-nav-prev,
    .fixed-nav-next{
            display: none;
    }
    .section-post-header{
            display: none;
    }
    #Content {
        padding-top: 0px !important;
    }
</style>
</head>

<!-- body -->
<body <?php body_class('landing-page-template'); ?>>

	<?php do_action( 'mfn_hook_top' ); ?>

	<?php get_template_part( 'includes/header', 'sliding-area' ); ?>

	<?php if( mfn_header_style( true ) == 'header-creative' ) get_template_part( 'includes/header', 'creative' ); ?>

	<!-- #Wrapper -->
	<div id="Wrapper">

		<?php
			// Featured Image | Parallax ----------
			$header_style = '';

			if( mfn_opts_get( 'img-subheader-attachment' ) == 'parallax' ){

				if( mfn_opts_get( 'parallax' ) == 'stellar' ){
					$header_style = ' class="bg-parallax" data-stellar-background-ratio="0.5"';
				} else {
					$header_style = ' class="bg-parallax" data-enllax-ratio="0.3"';
				}

			}
		?>

		<?php if( mfn_header_style( true ) == 'header-below' ) echo mfn_slider(); ?>

		<!-- #Header_bg -->
		<div id="Header_wrapper" <?php echo $header_style; ?>>

			<!-- #Header -->
			<header id="Header">
				<?php if( mfn_header_style( true ) != 'header-creative' ) get_template_part( 'includes/header', 'top-area' ); ?>
				<?php if( mfn_header_style( true ) != 'header-below' ) echo mfn_slider(); ?>
			</header>

			<?php
				if( ( mfn_opts_get('subheader') != 'all' ) &&
					( ! get_post_meta( mfn_ID(), 'mfn-post-hide-title', true ) ) &&
					( get_post_meta( mfn_ID(), 'mfn-post-template', true ) != 'intro' )	){


					$subheader_advanced = mfn_opts_get( 'subheader-advanced' );

					$subheader_style = '';

					if( mfn_opts_get( 'subheader-padding' ) ){
						$subheader_style .= 'padding:'. mfn_opts_get( 'subheader-padding' ) .';';
					}


					if( is_search() ){
						// Page title -------------------------

						echo '<div id="Subheader" style="'. $subheader_style .'">';
							echo '<div class="container">';
								echo '<div class="column one">';

									if( trim( $_GET['s'] ) ){
										global $wp_query;
										$total_results = $wp_query->found_posts;
									} else {
										$total_results = 0;
									}

									$translate['search-results'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-results','results found for:') : __('results found for:','betheme');
									echo '<h1 class="title">'. $total_results .' '. $translate['search-results'] .' '. esc_html( $_GET['s'] ) .'</h1>';

								echo '</div>';
							echo '</div>';
						echo '</div>';


					} elseif( ! mfn_slider_isset() || ( is_array( $subheader_advanced ) && isset( $subheader_advanced['slider-show'] ) ) ){
						// Page title -------------------------


						// Subheader | Options
						$subheader_options = mfn_opts_get( 'subheader' );


						if( is_home() && ! get_option( 'page_for_posts' ) && ! mfn_opts_get( 'blog-page' ) ){
							$subheader_show = false;
						} elseif( is_array( $subheader_options ) && isset( $subheader_options[ 'hide-subheader' ] ) ){
							$subheader_show = false;
						} elseif( get_post_meta( mfn_ID(), 'mfn-post-hide-title', true ) ){
							$subheader_show = false;
						} else {
							$subheader_show = true;
						}


						// title
						if( is_array( $subheader_options ) && isset( $subheader_options[ 'hide-title' ] ) ){
							$title_show = false;
						} else {
							$title_show = true;
						}


						// breadcrumbs
						if( is_array( $subheader_options ) && isset( $subheader_options[ 'hide-breadcrumbs' ] ) ){
							$breadcrumbs_show = false;
						} else {
							$breadcrumbs_show = true;
						}

						if( is_array( $subheader_advanced ) && isset( $subheader_advanced[ 'breadcrumbs-link' ] ) ){
							$breadcrumbs_link = 'has-link';
						} else {
							$breadcrumbs_link = 'no-link';
						}


						// Subheader | Print
						if( $subheader_show ){
							echo '<div id="Subheader" style="'. $subheader_style .'">';
								echo '<div class="container">';
									echo '<div class="column one">';

										// Title
										if( $title_show ){
											$title_tag = mfn_opts_get( 'subheader-title-tag', 'h1' );
											echo '<'. $title_tag .' class="title">'. mfn_page_title() .'</'. $title_tag .'>';
										}

										// Breadcrumbs
										if( $breadcrumbs_show ){
											mfn_breadcrumbs( $breadcrumbs_link );
										}

									echo '</div>';
								echo '</div>';
							echo '</div>';
						}

					}


				}
			?>

		</div>

		<?php
			// Single Post | Template: Intro
			if( get_post_meta( mfn_ID(), 'mfn-post-template', true ) == 'intro' ){
				get_template_part( 'includes/header', 'single-intro' );
			}
		?>

		<?php do_action( 'mfn_hook_content_before' ); ?>

<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
		<div class="sections_group">
			<?php
			
				if( get_post_meta( get_the_ID(), 'mfn-post-template', true ) == 'builder' ){
						
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
	
				}

			?>
		</div>
		
		<!-- .four-columns - sidebar -->
		<?php get_sidebar(); ?>
			
	</div>
</div>

<?php //get_footer(); // Omit Closing PHP Tags ?>
<?php
$back_to_top_class = mfn_opts_get('back-top-top');

if( $back_to_top_class == 'hide' ){
	$back_to_top_position = false;
} elseif( strpos( $back_to_top_class, 'sticky' ) !== false ){
	$back_to_top_position = 'body';
} elseif( mfn_opts_get('footer-hide') == 1 ){
	$back_to_top_position = 'footer';
} else {
	$back_to_top_position = 'copyright';
}

?>

<?php do_action( 'mfn_hook_content_after' ); ?>

</div><!-- #Wrapper -->

<?php
	// Responsive | Side Slide
	if( mfn_opts_get( 'responsive-mobile-menu' ) ){
		get_template_part( 'includes/header', 'side-slide' );
	}
?>

<?php
	if( $back_to_top_position == 'body' ){
		echo '<a id="back_to_top" class="button button_js '. $back_to_top_class .'" href=""><i class="icon-up-open-big"></i></a>';
	}
?>

<?php if( mfn_opts_get('popup-contact-form') ): ?>
	<div id="popup_contact">
		<a class="button button_js" href="#"><i class="<?php mfn_opts_show( 'popup-contact-form-icon', 'icon-mail-line' ); ?>"></i></a>
		<div class="popup_contact_wrapper">
			<?php echo do_shortcode( mfn_opts_get('popup-contact-form') ); ?>
			<span class="arrow"></span>
		</div>
	</div>
<?php endif; ?>

<?php do_action( 'mfn_hook_bottom' ); ?>


<?php if ( (get_post_meta($post->ID, 'show-footer', true) != '0') && is_active_sidebar( 'landing-page-footer-1' ) ) : ?>
    <div id="talent-acquisition-footer-id" class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'landing-page-footer-1' ); ?>
    </div>
<?php endif; ?>
<?php wp_footer(); ?>

</body>
</html>