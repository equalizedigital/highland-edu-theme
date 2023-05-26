<?php
defined('ABSPATH') OR exit;
/**
 * @package WordPress
 * @subpackage WP-Skeleton
 */
?>
<div class="one-third column omega" id="side">
    <div class="sidebar hcc-opp-form"> <!--  the Sidebar -->
        <?php
        $form_ttile = get_post_meta($post->ID,'_cmb_form_text_above', true);
        $the_form_id = get_post_meta($post->ID,'_cmb_gform_list', true);
        echo '<h1>'.$form_ttile.'</h1>';
        gravity_form( $the_form_id, false, false, false, '', false );
        ?>
    </div><!--  END Sidebar -->
</div>
</div>
