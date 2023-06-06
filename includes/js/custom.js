jQuery(document).ready(function($) {
    // .simpleTabsNavigation click event
    function setCurrentTab(elem) {
            //controls
            var controls = $(elem).attr('aria-controls');
            // aria-selected
            $('.customSimpleTabs [role=tab]').attr('aria-selected', 'false');
            $(elem).attr('aria-selected', 'true');
            // tabindex
            $('.customSimpleTabs [role=tab]').attr('tabindex', -1);
            $(elem).attr('tabindex', 0);
            // aria-hidden
            $('.customSimpleTabs [role=tabpanel]').attr('aria-hidden', 'true');
            $('#' + controls).attr('aria-hidden', 'false');
    }
    $('.customSimpleTabs [role=tab]').each(function() {
        // if aria-selected is true then tabindex is 0 else -1
        $(this).attr('tabindex', $(this).attr('aria-selected') === 'true' ? 0 : -1);
    });
    $('.customSimpleTabs [role=tab]').click(function() {
        setCurrentTab(this);
    });
    $('.customSimpleTabs [role=tab]').keydown(function(e) {
        // Left Arrow
        if (e.keyCode == 37) {
            // if first tab then focus last tab
            if ($(this).prev().length == 0) {
                $('.customSimpleTabs [role=tab]:last').focus();
                setCurrentTab($('.customSimpleTabs [role=tab]:last'));
            } else {
                $(this).prev().focus();
                setCurrentTab($(this).prev());
            }
        }
        // Right Arrow
        if (e.keyCode == 39) {
            // if last tab then focus first tab
            if ($(this).next().length == 0) {
                $('.customSimpleTabs [role=tab]:first').focus();
                setCurrentTab($('.customSimpleTabs [role=tab]:first'));
            } else {
                $(this).next().focus();
                setCurrentTab($(this).next());
            }
        }
        // home button select and activate the first tab.
        if (e.keyCode == 36) {
            //prevent default action
            e.preventDefault();
            $('.customSimpleTabs [role=tab]:first').focus();
            setCurrentTab($('.customSimpleTabs [role=tab]:first'));
        }
        // end button select and activate the last tab.
        if (e.keyCode == 35) {
            //prevent default action
            e.preventDefault();
            $('.customSimpleTabs [role=tab]:last').focus();
            setCurrentTab($('.customSimpleTabs [role=tab]:last'));
        }
    });

});