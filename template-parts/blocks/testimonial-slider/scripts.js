// Function to add event listeners to buttons
function addButtonEventListeners() {
    const buttons = document.querySelectorAll('.button');
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
    if (controlBtn) {
        controlBtn.addEventListener('click', () => {
            if (controlBtn.getAttribute('aria-pressed') === 'false') {
                testimonialSlider.autoplay.stop();
                controlBtn.querySelector('.screen-reader-text').textContent = 'Play';
                controlBtn.querySelector('.dashicons').classList.replace('dashicons-controls-pause', 'dashicons-controls-play');
                controlBtn.setAttribute('aria-pressed', 'true');
            } else {
                testimonialSlider.autoplay.start();
                controlBtn.querySelector('.screen-reader-text').textContent = 'Pause';
                controlBtn.querySelector('.dashicons').classList.replace('dashicons-controls-play', 'dashicons-controls-pause');
                controlBtn.setAttribute('aria-pressed', 'false');
            }
        });
    }
}

// Swiper configuration
const testimonialSliderArgs = {
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