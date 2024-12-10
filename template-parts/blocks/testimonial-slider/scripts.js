// Function to add event listeners to buttons
function addButtonEventListeners() {
    const buttons = document.querySelectorAll('.slide-ctrl');
    buttons.forEach((button) => {
        button.addEventListener('keydown', (event) => {
            if (event.keyCode === 9) {
                event.preventDefault();
                const activeBullet = document.querySelector('.swiper-pagination-bullet-active');
                activeBullet.focus();
            }
        });
    });
}

// Function to add event listeners to pagination bullets
function addPaginationEventListeners(testimonialSlider) {
    const paginationBullets = document.querySelectorAll('.swiper-pagination-bullet');
    paginationBullets.forEach((bullet, index) => {
        bullet.addEventListener('keydown', (event) => {
            if (event.keyCode === 32) {
                event.preventDefault();
                bullet.click();
            }
        });

        bullet.addEventListener('click', () => {
            const h2Element = testimonialSlider.slides[index].querySelector('h2');
            if (h2Element) {
                h2Element.focus();
            }
        });
    });
}

// Function to handle control button click event
function handleControlButtonClick(testimonialSlider) {
    const controlBtn = document.querySelector('.eqd-slide-button-control');

    document.querySelectorAll('.slide-ctrl').forEach((ctrl) => {
        ctrl.addEventListener('click', function() {

            if (this.classList.contains('pause')) {
                testimonialSlider.autoplay.start();
            } else if (this.classList.contains('play')) {
                testimonialSlider.autoplay.stop();
            }

            document.querySelectorAll('.slide-ctrl').forEach((ctrl) => {
                if (ctrl.classList.contains('pause')) {
                    ctrl.querySelector('.screen-reader-text').textContent = 'Play';
                    ctrl.setAttribute('aria-pressed', 'true');
                    ctrl.classList.remove('pause');
                    ctrl.classList.add('play');
                } else if (ctrl.classList.contains('play')) {
                    ctrl.querySelector('.screen-reader-text').textContent = 'Pause';
                    ctrl.setAttribute('aria-pressed', 'false');
                    ctrl.classList.remove('play');
                    ctrl.classList.add('pause');
                }
            });
        });
    });
}

// Swiper configuration
const testimonialSliderArgs = {
    loop: true,
    speed: 1000,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    on: {
        afterInit: function(testimonialSlider) {
            addButtonEventListeners();
            addPaginationEventListeners(testimonialSlider);
            handleControlButtonClick(testimonialSlider);
        },
    },
};

// Initialize Swiper on DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.testimonial-slider-swiper', testimonialSliderArgs);
});

// Initialize Swiper for block previews
const initializeBlock = function(block) {
    new Swiper('.testimonial-slider-swiper', testimonialSliderArgs);
};

if (window.acf) {
    window.acf.addAction('render_block_preview/type=testimonial-slider', initializeBlock);
}