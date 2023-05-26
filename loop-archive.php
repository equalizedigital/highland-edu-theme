<?
	//echo '<img class="feat_img" src="'.get_bloginfo('template_url').'/images/inner-header.jpg" />'; 
	$post_type_object = get_post_type_object($post_type);
	$month = get_query_var('monthnum');
	$year  = get_query_var('year');
	$queried_object = get_queried_object();
	
	if(empty($queried_object)){
		echo '<h1 class="entry-title">No results</h1>';
		echo 'No search terms were provided. Please try again.';
		get_search_form();
	} else {
	
		if(is_tax() || is_category()) {
			echo '<h1 class="entry-title">'.$post_type_object->labels->name.' Archive: '.$queried_object->name.'</h1>';
		} elseif(is_author()) {
			echo '<h1 class="entry-title">Author Archive: '.get_the_author_meta('display_name').'</h1>';
		} elseif(!empty($month)) {
			echo '<h1 class="entry-title">'.$queried_object->labels->name.' Archive: '.date('F',mktime(0,0,0,$month,10)).(!empty($year) ? ', '.$year : '').'</h1>';
		} else {
			echo '<h1 class="entry-title">Blog</h1>';
		}
	}
				
	while (have_posts()) : the_post();
?>
	<article id="post-<? the_ID(); ?>" class="blog-object">
	
	<h2 class="blog-title">
		<a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>"><? the_title(); ?></a>
	</h2>
										
	<div class="blog-entry-meta">
		<small><? the_time('F jS, Y'); ?></small>
	</div>
	<? /*if(has_post_thumbnail()) { ?>
		<a href="<? the_permalink(); ?>" title="<? the_title_attribute(); ?>">
			<? the_post_thumbnail('blog-small', array('class' => "lefty blog-thumb")); ?>
		</a>
	<? } */?>
	
	<? mstar_custom_excerpt($words = 50, $link_text = 'read more', $allowed_tags = '', $smileys = 'no', $link = '' );?>
	</article>
	<?
	endwhile;
	?>
	
	<div class="navigation">
		<span class="older"><? next_posts_link('« Older') ?></span>
		<span class="newer"><? previous_posts_link('Newer »') ?></span>
	</div><!-- .navigation -->