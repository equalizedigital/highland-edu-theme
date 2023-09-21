let args = {
    loop: true,
    speed: 1000,
    autoplay: {
        delay: 5000,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    on: {
        afterInit: function (hl_slider) {
            const button = document.querySelectorAll('.button');
            // on tab jump to the current active bullet
            button.forEach(function (item, index) {
                item.addEventListener('keydown', function (event) {
                    if (event.keyCode === 9) {
                        event.preventDefault();
                        const activeBullet = document.querySelector('.swiper-pagination-bullet-active');
                        activeBullet.focus();
                    }
                });
            });

            const pagination = document.querySelectorAll('.swiper-pagination-bullet');
            pagination.forEach(function (item, index) {
                item.addEventListener('keydown', function (event) {
                    if (event.keyCode === 32) {
                        event.preventDefault();
                        item.click();
                    }
                });

                // Add click event to focus on h2 when pagination bullet is clicked
                item.addEventListener('click', function() {
                    const h2Element = hl_slider.slides[index].querySelector('h2');
                    if (h2Element) {
                        h2Element.focus();
                    }
                });
            });

            const controlBtn = document.querySelector('.hl-button-control');
            controlBtn.addEventListener('click', function () {
                if (this.getAttribute('aria-pressed') === 'false') {
                    hl_slider.autoplay.stop();
                    this.querySelector('.screen-reader-text').value = 'Play';
                    this.querySelector('.dashicons').classList.remove('dashicons-controls-pause');
                    this.querySelector('.dashicons').classList.add('dashicons-controls-play');
                    this.setAttribute('aria-pressed', 'true');
                } else {
                    hl_slider.autoplay.start();
                    this.querySelector('.screen-reader-text').value = 'Pause';
                    this.querySelector('.dashicons').classList.remove('dashicons-controls-play');
                    this.querySelector('.dashicons').classList.add('dashicons-controls-pause');
                    this.setAttribute('aria-pressed', 'false');
                }
            });
        },
    }
};

(function($){

    /**
     * initializeBlock
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */
    var initializeBlock = function( $block ) {
        const hl_slider = new Swiper('.swiper', args);
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        const hl_slider = new Swiper('.swiper', args);
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=slider', initializeBlock );
    }

})(jQuery);
