<?php

//testimonial custom post type
 function ah_testimonial_custom_post_type() {
    $labels = array(
    'name'                  => _x( 'Testimonials', 'Post type general name', 'oceanwp' ),
    'singular_name'         => _x( 'Testimonials', 'Post type singular name', 'oceanwp' ),
    'menu_name'             => _x( 'Testimonials', 'Admin Menu text', 'oceanwp' ),
    'name_admin_bar'        => _x( 'Testimonial', 'Add New on Toolbar', 'oceanwp' ),
    'add_new'               => __( 'Add New', 'oceanwp' ),
    'add_new_item'          => __( 'Add New Testimonial', 'oceanwp' ),
    'new_item'              => __( 'New Testimonial', 'oceanwp' ),
    'edit_item'             => __( 'Edit Testimonial', 'oceanwp' ),
    'view_item'             => __( 'View Testimonial', 'oceanwp' ),
    'all_items'             => __( 'All Testimonials', 'oceanwp' ),
    'search_items'          => __( 'Search Testimonials', 'oceanwp' ),
    'parent_item_colon'     => __( 'Parent Testimonials:', 'oceanwp' ),
    'not_found'             => __( 'No Testimonials found.', 'oceanwp' ),
    'not_found_in_trash'    => __( 'No Testimonials found in Trash.', 'oceanwp' ),
    'featured_image'        => _x( 'Testimonials Featured Image', 'oceanwp' ),
    'set_featured_image'    => _x( 'add Testimonials image', 'oceanwp' ),
    'remove_featured_image' => _x( 'Remove testimonial image','oceanwp' ),
    'use_featured_image'    => _x( 'Use as cover image',  'oceanwp' ),
    'archives'              => _x( 'Testimonial archives',  'oceanwp' ),
  );
  $args = array(
    'labels'       => $labels,
    'public'       => true,
    'label'        => __( 'Testimonial', 'oceanwp' ),
    'has_archive'  => true,
    'supports'     => array( 'title', 'thumbnail' ),
    'menu_icon'    => 'dashicons-format-quote',
  );
  register_post_type( 'ah_testimonial', $args );
  }
  add_action( 'init', 'ah_testimonial_custom_post_type' );

//ah testimonial custom shortcode
//[ah_testimonial]

function ah_testimonial_shortcode( $atts ){
    extract( shortcode_atts(
        array(
            'item' => '12',
        ), $atts )
    );
    ob_start();
    $args = array(
      'post_type' => 'ah_testimonial',
      'posts_per_page' => $item,
    );

    $query = new WP_Query( $args );
    // The Loop
    if ( $query->have_posts() ) { ?>
        <div class="ah-testimonial-main-wrapper">
            <?php
            while ( $query->have_posts() ) {
            $query->the_post();
                ?>
                <div class="ah-testimonial-item">
                    <div class="ah-testimonial-item-inner">
                        <div class="ah-testimonial-content-wrapper">
                            <div class="ah-testimonial-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="ah-testimonial-user-wrapper">
                            <div class="ah-testimonial-user-img">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail('full'); ?>
                                    <?php else: ?>
                                    <img src="/wp-content/uploads/2024/01/testimonial-placeholder-img.png" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="ah-testimonial-user-info">
                                <div class="ah-testimonial-title">
                                    - <?php the_title(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } ?>
        </div>
    <?php
    } else {
      // no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode( 'ah_testimonial', 'ah_testimonial_shortcode' );
