<?
	/**
	 * @package WordPress
	 * @subpackage WP-Skeleton
	 */
?>

        <?php
            while ( have_posts() ) : the_post();
                $is_page_locked_student = get_post_meta(get_the_id(), '_cmb_student_portal_checkbox', true);
                $is_page_locked_staff = get_post_meta(get_the_id(), '_cmb_staff_portal_checkbox', true);
                if ($is_page_locked_staff == 'on' && $_SESSION['Login_Status'] != "staff") {
                    continue;
                }
                if ($is_page_locked_student == 'on' && $_SESSION['Login_Status'] != "student") {
                    continue;
                }
            ?>
                        
        <div id="post-<?php the_ID(); ?>">
          <div class="title">            
             <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title('<h3>', '</h3>'); ?></a>  <!--Post titles-->
          </div>
             
            <?
	            add_filter( 'the_excerpt', 'strip_shortcodes');
	            echo apply_filters('the_excerpt', utf8_truncate( get_the_content(), $max_chars = 200, $append = "\xC2\xA0…" ));
            ?> <!--The Content-->
	 
			<!--The Meta, Author, Date, Categories and Comments-->
			<?
				if(! is_page() && get_post_type() == 'post') { ?>
				 <div class="meta">
				     Date posted: <?php echo get_the_date(); ?>
				     | Author: <?php the_author_posts_link(); ?>
				     | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
				     <p>Categories: <?php the_category(' '); ?></p>
				 </div><?
				}
			?>
             <hr />
		</div>
                        
			
        <?php endwhile; ?><!--  End the Loop -->

        <?php /* Display navigation to next/previous pages when applicable */ ?>
  
        <?php if (  $wp_query->max_num_pages > 1 ) : ?>

          <nav id="nav-below">
            <?php 
			global $wp_query;  
  
			$total_pages = $wp_query->max_num_pages;  
			  
			if ($total_pages > 1){  
			  
			  $current_page = max(1, get_query_var('paged'));  
			  $big = 99999999;  
			  echo '<ul class="bootpag">';  
			  str_replace($big, '%#%', get_pagenum_link($big));
			  
			  $links = paginate_links(array(  
			      'base' => str_replace($big, '%#%', get_pagenum_link($big)),  
			      'format' => '/page/%#%',  
			      'current' => $current_page,  
			      'total' => $total_pages,
			      'prev_next' => false,
			      'show_all' => true,
			      'type' => 'array',
			    ));  
			  
			  foreach($links as $link){
				  echo '<li>',$link,'</li>';
			  }
			  
			  echo '</ul>';  
			    
			}    
			?>
          </nav><!-- #nav-below -->
          
        <?php endif; ?>
          
        <?php /* Only load comments on single post*/ ?>
        <?php if(! is_page() || is_single()) : comments_template( '', true ); endif; ?>

    
