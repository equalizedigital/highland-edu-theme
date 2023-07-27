<?php

class topNavWalker extends Walker_Nav_Menu {
    private $current_item;
    /*
    * if the menu item has children and doesn't navigate to a page, then wrap the anchor text in button
    */
    function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0) {
        if ( in_array('menu-item-has-children', $data_object->classes) && ! $data_object->mobile_only ) {
            $data_object->classes[] = 'menu-dark';
            $output .= "<li class='" .  implode(" ", $data_object->classes) . "'>";
            if (  $data_object->url && $data_object->url != '#' ) {
                $output .= '<a class="link-icon" href="' . $data_object->url . '">';
            } else {
                $output .= '<button class="toggle-item-button" aria-expanded="false" aria-controls="menu-' . $data_object->ID . '" id="label-menu-' . $data_object->ID . '">';
            }
            $output .= $data_object->title;
            if (  $data_object->url && $data_object->url != '#' ) {
                $output .= '</a>';
                $output .= '<button class="toggle-button" aria-controls="menu-'. $data_object->ID .'" aria-expanded="false" id="label-menu-'.$data_object->ID.'"><span class="caret-icon" aria-hidden="true"></span><span class="sr-only">'.$data_object->title.'</span>
                </button>';
            } else {
                $output .= '<span class="caret-icon" aria-hidden="true"></span>';
                $output .= '</button>';
            }
        } else {
            $data_object->classes[] = 'menu-dark';
            parent::start_el($output, $data_object, $depth, $args);
        }
        $this->current_item = $data_object;
    }
    function start_lvl(&$output, $depth = 0, $args = null)  {
        $output .= '<ul class="sub-menu" id="menu-' . $this->current_item->ID . ' " aria-labelledby="label-menu-' . $this->current_item->ID . '">';
    }
}

class admissionsWalker extends Walker_Nav_Menu {
    /*
    * if the menu item has children and doesn't navigate to a page, then wrap the anchor text in button
    */
    function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0) {
        // $output .= '<li class="' . implode(" ", $data_object->classes) . '">';
        $output .= '<button class="toggle-mega-menu" aria-expanded="false" aria-controls="admissions-subs" id="admissions-subs-actuator">';
        $output .= $data_object->title;
        $output .= '<span class="caret-icon" aria-hidden="true"></span>';
        $output .= '</button>';
        // $output .= '</li>';
    }
    function start_lvl(&$output, $depth = 0, $args = null)  {
        $output .= '<ul class="sub-menu" id="admissions-subs" aria-labelledby="admissions-subs-actuator">';
    }
    
}

class academicsWalker extends Walker_Nav_Menu {
    /*
    * if the menu item has children and doesn't navigate to a page, then wrap the anchor text in button
    */
    function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0) {
        // $output .= '<li class="' . implode(" ", $data_object->classes) . '">';
        $output .= '<button class="toggle-mega-menu" aria-expanded="false" aria-controls="academics-subs">';
        $output .= $data_object->title;
        $output .= '<span class="caret-icon" aria-hidden="true"></span>';
        $output .= '</button>';
        // $output .= '</li>';
    }
    function start_lvl(&$output, $depth = 0, $args = null)  {
        $output .= '<ul class="sub-menu" id="academics-subs" aria-labelledby="academics-subs-actuator">';
    }
}

class campusWalker extends Walker_Nav_Menu {
    /*
    * if the menu item has children and doesn't navigate to a page, then wrap the anchor text in button
    */
    function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0) {
        // $output .= '<li class="' . implode(" ", $data_object->classes) . '">';
        $output .= '<button class="toggle-mega-menu" aria-expanded="false" aria-controls="campus-subs">';
        $output .= $data_object->title;
        $output .= '<span class="caret-icon" aria-hidden="true"></span>';
        $output .= '</button>';
        // $output .= '</li>';
    }
    function start_lvl(&$output, $depth = 0, $args = null)  {
        $output .= '<ul class="sub-menu" id="campus-subs" aria-labelledby="campus-subs-actuator">';
    }
}

class artsWalker extends Walker_Nav_Menu {
    /*
    * if the menu item has children and doesn't navigate to a page, then wrap the anchor text in button
    */
    function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0){
        // $output .= '<li class="' .implode(" ", $data_object->classes) . '">';
        $output .= '<button class="toggle-mega-menu" aria-expanded="false" aria-controls="arts-subs">';
        $output .= $data_object->title;
        $output .= '<span class="caret-icon" aria-hidden="true"></span>';
        $output .= '</button>';
        // $output .= '</li>';
    }
    function start_lvl(&$output, $depth = 0, $args = null)  {
        $output .= '<ul class="sub-menu" id="arts-subs" aria-labelledby="arts-subs-actuator">';
    }
}

// add menu items checkbox "mobile only"
add_filter('wp_setup_nav_menu_item', 'mobile_only_nav_item');
function mobile_only_nav_item($menu_item) {
    if (isset($menu_item->ID)) {
        $mobile_only = get_post_meta($menu_item->ID, '_menu_item_mobile_only', true);
        $menu_item->mobile_only = $mobile_only;
    }
    // is header item
    if (isset($menu_item->ID)) {
        $header_item = get_post_meta($menu_item->ID, '_menu_item_header_item', true);
        $menu_item->header_item = $header_item;
    }
    return $menu_item;
}

// add checkbox to menu item edit screen
add_action('wp_nav_menu_item_custom_fields', 'mobile_only_nav_item_custom_fields', 10, 2);
function mobile_only_nav_item_custom_fields($item_id, $item) {
    $mobile_only = $data_object->mobile_only;
    ?>
    <p class="field-mobile-only description description-wide">
        <label for="edit-menu-item-mobile-only-<?php echo $item_id; ?>">
            <input type="checkbox" id="edit-menu-item-mobile-only-<?php echo $item_id; ?>" value="1" name="menu-item-mobile-only[<?php echo $item_id; ?>]"<?php checked($mobile_only, 1); ?> />
            Mobile Only Dropdown
        </label>
    </p>
    <p class="field-header-item description description-wide">
        <label for="edit-menu-item-header-item-<?php echo $item_id; ?>">
            <input type="checkbox" id="edit-menu-item-header-item-<?php echo $item_id; ?>" value="1" name="menu-item-header-item[<?php echo $item_id; ?>]"<?php checked($header_item, 1); ?> />
            Header Item
        </label>
    </p>
    <?php
}

// save menu item checkbox
add_action('wp_update_nav_menu_item', 'mobile_only_nav_item_update', 10, 3);
function mobile_only_nav_item_update($menu_id, $menu_item_db_id, $args) {
    $mobile_only = (isset($_REQUEST['menu-item-mobile-only'][$menu_item_db_id]) && $_REQUEST['menu-item-mobile-only'][$menu_item_db_id] == 1) ? 1 : 0;
    update_post_meta($menu_item_db_id, '_menu_item_mobile_only', $mobile_only);
    $header_item = (isset($_REQUEST['menu-item-header-item'][$menu_item_db_id]) && $_REQUEST['menu-item-header-item'][$menu_item_db_id] == 1) ? 1 : 0;
    update_post_meta($menu_item_db_id, '_menu_item_header_item', $header_item);
}

add_filter('walker_nav_menu_start_el','edit_menu_item_heading', 10, 2);
function edit_menu_item_heading($item_output, $item) {
    if ($item->header_item == 1) {
        $item_output = '<h2 class="menu-item-heading">' . $item->title . '</h2>';
    }
    return $item_output;
}
