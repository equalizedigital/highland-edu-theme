<?
	defined('ABSPATH') OR exit;
	/**
	 * @package WordPress
	 * @subpackage WP-Skeleton
	 */
?>
<div class="one-third column alpha omega" id="side">
    <aside>
	<div id="side_access">
    <?
        /*if(get_post_type() == "class"){ ?>
	        <div class="menu">
                <ul>
                    <li>
	                    <a class="parent segundo" href="<? echo get_permalink(819); ?>">Back to Schedule</a>
                    </li>
                </ul>
	        </div><?
        }*/
	    if(is_page(811)) {
		    wp_nav_menu(array('theme_location' => 'staff-portal'));
	    }
	    if(is_page(813)) {
		    wp_nav_menu(array('theme_location' => 'student-portal'));
	    }
    ?>
	</div>
    <div class="sidebar sidebar-holder"><?
	    if(get_post_type() == "news"){
			dynamic_sidebar( 'right-sidebar' );
		}
	    if ((is_page(5441))) {
            echo do_shortcode( '[mstar_calendar_only history="12" future="12"]');
            $menu_ID = 2;
            $nav_menu = wp_get_nav_menu_object( $menu_ID );
        }
        global $children;
        $children = array();
        function get_posts_children($parent_id){
            $posts = get_posts( array( 'numberposts' => -1, 'post_status' => 'publish', 'post_type' => 'page', 'orderby' => 'title', 'order' => 'asc', 'post_parent' => $parent_id, 'suppress_filters' => false ));
            foreach($posts as $child){
                global $children;
                //var_viewer($child->ID);
                $children[] = $child->ID;
                get_posts_children($child->ID);
            }
            if(!empty($children)) {
                return $children;
            }
        }
        $parent_title = '';
        if(isset($post->post_parent)) {
            $parent_title = get_the_title($post->post_parent);
        }
        $parents = get_post_ancestors(get_the_id());
        $parent_count = count($parents);
        if($parent_count >= 2){
            $parent_pos = $parent_count - 1;
        } else {
            $parent_pos = 0;//$parent_post = 0;
        }
        if(!empty($parents)){
            $parent_id = $parents[0];
        } else {
            $parent_id = '';
        }

        //$parent_id = $parent[$parent_pos];
        $link = get_the_permalink($parent_id);
        $parent_link = '';
        if(isset($post->post_parent)) {
            $parent_link = get_the_ID($post->post_parent);
        }
        if($parent_id){
            $children = get_posts_children($parent_id);
        } else {
            $children = get_posts_children(get_the_id());
        }
        if(current_user_can('administrator')){
            /*var_viewer($parents);
            echo "ID: ".get_the_id();
            var_viewer("position: ".$parent_pos);
            var_viewer("parents: ".$parents[$parent_pos]);*/
        }
        //use following 3 lines if tabs need to be in a specific order, will need to move into the loop.
        //$tab = 100;
        //echo $tab;
        //$tab++;
        if($children){ ?>
            <nav class="menu" aria-label="Sidebar Menu">
                <ul>
                    <li>
                        <?php
                        if (!$parents) {
                            ?>
                            <h2>
                                <a class="parent" href="<? echo $link; ?>" tabindex="0">
                                    <? echo $parent_title; ?>
                                </a>
                            </h2>
                            <?php
                        } else {?>
                            <a class="parent segundo" href="<? echo $link; ?>" tabindex="0">
                                <span class="icon" aria-hidden="true"></span>
                                <h2><? echo $parent_title; ?></h2>
                            </a>
                            <?php
                        }
                        ?>
                    </li>
                    <?
                    foreach($children as $child){
                        $child_parents = get_post_ancestors($child);
                        $ancestor_count = count($child_parents);
                        if($ancestor_count > 1) {
                            $is_parent = get_children(array('post_parent' => $child, 'post_type' => 'page', 'orderby' => 'title'));
                            if(isset(current($is_parent)->ID)){
                                $child_id = current($is_parent)->ID;
                            }
                            if(!empty($parents)){
                                $the_parent = $parents[0];
                            } else {
                                $the_parent = '';
                            }
                            if ($is_parent && !$child_id) { ?>
                                <li id="<? echo $child->post_name; ?>" class="child show-children" aria-expanded="false" aria-controls="li-<? echo $child; ?>">
                                    <a href="#" tabindex="0">
                                    <? echo get_the_title($child); ?>
                                    <span class="icon" aria-hidden="true"></span>    
                                    </a>
                                </li>
                            <li class="grandchild li-<? echo $child; ?>">
                                <a href="<? echo get_the_permalink($child); ?>" tabindex="0">- <? echo get_the_title($child); ?> Home</a>
                                </li><?
                            } else if ($is_parent && ($child == get_the_id())) { ?>
                                <li id="<? echo $child->post_name; ?>" class="child show-children" aria-expanded="false" aria-controls="li-<? echo $child; ?>">
                                    <a href="#" role="button" tabindex="0">
                                        <? echo get_the_title($child); ?>
                                        <span class="icon" aria-hidden="true"></span>        
                                    </a>
                                </li>
                            <li class="grandchild li-<? echo $child; ?>">
                                <a href="<? echo get_the_permalink($child); ?>" tabindex="0">- <? echo get_the_title($child); ?> Home</a>
                                </li><?
                            } else if (($child != $child_parents[0]) && ($child_parents[0] != $the_parent)) { ?>
                            <li class="grandchild li-<? echo wp_get_post_parent_id($child); ?>">
                                <a href="<? echo get_the_permalink($child); ?>" tabindex="0">- <? echo get_the_title($child); ?></a>
                                </li><?
                            } else if ($child_parents[0] == get_the_id()) { ?>
                            <li class="grandchild li-<? echo wp_get_post_parent_id($child); ?>">
                                <a href="<? echo get_the_permalink($child); ?>" tabindex="0">- <? echo get_the_title($child); ?></a>
                                </li><?
                            } else { ?>
                                <li class="child">
                                <a href="<? echo get_the_permalink($child); ?>" tabindex="0"><? echo get_the_title($child); ?></a>
                                </li><?
                            }
                        } else {
                            $is_parent = get_children(array('post_parent' => $child, 'post_type' => 'page', 'orderby' => 'title'));
                            if ($is_parent) {
                                //do something
                                if(isset($child->post_name)) {
                                    $child_name = $child->post_name;
                                } else {
                                    $child_name = '';
                                }
                                ?>
                                <li id="<? echo $child_name; ?>" class="child show-children" aria-expanded="false" aria-controls="li-<? echo $child; ?>">
                                <a href="#" role="button" tabindex="0">
                                <? echo get_the_title($child); ?>
                                <span class="icon" aria-hidden="true"></span>
                            </a>
                            </li>
                                <li class="grandchild li-<? echo $child; ?>"><a href="<? echo get_the_permalink($child); ?>" tabindex="0">- <? echo get_the_title($child); ?> Home</a><?
                            } else { ?>
                                <li class="child">
                                <a href="<? echo get_the_permalink($child); ?>" tabindex="0"><? echo get_the_title($child); ?></a>
                                </li><?
                            }
                        }
                    }
                    ?>
                </ul>
            </nav>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    jQuery(".show-children a").on('click', function(event){
                        event.preventDefault();
                        // aria
                        var clicked_li = jQuery(this).attr("aria-controls");
                        var close_li = jQuery(this).attr("aria-expanded");
                        if(close_li == "true"){
                            jQuery("."+clicked_li).slideUp();
                            jQuery(this).parent().removeClass("list-open");
                            jQuery(this).attr("aria-expanded", "false");
                        } else {
                            jQuery("."+clicked_li).slideDown(300);
                            jQuery(this).parent().addClass("list-open");
                            jQuery(this).attr("aria-expanded", "true");
                        }
                    });

                });
            </script><?
        }
        ?>
    </div>
    </aside>
</div>