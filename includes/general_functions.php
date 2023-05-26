<?php
/*
	GENERAL FUNCTIONS!
 
			 __,-.       _.--""""--.
	 __     ( .`-') . "             "-.
	|"""\-=(_ (_,_)                    `.
	(____)   `--'                        o
	
	
*/

/*// returns well formed URL
function correct_url($address)
{
    if (!empty($address) AND $address{0} != '#' AND 
    strpos(strtolower($address), 'mailto:') === FALSE AND 
    strpos(strtolower($address), 'javascript:') === FALSE)
    {
        $address = explode('/', $address);
        $keys = array_keys($address, '..');

        foreach($keys AS $keypos => $key)
            array_splice($address, $key - ($keypos * 2 + 1), 2);
        $address = implode('/', $address);
        $address = str_replace('./', '', $address);
        $scheme = parse_url($address);
        if (empty($scheme['scheme']))
            $address = 'http://' . $address;
        $parts = parse_url($address);
        $address = strtolower($parts['scheme']) . '://';
        if (!empty($parts['user']))
        {
            $address .= $parts['user'];
            if (!empty($parts['pass']))
                $address .= ':' . $parts['pass'];
            $address .= '@';
        }
        if (!empty($parts['host']))
        {
            $host = str_replace(',', '.', strtolower($parts['host']));
            if (strpos(ltrim($host, 'www.'), '.') === FALSE)
                $host .= '.com';
            $address .= $host;
        }
        if (!empty($parts['port']))
            $address .= ':' . $parts['port'];
        $address .= '/';

        if (!empty($parts['path']))
        {
            $path = trim($parts['path'], ' /\\');
            if (!empty($path) AND strpos($path, '.') === FALSE)
                $path .= '/';
            $address .= $path;
        }
        if (!empty($parts['query']))
            $address .= '?' . $parts['query'];
        return $address;
    }
    else
        return FALSE;
}*/

// returns preformatted var dump
function var_viewer( $variable ) {
	echo '<pre>';
	print_r($variable);
	echo '</pre>';
}

// content loading in ajax? 
function is_ajax() {
    return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest");
}

// array_multisort variant
function array_msort($array, $cols)
{
    $colarr = array();
    foreach ($cols as $col => $order) {
        $colarr[$col] = array();
        foreach ($array as $k => $row) { $colarr[$col]['_'.$k] = strtolower($row[$col]); }
    }
    $eval = 'array_multisort(';
    foreach ($cols as $col => $order) {
        $eval .= '$colarr[\''.$col.'\'],'.$order.',';
    }
    $eval = substr($eval,0,-1).');';
    eval($eval);
    $ret = array();
    foreach ($colarr as $col => $arr) {
        foreach ($arr as $k => $v) {
            $k = substr($k,1);
            if (!isset($ret[$k])) $ret[$k] = $array[$k];
            $ret[$k][$col] = $array[$k][$col];
        }
    }
    return $ret;
}

function is_blog() {
	if (is_home() || is_singular('post') || is_post_type_archive('post'))
		return true;
	else return false;
}

add_action('pre_get_posts','mstar_exclude_posts_from_search');
function mstar_exclude_posts_from_search( $query ){

	if( $query->is_main_query() && is_search() ){
		//Exclude posts by ID
		$post_ids = array(8368);
		$query->set('post__not_in', $post_ids);
	}

}


// gallery hack
add_filter('wp_get_attachment_link', 'mstar_gallery_hack', 10, 4);
function mstar_gallery_hack($content, $post_id, $size, $permalink) {
	if(!$permalink){
		global $post;
			$image = wp_get_attachment_image_src($post_id, 'large');
			$attachment = get_post( $post_id );
            $rel = $attachment->post_excerpt;
			//$title = $attachment->post_title;
			$caption = $attachment->post_content;
			//$new_content = preg_replace('/href=\'(.*?)\'/', 'href="' . $image[0] . '" rel="gallery-' . $title . '" title="'. $title .' : '.$caption. '" class="fancybox"', $content);
			$new_content = preg_replace('/href=\'(.*?)\'/', 'href="' . $image[0] . '" rel="fancy-gallery-'.$rel.'" title="'.$caption. '" class="fancybox"', $content);
   //var_viewer($content);
        return $new_content;
	}

	return $content;
}

// Adds initial meta to each attachment
function add_initial_file_size_postmeta($column_name, $post_id) {
    static $query_ran;

    if($query_ran !== null) {
        $all_imgs = new WP_Query(array(
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'posts_per_page' => -1,
            'fields'         => 'ids'
        ));
        $all_imgs_array = $all_imgs->posts;
        foreach($all_imgs_array as $a) {
            if(!get_post_meta($a, 'filesize', true)) {
                $file = get_attached_file($a);
                update_post_meta($a, 'filesize', filesize($file));
            }
        }
        $query_ran = true;
    }
}
//add_action('manage_media_custom_column', __NAMESPACE__.'add_initial_file_size_postmeta');


// Ensure file size meta gets added to new uploads
function add_filesize_metadata_to_images($meta_id, $post_id, $meta_key, $meta_value) {
    if('_wp_attachment_metadata' == $meta_key) {
        $file = get_attached_file($post_id);
        update_post_meta($post_id, 'filesize', filesize($file));
    }
}
add_action('added_post_meta', 'add_filesize_metadata_to_images', 10, 4);

// Add the column
function add_column_file_size($posts_columns) {
    $posts_columns['filesize'] = __('File Size');
    return $posts_columns;
}
add_filter('manage_media_columns', 'add_column_file_size');

// Populate the column
function add_column_value_file_size($column_name, $post_id) {
    if('filesize' == $column_name) {
        if(!get_post_meta($post_id, 'filesize', true)) {
            $file      = get_attached_file($post_id);
            $file_size = filesize($file);
            update_post_meta($post_id, 'filesize', $file_size);
        } else {
            $file_size = get_post_meta($post_id, 'filesize', true);
        }
        echo size_format($file_size, 2);
    }
    return false;
}
add_action('manage_media_custom_column', 'add_column_value_file_size', 10, 2);

// Make column sortable
function add_column_sortable_file_size($columns) {
    $columns['filesize'] = 'filesize';
    return $columns;
}
add_filter('manage_upload_sortable_columns', 'add_column_sortable_file_size');

// Column sorting logic (query modification)
function sortable_file_size_sorting_logic($query) {
    global $pagenow;
    if(is_admin() && 'upload.php' == $pagenow && $query->is_main_query() && !empty($_REQUEST['orderby']) && 'filesize' == $_REQUEST['orderby']) {
        $query->set('order', 'ASC');
        $query->set('orderby', 'meta_value_num');
        $query->set('meta_key', 'filesize');
        if('desc' == $_REQUEST['order']) {
            $query->set('order', 'DSC');
        }
    }
}
add_action('pre_get_posts', 'sortable_file_size_sorting_logic');

function mstar_embed_defaults($embed_size){
    $embed_size['width'] = 1280;
    $embed_size['height'] = 720;
    return $embed_size;
}
add_filter('embed_defaults', 'mstar_embed_defaults');