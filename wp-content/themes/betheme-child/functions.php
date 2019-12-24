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
    // wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );
    // wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
    //     'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
    //     'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
    //     'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
    //     'max_page' => $wp_query->max_num_pages
    // ) );
    // wp_enqueue_script( 'my_loadmore' );
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

    register_sidebar( array(
        'name' => __( 'Blog Sidebar', 'wpb' ),
        'id' => 'blog-sidebar',
        'description' => __( 'Appears on the Blog page', 'wpb' ),
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
function pagination_bar( $custom_query ) {

    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}   

function limit_words($string, $word_limit) {

    // creates an array of words from $string (this will be our excerpt)
    // explode divides the excerpt up by using a space character

    $words = explode(' ', $string);

    // this next bit chops the $words array and sticks it back together
    // starting at the first word '0' and ending at the $word_limit
    // the $word_limit which is passed in the function will be the number
    // of words we want to use
    // implode glues the chopped up array back together using a space character

    return implode(' ', array_slice($words, 0, $word_limit));

}  

add_action('save_post', 'assign_parent_terms', 10, 2);

function assign_parent_terms($post_id, $post){

    if($post->post_type != 'post')
        return $post_id;

    // get all assigned terms   
    $terms = wp_get_post_terms($post_id, 'category' );
    foreach($terms as $term){
        while($term->parent != 0 && !has_term( $term->parent, 'category', $post )){
            // move upward until we get to 0 level terms
            wp_set_post_terms($post_id, array($term->parent), 'category', true);
            $term = get_term($term->parent, 'category');
        }
    }
}

function misha_loadmore_ajax_handler(){
 
    // prepare our arguments for the query
   
    $args = array (
                    //'cat' => $category->cat_ID,
                    'order'   => 'ASC',
                    'posts_per_page'   => '3',
                    'category__in' => array(22),
                  );
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';
 
    // it is always better to use WP_Query but not here
    query_posts( $args );
 
    if( have_posts() ) :
 
        // run the loop
        while( have_posts() ): the_post(); 
            $category_detail=get_the_category($post->ID);
            $url = wp_get_attachment_url( get_post_thumbnail_id() );
            foreach($category_detail as $cd){
                    $slug = $cd->slug;
                    $name = $cd->name;
            }
            // look into your theme code how the posts are inserted, but you can use your own HTML of course
            // do you remember? - my example is adapted for Twenty Seventeen theme
            //get_template_part( 'template-parts/post/content', get_post_format() ); ?>
           <div class="filter-item filter <?php echo $slug; ?>" id="lod">
                        <a href="<?php the_permalink();  ?>"><div class="caseStudyInner"><img src="<?php echo $url;  ?>" class="filter-image">
                        <div class="filterItem"><h3><span><?php the_title(); ?></span></h3><h4><?php echo $name; ?></h4><p>See our full stack data science in action. Until you've experienced deep integration, you haven't felt the difference of the Blue Orange way. </p></div></div></a>
                    </div>  <?php
            // for the test purposes comment the line above and uncomment the below one
            // the_title();

 
        endwhile;
 
    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
 
function getcategorypost(){

    $args = array (
                    //'cat' => $category->cat_ID,
                    'order'   => 'ASC',
                    'posts_per_page'   => $_POST['post_limit'],
                    'category__in' => array($_POST['cat_id']),
                  );
    //$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';
 
    // it is always better to use WP_Query but not here
    query_posts( $args );
 
    if( have_posts() ) :
 
        // run the loop
        while( have_posts() ): the_post(); 
            $category_detail=get_the_category($post->ID);
            foreach($category_detail as $cd){
                    $slug = $cd->slug;
                    $name = $cd->name;
            }
            ?>
           <div class="filter-item filter <?php echo $slug; ?>" id="lod">
                        <a href="<?php the_permalink();  ?>"><img src="http://fakeimg.pl/365x365/" class="filter-image">
                        <div class="filter-item-overlap"><h3><span><?php the_title(); ?></span></h3><h4><?php echo $name; ?></h4></div></a>
                    </div>  
                <?php

        endwhile;
 
    endif;
    die;

}
  
add_action('wp_ajax_getcategorypost', 'getcategorypost'); // wp_ajax_nopriv_{action}   
add_action('wp_ajax_nopriv_getcategorypost', 'getcategorypost'); 

//On clicking checkbox of blog home page template
function call_posts(){
            $choices = $_POST['choices'];
            foreach($choices as $Key=>$Value){
                $args = array( 'cat' => $Value['id'], 'post_type' => 'post', 'post_status' => 'publish' );
                $query = new WP_Query($args);
            
            if( $query->have_posts() ) :
                while( $query->have_posts() ): $query->the_post();
                $url = wp_get_attachment_url( get_post_thumbnail_id() ); 
            ?>
                    <div class="main-article">
                        <div class="article-inner">
                        <?php if( !empty($url) ): ?>
                        <a class="postImg" style="background-image: url(<?php echo $url;  ?>); " href="<?php the_permalink();  ?>"></a>
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
                            <p><?php 
                                echo limit_words(get_the_excerpt(), '20').' ...';  
                                ?></p></a>
                            <hr class="border-bottom"> </hr>
                        </div>
                        </div>
                    </div>
            <?php        
            //      get_template_part('content');
             endwhile;
                wp_reset_query();
            else :
                wp_send_json($query->posts);
            endif;
        }
            die();
}
add_action('wp_ajax_call_posts', 'call_posts'); // wp_ajax_nopriv_{action}   
add_action('wp_ajax_nopriv_call_posts', 'call_posts');     