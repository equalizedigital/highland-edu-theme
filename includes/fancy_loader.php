<link rel="stylesheet" href="<?php bloginfo('template_url');?>/includes/fancybox/jquery.fancybox.css">
<script type="text/javascript" src="<?php bloginfo('template_url');?>/includes/fancybox/jquery.fancybox.pack.js"></script>

<!--<link rel="stylesheet" href="<?php bloginfo('template_url');?>/includes/fancybox/helpers/jquery.fancybox-thumbs.css">
<script type="text/javascript" src="<?php bloginfo('template_url');?>/includes/fancybox/helpers/jquery.fancybox-thumbs.js"></script>-->

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".fancybox").fancybox({
			maxWidth	: 800,
			maxHeight	: 800,
			fitToView	: false,
			width		: '80%',
			height		: '80%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none',
			helpers : {
				 	overlay : {
		            css : {
		                'background' : 'rgba(0, 0, 0, 0.8)'
		            }
				}
    }
		});
	});
</script>
<style type="text/css">
/* overides */
.fancybox-nav span {
    visibility: visible;
}

.fancybox-prev {
    left: -80px;
}

.fancybox-next {
    right: -80px;
}
</style>
