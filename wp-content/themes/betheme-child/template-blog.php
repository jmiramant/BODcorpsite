<?php
/**
 * Template Name: Blog Page Template
 * Description: A Page Template that display Talent acquisition.
 *
 * @package Betheme
 * @author Navtej Singh
 */
?>
<!DOCTYPE html>
<?php
if ($_GET && key_exists('mfn-rtl', $_GET)):
    echo '<html class="no-js" lang="ar" dir="rtl">';
else:
    ?>
    <html class="no-js<?php echo mfn_user_os(); ?>" <?php language_attributes(); ?><?php mfn_tag_schema(); ?>>
    <?php endif; ?>

    <!-- head -->
    <head>

        <!-- meta -->
        <meta charset="<?php bloginfo('charset'); ?>" />
        <?php
        if (mfn_opts_get('responsive')) {
            if (mfn_opts_get('responsive-zoom')) {
                echo '<meta name="viewport" content="width=device-width, initial-scale=1" />';
            } else {
                echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
            }
        }
        ?>

        <?php do_action('wp_seo'); ?>

        <link rel="shortcut icon" href="<?php mfn_opts_show('favicon-img', THEME_URI . '/images/favicon.ico'); ?>" />
        <?php if (mfn_opts_get('apple-touch-icon')): ?>
            <link rel="apple-touch-icon" href="<?php mfn_opts_show('apple-touch-icon'); ?>" />
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
            });
        </script>
        <!-- wp_head() -->
        <?php wp_head(); ?>
    </head>
    <!-- body -->
    <body <?php body_class('blog-page-template'); ?>>

        <?php do_action('mfn_hook_top'); ?>

        <?php get_template_part('includes/header', 'sliding-area'); ?>

        <?php if (mfn_header_style(true) == 'header-creative') get_template_part('includes/header', 'creative'); ?>

        <!-- #Wrapper -->
        <div id="Wrapper">

            <?php
            // Featured Image | Parallax ----------
            $header_style = '';

            if (mfn_opts_get('img-subheader-attachment') == 'parallax') {

                if (mfn_opts_get('parallax') == 'stellar') {
                    $header_style = ' class="bg-parallax" data-stellar-background-ratio="0.5"';
                } else {
                    $header_style = ' class="bg-parallax" data-enllax-ratio="0.3"';
                }
            }
            ?>

            <?php if (mfn_header_style(true) == 'header-below') echo mfn_slider(); ?>

            <!-- #Header_bg -->
            <div id="Header_wrapper" <?php echo $header_style; ?>>

                <!-- #Header -->
                <header id="Header">
<?php if (mfn_header_style(true) != 'header-creative') get_template_part('includes/header', 'top-area'); ?>
                    <?php if (mfn_header_style(true) != 'header-below') echo mfn_slider(); ?>
                </header>

<?php
if (( mfn_opts_get('subheader') != 'all' ) &&
        (!get_post_meta(mfn_ID(), 'mfn-post-hide-title', true) ) &&
        ( get_post_meta(mfn_ID(), 'mfn-post-template', true) != 'intro' )) {


    $subheader_advanced = mfn_opts_get('subheader-advanced');

    $subheader_style = '';

    if (mfn_opts_get('subheader-padding')) {
        $subheader_style .= 'padding:' . mfn_opts_get('subheader-padding') . ';';
    }


    if (is_search()) {
        // Page title -------------------------

        echo '<div id="Subheader" style="' . $subheader_style . '">';
        echo '<div class="container">';
        echo '<div class="column one">';

        if (trim($_GET['s'])) {
            global $wp_query;
            $total_results = $wp_query->found_posts;
        } else {
            $total_results = 0;
        }

        $translate['search-results'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-results', 'results found for:') : __('results found for:', 'betheme');
        echo '<h1 class="title">' . $total_results . ' ' . $translate['search-results'] . ' ' . esc_html($_GET['s']) . '</h1>';

        echo '</div>';
        echo '</div>';
        echo '</div>';
    } elseif (!mfn_slider_isset() || ( is_array($subheader_advanced) && isset($subheader_advanced['slider-show']) )) {
        // Page title -------------------------
        // Subheader | Options
        $subheader_options = mfn_opts_get('subheader');


        if (is_home() && !get_option('page_for_posts') && !mfn_opts_get('blog-page')) {
            $subheader_show = false;
        } elseif (is_array($subheader_options) && isset($subheader_options['hide-subheader'])) {
            $subheader_show = false;
        } elseif (get_post_meta(mfn_ID(), 'mfn-post-hide-title', true)) {
            $subheader_show = false;
        } else {
            $subheader_show = true;
        }


        // title
        if (is_array($subheader_options) && isset($subheader_options['hide-title'])) {
            $title_show = false;
        } else {
            $title_show = true;
        }


        // breadcrumbs
        if (is_array($subheader_options) && isset($subheader_options['hide-breadcrumbs'])) {
            $breadcrumbs_show = false;
        } else {
            $breadcrumbs_show = true;
        }

        if (is_array($subheader_advanced) && isset($subheader_advanced['breadcrumbs-link'])) {
            $breadcrumbs_link = 'has-link';
        } else {
            $breadcrumbs_link = 'no-link';
        }


        // Subheader | Print
        if ($subheader_show) {
            echo '<div id="Subheader" style="' . $subheader_style . '">';
            echo '<div class="container">';
            echo '<div class="column one">';

            // Title
            if ($title_show) {
                $title_tag = mfn_opts_get('subheader-title-tag', 'h1');
                echo '<' . $title_tag . ' class="title">' . mfn_page_title() . '</' . $title_tag . '>';
            }

            // Breadcrumbs
            if ($breadcrumbs_show) {
                mfn_breadcrumbs($breadcrumbs_link);
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
            if (get_post_meta(mfn_ID(), 'mfn-post-template', true) == 'intro') {
                get_template_part('includes/header', 'single-intro');
            }
            ?>

            <?php do_action('mfn_hook_content_before'); ?>

            <!-- #Content -->
            <div id="Content">
                <div class="content_wrapper clearfix">

                    <!-- .sections_group -->
                    <div class="sections_group">
							
						<div class="wrapper-study txt-f-center">
							<h1><?php echo get_the_title(); ?></h1>
							<p><?php echo get_post_field('post_content', $post->ID); ?></p>	
						</div>

						<div class="section_wrapper mcb-section-inner blog-feature-post blog-feature-post">
							<ul>
								<?php 
                                    $args = array(
                                      'post_type' => 'post' ,
                                      'orderby' => 'date' ,
                                      'order' => 'DESC' ,
                                      'posts_per_page' => 10,
                                      'category_name'         => 'featured'
                                    ); 
                                    $the_query = new WP_Query($args); 
                                ?>
								<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

								<li>
									<div class="bloge-f-img">
										<span><img src="<?php echo get_the_post_thumbnail_url(); ?>" /></span>
									</div>
									<div class="bloge-f-txt">
										<div class="f-blog-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
										<p class="f-blog-dec"><?php the_excerpt(__('')); ?></p>
										<div class="f-blog-date"><?php echo get_the_date(); ?></div>
									</div>
								</li>

								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							</ul>
						</div>
						

						<div class="section_wrapper mcb-section-inner blog-other-post blog-feature-post">
							<ul class="nopaddd">
								<?php 
                                    $args = array(
                                      'post_type' => 'post' ,
                                      'orderby' => 'date' ,
                                      'order' => 'DESC' ,
                                      'posts_per_page' => 10,
                                      'category_name'         => 'uncategorized'
                                    ); 
                                    $the_query = new WP_Query($args); 
                                ?>
								<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

								<li>
									<div class="bloge-f-img">
										<span><img src="<?php echo get_the_post_thumbnail_url(); ?>" /></span>
									</div>
									<div class="bloge-f-txt">
										<div class="f-blog-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
										<p class="f-blog-dec"><?php the_excerpt(__('(more…)')); ?></p>
										<div class="f-blog-date"><?php echo get_the_date(); ?></div>
									</div>
								</li>

								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							</ul>
						</div>
						
                    </div>

                    <!-- .four-columns - sidebar -->
                            <?php get_sidebar(); ?>

                </div>
            </div>

            <?php get_footer(); ?>
            <?php
            $back_to_top_class = mfn_opts_get('back-top-top');

            if ($back_to_top_class == 'hide') {
                $back_to_top_position = false;
            } elseif (strpos($back_to_top_class, 'sticky') !== false) {
                $back_to_top_position = 'body';
            } elseif (mfn_opts_get('footer-hide') == 1) {
                $back_to_top_position = 'footer';
            } else {
                $back_to_top_position = 'copyright';
            }
            ?>

            <?php do_action('mfn_hook_content_after'); ?>

        </div><!-- #Wrapper -->

        <?php
        // Responsive | Side Slide
        if (mfn_opts_get('responsive-mobile-menu')) {
            get_template_part('includes/header', 'side-slide');
        }
        ?>

        <?php
        if ($back_to_top_position == 'body') {
            echo '<a id="back_to_top" class="button button_js ' . $back_to_top_class . '" href=""><i class="icon-up-open-big"></i></a>';
        }
        ?>

        <?php if (mfn_opts_get('popup-contact-form')): ?>
            <div id="popup_contact">
                <a class="button button_js" href="#"><i class="<?php mfn_opts_show('popup-contact-form-icon', 'icon-mail-line'); ?>"></i></a>
                <div class="popup_contact_wrapper">
            <?php echo do_shortcode(mfn_opts_get('popup-contact-form')); ?>
                    <span class="arrow"></span>
                </div>
            </div>
        <?php endif; ?>

        <?php do_action('mfn_hook_bottom'); ?>

        <?php wp_footer(); ?>

    </body>
</html>