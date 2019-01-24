<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blueorange
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
           <div class="row align-items-end">
               <div class="col-md-4 text-left">
                   <?php
                   the_custom_logo();
                   if ( is_front_page() && is_home() ) :
                       ?>
                       <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                       <?php
                   else :
                       ?>
                       <?php
                   endif;
                   $blueorange_description = get_bloginfo( 'description', 'display' );
                   if ( $blueorange_description || is_customize_preview() ) :
                       ?>
                   <?php endif; ?>
               </div>
               <div class="col-md-4 text-center">
                   <div class="social-links">
                       <ul>
                           <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                           <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                       </ul>
                   </div>
                   <div class="site-info">
                       © Copyright Blue Orange Digital <?php /*the_date('Y'); */?> 2019, All Rights Reserved
                   </div><!-- .site-info -->
               </div>
               <div class="col-md-4 contact-info">
                   <a href="tel:5555555555">555-555-5555</a> <br>
                   <a href="mailto:contact@blueorange.digital">contact@blueorange.digital</a> <br> <br>
                   <a href="#" class="secondary">Careers at Blue Orange</a>
               </div>
           </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
