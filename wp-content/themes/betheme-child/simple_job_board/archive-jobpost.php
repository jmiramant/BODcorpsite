<?php
/**
 * The Template for displaying job archives, including the main jobpost page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/simple_job_board/archive-jobpost.php
 *
 * @author      PressTigers
 * @package     Simple_Job_Board
 * @subpackage  Simple_Job_Board/Templates
 * @version     1.1.0
 * @since       2.2.0
 * @since       2.2.3   Enqueued Front end Styles & Revised the HTML structure.
 * @since       2.2.4   Enqueued Front end Scripts.
 * @since       2.3.0   Added "sjb_archive_template" filter.
 * @since       2.4.0   Revised the whole HTML structure.
 * @since       2.4.6   Added missing parameters for pagination template.
 */
get_header(); ?>
<div class="jobHeroHeader"><h1>Blue Orange Job Board</h1></div>
<?php
ob_start();
global $job_query, $post;

/**
 * Enqueue Frontend Scripts.
 * 
 * @since   2.2.4
 */
do_action('sjb_enqueue_scripts');

/**
 * Hook -> sjb_before_main_content
 * 
 * @hooked sjb_job_listing_wrapper_start - 10 
 * - Output Opening div of Main Container.
 * - Output Opening div of Content Area.
 * 
 * @since  2.2.0
 * @since  2.2.3 Removed the content wrapper opening div
 */
do_action('sjb_before_main_content');
?>

<!-- Start Content Wrapper
================================================== -->
<div class="sjb-page">
    <div class="sjb-archive-page">   
        <!-- Start Job Title
        ================================================== -->    
        <?php /*?><h3><span class="job-title"><?php  echo apply_filters('sjb_jobs_archive_title', esc_html__('Job Archives', 'simple-job-board')); ?></span></h3><?php */?>
        <!-- ==================================================
        End Job Title -->

        <?php
        
        // Retrieves Public Query Page Variable
        if (get_query_var('paged')) {
            $paged = (int) get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = (int) get_query_var('page');
        } else {
            $paged = 1;
        }

        // WP_Query Default Arguments
        $args = apply_filters(
                'sjb_archive_output_jobs_args', array(
            'posts_per_page' => '15',
            'post_type' => 'jobpost',
            'paged' => $paged,
                )
        );

        // Merge WP_Query $args array on each $_GET element
        $args['jobpost_category'] = ( NULL != filter_input(INPUT_GET, 'selected_category') && -1 != filter_input(INPUT_GET, 'selected_category') ) ? sanitize_text_field(filter_input(INPUT_GET, 'selected_category')) : '';
        $args['jobpost_job_type'] = ( NULL != filter_input(INPUT_GET, 'selected_jobtype') && -1 != filter_input(INPUT_GET, 'selected_jobtype') ) ? sanitize_text_field(filter_input(INPUT_GET, 'selected_jobtype')) : '';
        $args['jobpost_location'] = ( NULL != filter_input(INPUT_GET, 'selected_location') && -1 != filter_input(INPUT_GET, 'selected_location') ) ? sanitize_text_field(filter_input(INPUT_GET, 'selected_location')) : '';        
        $args['s'] = ( NULL != filter_input(INPUT_GET, 'search_keywords') ) ? sanitize_text_field( (filter_input(INPUT_GET, 'search_keywords') ) ) : '';

        // Job Query
        $job_query = new WP_Query($args);

        /**
         * Fires before listing jobs on job listing page.
         * 
         * @since   2.2.0
         */
        do_action( 'sjb_job_filters_before' );

        /**
         * Template -> Job Filters:
         * 
         * - Keywords Search.
         * - Job Category Filter.
         * - Job Type Filter.
         * - Job Location Filter.
         * 
         * Search jobs by category, location, type and keywords.
         */
        if ($job_query->have_posts()):
        get_simple_job_board_template( 'job-filters.php' );
        endif;
        /**
         * Template -> Job Listing Start:
         * 
         * - SJB Starting Content Wrapper div.
         */
        get_simple_job_board_template( 'listing/job-listings-start.php' );

        if ($job_query->have_posts()):
            global $counter;
            $counter = 1;
            while ($job_query->have_posts()): $job_query->the_post();

                /**
                 * Hook -> sjb_job_listing_view
                 * 
                 * @hooked sjb_job_listing_view - 10  
                 *              
                 * Display the user defined job listing view:
                 * 
                 * - Either job listing grid view or list view.
                 * 
                 * @since   2.2.3
                 */
                do_action( 'sjb_job_listing_view' );
            endwhile;

            /**
             * Template -> Pagination:
             * 
             * - Add Pagination to Resulted Jobs.
             */
            get_simple_job_board_template( 'listing/job-pagination.php', array( 'job_query' => $job_query ) );
        else:

            /**
             * Template -> No Job Found:
             * 
             * - Display Message on No Job Found.
             */
            echo "<div class='no-job-listing job_not_found'><p>There are no active listings currently or no matches for your search, but we are always on the hunt for good talent. We'd love to hear from you! Please submit your resume and a cover letter to <a href='mailto:careers@blueorange.digital'>careers@blueorange.digital.</a> or try a different search filter </p> <br><a href='/jobs' class='link-button'>Return to Job Board <span class='dashicons dashicons-arrow-right-alt'></span></a></div>";
            //get_simple_job_board_template( 'listing/content-no-jobs-found.php' );
        endif;

        wp_reset_postdata();

        /**
         * Fires after listing jobs on job archive page.
         * 
         * @since   2.2.0
         */
        do_action( 'sjb_job_listing_after' );

        /**
         * Template -> Job Listing End:
         * 
         * - SJB Ending Wrapper div.
         */
        get_simple_job_board_template( 'listing/job-listings-end.php' );
        ?>
    </div>
    <?php if ($job_query->have_posts()): ?>
    <div class="job_listing_bottom_text">Don’t see what you’re looking for?<br> Think you can offer your talents in a different way?<br> Let us know. We are always on the hunt for good talent. We’d love to hear from you! Please<br> submit your resume to <a class="bottom_text_anchor" href="mailto:careers@blueorange.digital">careers@blueorange.digital</a></div> 
<?php endif; ?>
</div>
<!-- ==================================================
End Content Wrapper -->

<div class="clearfix"></div>

<?php
/**
 * Hook -> sjb_after_main_content
 *  
 * @hooked sjb_job_listing_wrapper_end - 10
 * 
 * - Output Closing div of Main Container.
 * - Output Closing div of Content Area.
 * 
 * @since   2.2.0
 * @since   2.2.3 Removed the content wrapper closing div
 */
do_action('sjb_after_main_content');

$html_archive = ob_get_clean();

/**
 * Modify the Jobs Archive Page Template. 
 *                                       
 * @since   2.3.0
 * 
 * @param   html    $html_archive   Jobs Archive Page HTML.                   
 */
echo apply_filters('sjb_archive_template', $html_archive);

get_footer();