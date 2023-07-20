jQuery(document).ready(function($) {
    $('.slicknav_nav a a[href^="#"]').each(function() {
        $(this).replaceWith('<span>' + $(this).text() + '</span>');
    });
    $('.slicknav_nav .toggle-item-button').each(function() {
        $(this).replaceWith('<span>' + $(this).text() + '</span>');
    });
    $('li.menu-item-has-children .slicknav_row').each(function() {
        $(this).attr('role', 'button');
        $(this).attr('aria-expanded', 'false');
        $(this).find('.slicknav_arrow').attr('aria-hidden', 'true');
    });
    function toggleAriaExpand(elem) {
        if ( $(elem).attr('aria-expanded') == 'false' ) {
            $(elem).attr('aria-expanded', 'true');
        } else {
            $(elem).attr('aria-expanded', 'false');
        }
    }
    $('.slicknav_nav li.menu-item-has-children a.slicknav_row').on("click", function() {
        toggleAriaExpand(this);
    });
    $('.slicknav_nav a.slicknav_row').on("keydown", function(e) {
        if (e.keyCode == 32) {
            e.preventDefault();
            $(this).click();
        }
        // if enter key
        if (e.keyCode == 13) {
            toggleAriaExpand(this);
        }
    });
    $('.slicknav_btn').each(function() {
        $(this).attr('aria-label', 'Toggle Main Menu');
        $(this).removeAttr('aria-haspopup');
        $(this).attr('aria-controls', 'menu-main-menu');
    });
    $('.slicknav_menu').each(function() {
        $(this).find('[role="menu"]').removeAttr('role');
        $(this).find('[role="menuitem"]').removeAttr('role');
        $(this).find('[role="menubar"]').removeAttr('role');
    });
});