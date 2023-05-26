<ul class="comments-holder">
	<?
		wp_list_comments(array(
			'style' => 'ul',
			'short_ping' => true,
			'avatar_size'=> 50,
			'max_depth' => 3,
		));
	?>
</ul>

<div class="reply-holder">
	<? comment_form(); ?>
</div>
