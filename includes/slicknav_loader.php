<script src="<? echo "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : ""); ?>://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/slicknav/jquery.slicknav.min.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/includes/slicknav/slicknav.min.css">


<script type="text/javascript">

//-------This code is for a combine menu. ie: running topnav and main nav together----------
    jQuery(document).ready(function () {

        //Clone both menus to keep them intact
        var combinedMenu = jQuery('#menu-main-menu').clone();
        var secondMenu = jQuery('#menu-topnav').clone();

        secondMenu.children('li').appendTo(combinedMenu);

        combinedMenu.slicknav({
            duplicate: false,
            label: '',
            duration: 400,
            easingOpen: "swing", //available with jQuery UI
            easingClose: "swing",
	        prependTo: '#slicknav_holder',
        });

        /*
//-------This code is for a single menu-----------
         jQuery('#menu-main-menu').slicknav({
         duplicate: false,
         label: '',
         duration: 400,
         easingOpen: "swing", //available with jQuery UI
         easingClose: "swing",
         });
         */
    })
</script>