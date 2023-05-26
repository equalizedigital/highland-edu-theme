<?
	defined('ABSPATH') OR exit;
	/**
	 * @package WordPress
	 * Template Name: Site Map Page
	 * @subpackage WP-Skeleton
	 */

	get_header();
get_template_part( 'sub-header', 'index' ); //the  header stuffs
	get_template_part( 'menu', 'index' ); //the  menu + logo/site title
?>

<div class="super-container interior-page">
	<div class="container">
	    <div class="sixteen columns alpha">
			<div id="primary" class="full-width">
				<div id="content">
	                <div class="two-thirds column alpha">
	                    <div class="main">
	                    <?php the_post();
								if( has_post_thumbnail() ){
		                            the_post_thumbnail('featured-image', array('class' => "header-image"));
								  }
							  ?>
	                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
	                            <header class="entry-header">
	                                <h1 class="entry-title"><?php the_title(); ?></h1>
	                            </header><!-- .entry-header -->

	                            <div class="entry-content">
	                                <?php
		                                $exc_args = array(
		                                    'post',
											'event',
											'attachment',
											'slide',
			                                'class',
			                                'program-info',
			                                'scholarship',
			                                'staff',
			                                'announcement',
			                                'news',
			                                'story',
			                                'faq',
			                                'human-resource',
			                                'bulletin-board',
			                                'tour-date',
										);
		                                foreach( get_post_types( array('public' => true) ) as $post_type ) {
											if(in_array($post_type, $exc_args)){
												continue;
											}

											$pt = get_post_type_object( $post_type );

											echo '<h2>'.$pt->labels->name.'</h2>';
											echo '<ul class="site-map">';

											query_posts('post_type='.$post_type.'&posts_per_page=-1');
											while(have_posts()){
												the_post();

												//check to see if current post has a parent
												$item_has_parent = get_post_ancestors(get_the_id());
												if(empty($item_has_parent)){
													$parent_list[] = array('id' => get_the_id(), 'title' => get_the_title());
												}
												if(!empty($parent_list)){
													//sorting by key row so that we can sort the entire array by title
													foreach ($parent_list as $key => $row){
														$parent_id[$key] = $row['id'];
														$parent_title[$key] = $row['title'];
													}
													array_multisort($parent_title, SORT_ASC | SORT_REGULAR, $parent_list);
													foreach ($parent_list as $key => $row){
														$parent_id[$key] = $row['id'];
													}
												}
											}

											foreach($parent_id as $parent){
												$exclusion= get_post_meta($parent, '_cmb_sitemap_checkbox', true);
												if($exclusion != 'on'){
													echo '<li><a href="'.get_permalink($parent).'">'.get_the_title($parent).'</a></li>';

													//check to see if this particular parent has current children
													$has_child = get_children(array('post_type' => array('page', 'service'), 'post_parent' => $parent , 'orderby' => 'title', 'order' => 'ASC'));
													if($has_child){
														echo '<ul>';
														foreach($has_child as $child){
															$child_id 	 = $child->ID;
															echo '<li><a href="'.get_permalink($child_id).'">'.get_the_title($child_id).'</a></li>';
															$grandchild  = get_children(array('post_parent' => $child_id, 'orderby' => 'title', 'order' => 'ASC'));
															if ($grandchild){
																$found = 0;
																foreach($grandchild as $spoiledbrat){
																	if($spoiledbrat->post_type != "attachment"){
																		if($found == 0){
																			echo '<ul>';
																			$found = 1;
																		}
																		$spoiled_id = $spoiledbrat->ID;
																		echo '<li><a href="'.get_permalink($spoiled_id).'">'.get_the_title($spoiled_id).'</a></li>';
																	}
																}
																if($found == 1){
																	echo '</ul>';
																}
															}
														}
														echo '</ul>';
													}
												}
											}

											echo '</ul>';
											unset($parent_list, $parent_title, $parent_id, $parent, $child_id, $child_title, $child);
										}
									?>                            </div><!-- .entry-content -->
	                        </article><!-- #post-<?php the_ID(); ?> -->
						</div><!-- #main -->
	                </div><!-- two-thirds -->
	                <?php get_sidebar(); ?>
				</div><!-- #content -->
			</div><!-- #primary -->
	    </div>
	</div>
</div>
   
<?php get_footer(); ?>