<?php
/**
 * Template Name: Home Layout
 *
 * @package amellee
 */

get_header(); ?>
<span class="network-bg">

</span>
    <section id="homeSlider">
        <?php echo do_shortcode('[rev_slider alias="homeNew"]'); ?>
        <div class="button1 drop-down-animation"></div>
    </section>
    <section id="approach" class="padding text-center">
        <div class="container">
            <h3 class="sectionSubtitle "><?php the_field('approach_content'); ?></h3>
        </div>
        <h2 class="sectionTitle animated">
            <?php the_field('approach_title'); ?>
        </h2>
        <div class="container-fluid">
            <div class="row">
                <?php
                if (have_rows('approach_listing')):
                    while (have_rows('approach_listing')): the_row(); ?>
                        <div class="col-md-3 approach-listing">
                            <div class="inner">
                                <figure>
                                    <img src="<?php the_sub_field('icon'); ?>" alt="">
                                </figure>
                                <h4><?php the_sub_field('title'); ?></h4>
                                <?php the_sub_field('content'); ?>
                            </div>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </section>
    <section id="discover" class="text-right padding">
        <div class="container">
            <div class="sectionSubtitle light">
                <?php the_field('discover_title'); ?>
            </div>
            <div class="linked">
                <a href="<?php the_field('discover_link'); ?>"><?php the_field('discover_link_text'); ?></a>
            </div>
        </div>
    </section>
    <section id="testimonials" class="text-center">
        <div class="container">
            <div class="clients">
                <h3 class="sectionSubtitle animated">Testimonials</h3>
                <?php
                $args = array('post_type' => 'testimonials', 'posts_per_page' => 10);
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                    /* grab the url for the full size featured image */
                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')
                    ?>
                    <div class="clientList">
                        <div class="cont italic">
                            <?php the_content(); ?>
                        </div>
                        <h2 class=""><?php the_title(); ?></h2>
                    </div>
                    <?php
                endwhile;
                ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </section>
    <section id="machine">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="sectionSubtitle animated left"> <?php the_field('machine_title'); ?></h2>
                    <p><?php the_field('machine_content'); ?></p>
                    <label> <?php the_field('machine_label'); ?></label>
                </div>
                <div class="col-md-6 mac-image">
                    <figure>
                        <img src=" <?php the_field('machine_image'); ?>" alt="">
                    </figure>
                </div>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </section>
    <section id="callToAction">
        <div class="container">
            <div class="row">
                <?php
                if (have_rows('call_to_action')):
                    while (have_rows('call_to_action')): the_row(); ?>
                        <div class="col-md-4 action-listing">
                            <div class="inner">
                                <figure>
                                    <img src="<?php the_sub_field('icon'); ?>" alt="">
                                </figure>
                                <h4><?php the_sub_field('title'); ?></h4>
                                <p><?php the_sub_field('content'); ?></p>
                            </div>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
            <br><br>
            <div class="linked text-right">
                <a href="">Our Approach</a>
            </div>
        </div>
    </section>
<?php get_footer(); ?>