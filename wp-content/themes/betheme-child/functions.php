<?php

/* ---------------------------------------------------------------------------
 * Child Theme URI | DO NOT CHANGE
 * --------------------------------------------------------------------------- */
define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );


/* ---------------------------------------------------------------------------
 * Define | YOU CAN CHANGE THESE
 * --------------------------------------------------------------------------- */

// White Label --------------------------------------------
define( 'WHITE_LABEL', false );

// Static CSS is placed in Child Theme directory ----------
define( 'STATIC_IN_CHILD', false );


/* ---------------------------------------------------------------------------
 * Enqueue Style
 * --------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'mfnch_enqueue_styles', 101 );
function mfnch_enqueue_styles() {

	// Enqueue the parent stylesheet
// 	wp_enqueue_style( 'parent-style', get_template_directory_uri() .'/style.css' );		//we don't need this if it's empty

	// Enqueue the parent rtl stylesheet
	if ( is_rtl() ) {
		wp_enqueue_style( 'mfn-rtl', get_template_directory_uri() . '/rtl.css' );
	}

	// Enqueue the child stylesheet
	wp_dequeue_style( 'style' );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() .'/style.css' );
	/*if( is_page( array( 'landing' ) ) ){
		wp_enqueue_script( 'script-name', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js', array(), '', false );
		wp_enqueue_style( 'script-name-css', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css', array(), '', false );
	}
	wp_enqueue_script( 'frontend-ajax', JS_DIR_URI . 'frontend-ajax.js', array('jquery'), null, true );
	wp_localize_script( 'frontend-ajax', 'frontend_ajax_object',
        array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
        )
    );*/

}


/* ---------------------------------------------------------------------------
 * Load Textdomain
 * --------------------------------------------------------------------------- */
add_action( 'after_setup_theme', 'mfnch_textdomain' );
function mfnch_textdomain() {
    load_child_theme_textdomain( 'betheme',  get_stylesheet_directory() . '/languages' );
    load_child_theme_textdomain( 'mfn-opts', get_stylesheet_directory() . '/languages' );
}

/* ---------------------------------------------------------------------------
 * Enable wordpress to accept webp format images
 * --------------------------------------------------------------------------- */
function webp_upload_mimes( $existing_mimes ) {
    // add webp to the list of mime types
    $existing_mimes['webp'] = 'image/webp';
    $existing_mimes['jp2'] = 'image/jp2';

    // return the array back to the function with our added mime type
    return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );

/**
 * Register Widget Sidebar.
 */
function landing_page_widgets_init() {
 
    register_sidebar( array(
        'name' => __( 'Lnading Page Footer 1', 'wpb' ),
        'id' => 'landing-page-footer-1',
        'description' => __( 'Talent Acquisition Footer 1 page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Lnading Page Footer 2', 'wpb' ),
        'id' => 'landing-page-footer-2',
        'description' => __( 'Talent Acquisition Footer 2 page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    }
 
add_action( 'widgets_init', 'landing_page_widgets_init' );

# Automatically clear autoptimizeCache if it goes beyond 256MB
if (class_exists('autoptimizeCache')) {
    $myMaxSize = 512000; # You may change this value to lower like 100000 for 100MB if you have limited server space
    $statArr=autoptimizeCache::stats();
    $cacheSize=round($statArr[1]/1024);
    if ($cacheSize>$myMaxSize){
       autoptimizeCache::clearall();
       header("Refresh:0"); # Refresh the page so that autoptimize can create new cache files and it does breaks the page after clearall.
    }
}

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


function footer_content( $atts, $content = "" ) {
    return get_footer();
}
add_shortcode( 'footer', 'footer_content' );

//
//function my_scripts() {
//if( is_page( array( 'landing' ) ) ){
//wp_enqueue_script( 'script-name', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js', array(), '1.0.0', false );
//}
//}
//add_action( 'wp_enqueue_scripts', 'my_scripts' );

/*
add_action( 'wp_ajax_listing_companions_ajax', 'listing_companions_ajax' );
add_action( 'wp_ajax_nopriv_listing_companions_ajax', 'listing_companions_ajax' );

function listing_companions_ajax() {
	if((isset($_POST['name']))&&(isset($_POST['email'])&&$_POST['email']!="")){
		//print_r($_POST);
		$to = 'maan.6050@gmail.com';
		$subject = 'Form Submitted Successfully!';
		$message = '<html><head><title>Call me back</title></head><body><p><b>Name:</b> '.$_POST['name'].'</p><p><b>Phone:</b> '.$_POST['phone'].'</p>                      
				</body></html>';
		$headers  = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: Site <balwindermony@gmail.com>\r\n";	
		if(wp_mail($to, $subject, $message, $headers)){
			print_r($_POST);
		}
		echo "test";
		//echo json_encode(array('status' => 'success'));
	}else{
		//echo json_encode(array('status' => 'failure'));
	}
	//echo json_decode($_POST);
	
	//echo json_decode();
 //echo json_encode(array('name'=>'rrrrrr'));
}*/
