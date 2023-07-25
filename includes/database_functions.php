<?
	defined('ABSPATH') OR exit;
	/**
	 * @package WordPress
	 * Template Name: Update Database Page
	 * @subpackage WP-Skeleton
	 */
	
	get_header(); 
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>

<div class="sixteen columns alpha">
	<div id="primary" class="full-width">
		<div id="content">
            <div class="two-thirds column alpha">
				<main id="main-content" class="main"> 
					<? the_post(); 
						if(has_post_thumbnail()){
							the_post_thumbnail('featured-image', array('class' => "header-image"));    	
						}
					?>
                    <article id="post-<? the_ID(); ?>" <? post_class(); ?> role="article">
                        <header class="entry-header">
                            <h1 class="entry-title"><? the_title(); ?></h1>
                        </header><!-- .entry-header -->
    
                        <div class="entry-content">
                        	<?
                            	/* First we must set the a variable up with
								 * the location of our file($file_url). Then 
								 * we must grab that file($file_data) so that 
								 * we can convert it into an array($lines).
								 */
								$file_url = "";//file must be csv 
								$file_data = file_get_contents($file_url);
								$lines = explode(PHP_EOL, $file_data);
								
								/* Create basic array variable and loop through
								 * the csv file line by line. The str_getcsv 
								 * function will turn the csv data into a basic
								 * array we can use to update and create our
								 * new post data.
								 */
								$array = array();
								foreach ($lines as $line) {
								    $array[] = str_getcsv($line);
								}
								
								/* Following three lines are for the purpose of using
								 * the media sideload function. Without these 3 files
								 * media sideload will not work.
								 * 
								 * This option should be used for small updates only.
								 * Anything over 10-15 files and the server may hang
								 * due to cpu restrictions.
								 */
								//require_once(ABSPATH . 'wp-admin' . '/includes/image.php');
							    //require_once(ABSPATH . 'wp-admin' . '/includes/file.php');
							    //require_once(ABSPATH . 'wp-admin' . '/includes/media.php');
								
								/* count($array) - 2: Reason we do this is because
								 * we start at row 1 instead of row 0, otherwise we'd
								 * use -1 as the final row is always empty.
								 */
								for($i = 1; $i <= count($array) -2; $i++){
									//create a page variable to hold our post object
									$page = array();
									$prefix = '_cmb_';
									/* This variable will contain all data from a 
									 * single row of our csv. 
									 */
									$new_entry = $array[$i];
									/* Check to see if we have already created this
									 * post previously. Make sure to update 'post' 
									 * with the desired post type.
									 * Your $new_entry[1] variable should contain
									 * the slug for the page or post in question. In
									 * the past I have used a random ID for this.
									 * i.e. A physicians NPI number rather than their
									 * first and last name. 
									 */
									if(get_page_by_path($new_entry[1], OBJECT, 'post')){
										$page = get_page_by_path($new_entry[1], OBJECT, 'post');
									}
									
									/* If the $page variable is still empty, create
									 * a new post. Remember to update the post type
									 * and adjust the $new_entry keys to match the 
									 * desired results.
									 *
									 * The wp_insert_post function will return the 
									 * ID of the new post, which will be stored in 
									 * the $insert_data variable.
									 * 
									 * If the page variable is not empty, insert the
									 * ID of that page into the $insert_data variable.
									 */
									if(empty($page)){
										$insert_data = wp_insert_post(
							            	array(
							                	'comment_status' => 'closed',
							                	'ping_status' => 'closed',
							                	'post_author' => 1,
							                	'post_title' => $new_entry[5],
							                	'post_name' => $new_entry[1],
							                	'post_content' => $new_entry[6],
							                	'post_status' => 'publish',
							                	'post_type' => 'post'
							                )
							            );
									} else {
										$insert_data = $page->ID;
									}
									/* Check each column of your current row($new_entry)
									 * to see if the variable contains data. If it does,
									 * insert it into the post($insert_data contains ID).
									 * 
									 * Typically the first column is used to hold our unique
									 * identifier so we don't accidentally overwrite data
									 * from a separate post.
									 */
							        if($new_entry[0]){ //Unique ID Number
										update_post_meta($insert_data, $prefix.'id', $new_entry[0]);
							        }
							        if($new_entry[1]){ //Meta Data Example
										update_post_meta($insert_data, $prefix.'meta_data', $new_entry[1]);
							        }
							        if($new_entry[2]){ //Taxonomy Example
							        	wp_set_object_terms($insert_data, $new_entry[2], 'tax_slug', true);
							        }
							        /* We set this function to a variable to initiate the
								     * file transfer. The variable will hold a true/false 
								     * response to indicate whether or not the media
								     * sideload was a success. You can then use this
								     * variable in your post processing if necessary.
								     */
							        if($new_entry[3]){ //Primary Image URL
										//$image = media_sideload_image($new_entry[3], $insert_data, $desc);
							        }
							    }
							?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-<?php the_ID(); ?> -->
				</main><!-- #main -->
            </div><!-- two-thirds -->
            <? get_sidebar(); ?>  
		</div><!-- #content -->
	</div><!-- #primary -->
</div>
   
<? get_footer(); ?>