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
        // if space prevent scrolling
        if (e.keyCode == 32) {
            e.preventDefault();
        }
        if (e.keyCode == 13 || e.keyCode == 32) {
            setCurrentTab(this);
        }
    });
    $('.customSimpleTabs [role=tab]').keydown(function(e) {
        // Left Arrow
        if (e.keyCode == 37) {
            // if first tab then focus last tab
            if ($(this).prev().length == 0) {
                $('.customSimpleTabs [role=tab]:last').focus();
            } else {
                $(this).prev().focus();
            }
        }
        // Right Arrow
        if (e.keyCode == 39) {
            // if last tab then focus first tab
            if ($(this).next().length == 0) {
                $('.customSimpleTabs [role=tab]:first').focus();
            } else {
                $(this).next().focus();
            }
        }
        // home button select and activate the first tab.
        if (e.keyCode == 36) {
            //prevent default action
            e.preventDefault();
            $('.customSimpleTabs [role=tab]:first').focus();
        }
        // end button select and activate the last tab.
        if (e.keyCode == 35) {
            //prevent default action
            e.preventDefault();
            $('.customSimpleTabs [role=tab]:last').focus();
        }
    });
    $('.simple-modal').each(function() {
        // let spacebar fire click event
        $(this).keydown(function(event) {
            if (event.keyCode == 32) {
                event.preventDefault();
                $(this).click();
            }
        });
        $(this).click(function(event) {
            event.preventDefault();
            let method = $(this).data('method');
            // add tracking id so we can return focus to element that opened modal
            $(this).addClass('simple-modal-opened');
            if ( 'ajax' === method ) {
                let url = $(this).attr('href');
                let body = $('body');
                // create new dom modal
                let modal = document.createElement('div');
                modal.classList.add('simple-modal-wrapper');
                modal.classList.add('loading');
                document.body.appendChild(modal);
                // close button
                let closeButton = document.createElement('button');
                closeButton.classList.add('simple-modal-close');
                closeButton.setAttribute('aria-label', 'Close dialog');
                closeButton.innerHTML = '<span aria-hidden="true">&times;</span>';
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'html',
                    beforeSend: function() {
                        $('.simple-modal-wrapper').addClass('loading');
                        body.addClass('simple-modal-open');
                    },
                    success: function(data) {
                        $('.simple-modal-wrapper').removeClass('loading');
                        let modalContent = document.createElement('div');
                        modalContent.classList.add('simple-modal-content');
                        // add aria attributes to modelContent
                        modalContent.setAttribute('role', 'dialog');
                        modalContent.setAttribute('aria-modal', 'true');
                        modalContent.setAttribute('aria-labelledby', 'modal-title');
                        // add id to first h1 so we can use it for aria-labelledby
                        data = data.replace(/<h1([^>]*)>/, '<h1$1 id="modal-title">');
                        modalContent.innerHTML = data;
                        modalContent.appendChild(closeButton);
                        $('.simple-modal-wrapper').html(modalContent);
                        body.addClass('simple-modal-open');
                        // move focus to first focusable element
                        let tabbable =  $('.simple-modal-content').find('[tabindex]:not([tabindex="-1"]), a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled])');
                        let firstTabbable = tabbable.first();
                        let lastTabbable = tabbable.last();
                        // make title focusable
                        $('#modal-title').attr('tabindex', '-1');
                        $('#modal-title').focus();
                        lastTabbable.keydown(function(e){
                            if ( e.keyCode === 9 && !e.shiftKey ) {
                                e.preventDefault();
                                firstTabbable.focus();
                            }
                        });

                    }
                });
                $(document).on('click', '.simple-modal-close', function() {
                    $('.simple-modal-wrapper').remove();
                    body.removeClass('simple-modal-open');
                    $('.simple-modal-opened').focus();
                    $('.simple-modal-opened').removeClass('simple-modal-opened');
                });
                $(document).on('keydown', function(event) {
                    if (event.keyCode == 27) {
                        $('.simple-modal-wrapper').remove();
                        body.removeClass('simple-modal-open');
                        $('.simple-modal-opened').focus();
                        $('.simple-modal-opened').removeClass('simple-modal-opened');
                    }
                });
            }
        });
    });
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
    $('.slicknav_row').each(function() {
        $(this).attr('aria-label', 'Toggle Main Menu');
        $(this).removeAttr('aria-haspopup');
        $(this).attr('aria-controls', 'menu-main-menu');
    });
    $('.slicknav_menu').each(function() {
        $(this).find('[role="menu"]').removeAttr('role');
        $(this).find('[role="menuitem"]').removeAttr('role');
        $(this).find('[role="menubar"]').removeAttr('role');
    });
    $('.slicknav_btn').each(function() {
        $(this).removeAttr('aria-haspopup');
        $(this).attr('aria-controls', 'menu-main-menu');
        $(this).attr('aria-label', 'Toggle Main Menu');
        $(this).attr('aria-expanded', 'false');
        $(this).on( 'click keydown', function(e){
            if (e.type == 'keydown' && e.keyCode != 32 && e.keyCode != 13) {
                return;
            }
            if ( $(this).attr('aria-expanded') == 'false' ) {
                $(this).attr('aria-expanded', 'true');
            } else {
                $(this).attr('aria-expanded', 'false');
            }
        });
    });
    function renderMobileTable() {
        if ( $(window).width() < 1024 ) {
            $('.schedule-table').each(function() {
                if ( $(this).find('thead').length ) {
                    let th = $(this).find('thead th');
                    let ths = [];
                    th.each(function( index ) {
                        ths.push($(this).text());
                    });
                    let tr = $(this).find('tbody tr');
                    let i = 0;
                    tr.each(function( index ) {
                        $(this).find('th').prepend(ths[0] + ': ');
                        i = 1;
                        $(this).find('td').each(function(index) {
                            $(this).prepend(ths[i] + ': ');
                            i++;
                        });
                    });
                }
            });
        }
    }
    $('.dropdown-toggle').each(function() {
        $(this).on('click', function(e) {
            e.preventDefault();
            let controls = $(this).attr('aria-controls');
            if ( $(this).attr('aria-expanded') == 'true' ) {
                // close dropdown
                $('#' + controls).attr('aria-hidden', 'true');
                $(this).attr('aria-expanded', 'false');
            } else {
                // close previously opened dropdowns
                $('.dropdown-toggle-content').attr('aria-hidden', 'true');
                $('.dropdown-toggle').attr('aria-expanded', 'false');
                //open dropdown
                $(this).attr('aria-expanded', 'true');
                $('#' + controls).attr('aria-hidden', 'false');
                let tabbable =  $('#' + controls).find('[tabindex]:not([tabindex="-1"]), a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled])');
                let firstTabbable = tabbable.first();
                firstTabbable.focus();
                lastTabbable = tabbable.last();
                lastTabbable.keydown(function(e){
                    if ( e.keyCode === 9 && !e.shiftKey ) {
                        e.preventDefault();
                        firstTabbable.focus();
                    }
                });
                //close dropdown on escape key
                $(document).on('keydown', function(event) {
                    if (event.keyCode == 27) {
                        $('#' + controls).attr('aria-hidden', 'true');
                        $('#' + controls).find('.dropdown-toggle').attr('aria-expanded', 'false');
                        let trigger = $('#' + controls);
                        trigger = trigger.attr('aria-labelledby');
                        $('#' + trigger).attr('aria-expanded', 'false');
                        $('#' + trigger).focus();
                    }
                });
                
            }
        });
        // click outside but not on .dropdown-toggle
        $(document).mouseup(function(e) {
            let container = $('.dropdown-toggle-content[aria-hidden="false"]');
            if (!container.is(e.target) && container.has(e.target).length === 0 && !$('.dropdown-toggle').is(e.target) && $('.dropdown-toggle').has(e.target).length === 0) {
                container.attr('aria-hidden', 'true');
                container.find('.dropdown-toggle').attr('aria-expanded', 'false');
                //focus back to dropdown toggle (aria-labelledby)
                let trigger = container.attr('aria-labelledby');
                $('#' + trigger).attr('aria-expanded', 'false');
                $('#' + trigger).focus();
            }
        });
        $('.dropdown-cancel').on('click', function(e) {
            e.preventDefault();
            let dropdown = $(this).closest('.dropdown-toggle-content');
            dropdown.attr('aria-hidden', 'true');
            dropdown.find('.dropdown-toggle').attr('aria-expanded', 'false');
            //focus back to dropdown toggle (aria-labelledby)
            let trigger = dropdown.attr('aria-labelledby');
            $('#' + trigger).attr('aria-expanded', 'false');
            $('#' + trigger).focus();
        });
        $('.dropdown-apply').on('click', function(e) {
            e.preventDefault();
            let dropdown = $(this).closest('.dropdown-toggle-content');
            dropdown.attr('aria-hidden', 'true');
            dropdown.find('.dropdown-toggle').attr('aria-expanded', 'false');
            //focus back to dropdown toggle (aria-labelledby)
            let trigger = dropdown.attr('aria-labelledby');
            $('#' + trigger).attr('aria-expanded', 'false');
            $('#' + trigger).focus();
            //refresh facetwp
            FWP.refresh();
        });
    });
    $(document).on('facetwp-loaded', function() {
        let totalResults = FWP.settings.pager.total_rows;
        let label = $('.table-sort-results-number').data('label');
        $('.table-sort-results-number').html(totalResults + ' ' + label);
        $("#fwp_results_per_page").on('change', function() {
            FWP.refresh();
        });
        if ( 'undefined' !== typeof FWP_HTTP ) {
            FWP.auto_refresh = false;
        }
        $(document).on('change','.facetwp-type-pager select', function() {
            FWP.refresh();
        });
        $(document).on('click', '.facetwp-checkbox[aria-checked=true]', function(e) {
            FWP.refresh();
        });
        $.each(FWP.settings.num_choices, function(key, val) {
          var $facet = $('.facetwp-facet-' + key);
          var $wrap = $facet.closest('.dropdown-content');
          if ($wrap.length) {
            var $button = $wrap.parent('.dropdown-toggle-content').attr('aria-labelledby');
            var $button = $('#' + $button);
            //disable button if no options
            if ( val == 0 ) {
                $button.attr('disabled', 'disabled');
                $button.addClass('disabled');
            } else {
                $button.removeAttr('disabled');
                $button.removeClass('disabled');
            }
          }
        });
        // delay 100 ms to allow for facetwp to load
        setTimeout(function() {
            $(".staff-az .facetwp-link.available").each(function() {
                $(this).attr('aria-label', 'show only last names starting with ' + $(this).attr('data-id'));
            });    
        }, 100);
      });
    $(document).on('facetwp-loaded', function() {
        renderMobileTable();
    });
    $('.map-wrap').each(function() {
        $(this).attr('role', 'region');
        $(this).attr('aria-label', 'map');
    });
});
