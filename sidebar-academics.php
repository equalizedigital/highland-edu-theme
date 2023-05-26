<?php
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */
?>
<div class="one-third column omega" id="side">
    <div class="sidebar related"> <!--  the Sidebar -->
        <div class="faculty-list">
            <?
                if(is_tax()){
                    $queried_object = get_queried_object();
                    $term_name = $queried_object->taxonomy;
                    $term_id = $queried_object->term_id;


                    $link_args = array(
                        'post_type' => 'call-to-action',
                        'tax_query' => array(
                            array(
                                'taxonomy' => $term_name,
                                'field' => 'term_id',
                                'terms' => $term_id
                            )
                        )
                    );
                    $link_loop = new WP_Query( $link_args );

                    if($link_loop->have_posts()) {
                        echo '<h2>Related Links</h2>';
                        while ($link_loop->have_posts()) : $link_loop->the_post();
                            $link = get_post_meta(get_the_id(), '_cmb_cta_link', true);
                            echo '<a href="'.$link.'">'.get_the_title().'</a>';
                        endwhile;
                    }
                    wp_reset_query();

                    $staff_args = array(
                        'post_type' => 'staff',
                        'tax_query' => array(
                            array(
                                'taxonomy' => $term_name,
                                'field' => 'term_id',
                                'terms' => $term_id
                            )
                        )
                    );
                    $staff_loop = new WP_Query( $staff_args );

                    if($staff_loop->have_posts()) {
                        echo '<h2>Faculty</h2>';
                        while ($staff_loop->have_posts()) : $staff_loop->the_post();
                            $staff_type = get_the_terms(get_the_id(), 'staff-member-type');
                            //if($staff_type[0]->slug != 'faculty') { continue; }
                            $grade = get_post_meta(get_the_id(), '_cmb_staff_grade', true);
                            $phone = get_post_meta(get_the_id(), '_cmb_staff_phone', true);
                            $email = get_post_meta(get_the_id(), '_cmb_staff_email', true);
                            if(has_post_thumbnail()){
                                the_post_thumbnail('featured-image');
                            }
                            echo '<h3>'.get_the_title().'</h3>';
                            echo '<p>'.$grade.'</p>';
                            echo '<p>'.$phone.'</p>';
                            echo '<p><a href="mailto:'.$email.'" class="related-staff">'.$email.'</a></p>';
                        endwhile;
                    }
                }
            ?>
        </div>
        <div class="additional-buttons">
            <p><a href="<? echo get_permalink(8030); ?>" class="go-back">All Programs</a></p>
            <p><a href="<? echo get_permalink(296); ?>" class="apply-online">Apply Online</a></p>
        </div>
    </div>
</div>
