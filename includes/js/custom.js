jQuery(document).ready(function($) {

    $('.simple-modal').each(function() {
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
                closeButton.setAttribute('aria-label', 'Close');
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
                        firstTabbable.focus();
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
});