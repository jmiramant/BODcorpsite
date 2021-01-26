<?php
/**
 * The template for displaying the footer.
 *
 * @package Betheme
 * @author Muffin group
 * @link http://muffingroup.com
 */


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

<?php if( 'hide' != mfn_opts_get( 'footer-style' ) ): ?>
	<!-- #Footer -->
	<footer id="Footer" class="clearfix">

		<?php if ( $footer_call_to_action = mfn_opts_get('footer-call-to-action') ): ?>
		<div class="footer_action">
			<div class="container">
				<div class="column one column_column">
					<?php echo do_shortcode( $footer_call_to_action ); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php
			$sidebars_count = 0;
			for( $i = 1; $i <= 5; $i++ ){
				if ( is_active_sidebar( 'footer-area-'. $i ) ) $sidebars_count++;
			}

			if( $sidebars_count > 0 ){

				$footer_style = '';

				if( mfn_opts_get( 'footer-padding' ) ){
					$footer_style .= 'padding:'. mfn_opts_get( 'footer-padding' ) .';';
				}

				echo '<div class="widgets_wrapper" style="'. $footer_style .'">';
					echo '<div class="container">';

						if( $footer_layout = mfn_opts_get( 'footer-layout' ) ){
							// Theme Options

							$footer_layout 	= explode( ';', $footer_layout );
							$footer_cols 	= $footer_layout[0];

							for( $i = 1; $i <= $footer_cols; $i++ ){
								if ( is_active_sidebar( 'footer-area-'. $i ) ){
									echo '<div class="column '. $footer_layout[$i] .'">';
										dynamic_sidebar( 'footer-area-'. $i );
									echo '</div>';
								}
							}

						} else {
							// Default - Equal Width

							$sidebar_class = '';
							switch( $sidebars_count ){
								case 2: $sidebar_class = 'one-second'; break;
								case 3: $sidebar_class = 'one-third'; break;
								case 4: $sidebar_class = 'one-fourth'; break;
								case 5: $sidebar_class = 'one-fifth'; break;
								default: $sidebar_class = 'one';
							}

							for( $i = 1; $i <= 5; $i++ ){
								if ( is_active_sidebar( 'footer-area-'. $i ) ){
									echo '<div class="column '. $sidebar_class .'">';
										dynamic_sidebar( 'footer-area-'. $i );
									echo '</div>';
								}
							}

						}

					echo '</div>';
				echo '</div>';
			}
		?>

		<?php if( mfn_opts_get('footer-hide') != 1 ): ?>

			<div class="footer_copy">
				<div class="container">
					<div class="column one">

						<?php
							if( $back_to_top_position == 'copyright' ){
								echo '<a id="back_to_top" class="button button_js" href=""><i class="icon-up-open-big"></i></a>';
							}
						?>

						<!-- Copyrights -->
						<div class="copyright">
							<?php
								if( mfn_opts_get('footer-copy') ){
									echo do_shortcode( mfn_opts_get('footer-copy') );
								} else {
									echo '&copy; '. date( 'Y' ) .' '. get_bloginfo( 'name' ) .'. All Rights Reserved. <a target="_blank" rel="nofollow" href="http://muffingroup.com">Muffin group</a>';
								}
							?>
						</div>

						<?php
							if( has_nav_menu( 'social-menu-bottom' ) ){
								mfn_wp_social_menu_bottom();
							} else {
								get_template_part( 'includes/include', 'social' );
							}
						?>

					</div>
				</div>
			</div>

		<?php endif; ?>

		<?php
			if( $back_to_top_position == 'footer' ){
				echo '<a id="back_to_top" class="button button_js in_footer" href=""><i class="icon-up-open-big"></i></a>';
			}
		?>

	</footer>
<?php endif; ?>

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

<!-- wp_footer() -->
<?php wp_footer(); ?>

<?php if ( is_front_page() ) : ?>
    <script>
        try{
            particlesJS("particles-js", {"particles":{"number":{"value":50,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.352750653390415,"random":false,"anim":{"enable":false,"speed":2.9234779642848423,"opacity_min":0.13805312609122866,"sync":true}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.3367165327817598,"width":0.4810236182596568},"move":{"enable":true,"speed":1,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"grab"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);
        }catch(e){

        }
    </script>

<?php endif; ?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/text-rotator.js"></script>
<script>
jQuery(document).ready(function () {

	jQuery('.rotate1').textRotator({
		animation: "fadeIn",
		seprator: ",",
		speed: "3500"
	});

});
</script>
</body>
</html>
