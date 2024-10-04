class TestimonialSlider {
    constructor(selector, args) {
        this.selector = selector;
        this.args = args;
        this.init();
    }

    init() {
        document.addEventListener('DOMContentLoaded', () => {
            this.testimonialSlider = new Swiper(this.selector, this.args);
            this.addEventListeners();
        });

        if (window.acf) {
            window.acf.addAction('render_block_preview/type=testimonial_slider', this.initializeBlock.bind(this));
        }
    }

    initializeBlock(block) {
        this.testimonialSlider = new Swiper(this.selector, this.args);
    }

    addEventListeners() {
        this.addButtonEventListeners();
        this.addPaginationEventListeners();

        const controlBtn = document.querySelector('.hl-button-control');
        if (controlBtn) {
            controlBtn.addEventListener('click', () => {
                if (controlBtn.getAttribute('aria-pressed') === 'false') {
                    this.testimonialSlider.autoplay.stop();
                    controlBtn.querySelector('.screen-reader-text').value = 'Play';
                    controlBtn.querySelector('.dashicons').classList.replace('dashicons-controls-pause', 'dashicons-controls-play');
                    controlBtn.setAttribute('aria-pressed', 'true');
                } else {
                    this.testimonialSlider.autoplay.start();
                    controlBtn.querySelector('.screen-reader-text').value = 'Pause';
                    controlBtn.querySelector('.dashicons').classList.replace('dashicons-controls-play', 'dashicons-controls-pause');
                    controlBtn.setAttribute('aria-pressed', 'false');
                }
            });
        }
    }

    addButtonEventListeners() {
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

    addPaginationEventListeners() {
        const paginationBullets = document.querySelectorAll('.swiper-pagination-bullet');
        paginationBullets.forEach((bullet, index) => {
            bullet.addEventListener('keydown', (event) => {
                if (event.keyCode === 32) {
                    event.preventDefault();
                    bullet.click();
                }
            });

            bullet.addEventListener('click', () => {
                const h2Element = this.testimonialSlider.slides[index].querySelector('h2');
                if (h2Element) {
                    h2Element.focus();
                }
            });
        });
    }
}

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

            const controlBtn = document.querySelector('.hl-button-control');
            if (controlBtn) {
                controlBtn.addEventListener('click', () => {
                    if (controlBtn.getAttribute('aria-pressed') === 'false') {
                        testimonialSlider.autoplay.stop();
                        controlBtn.querySelector('.screen-reader-text').value = 'Play';
                        controlBtn.querySelector('.dashicons').classList.replace('dashicons-controls-pause', 'dashicons-controls-play');
                        controlBtn.setAttribute('aria-pressed', 'true');
                    } else {
                        testimonialSlider.autoplay.start();
                        controlBtn.querySelector('.screen-reader-text').value = 'Pause';
                        controlBtn.querySelector('.dashicons').classList.replace('dashicons-controls-play', 'dashicons-controls-pause');
                        controlBtn.setAttribute('aria-pressed', 'false');
                    }
                });
            }
        },
    },
};

new TestimonialSlider('.swiper', testimonialSliderArgs);