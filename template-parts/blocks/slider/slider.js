const hl_slider = new Swiper('.swiper', {
    loop: true,
    speed: 1000,
    autoplay: {
        delay: 5000,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

});

//puase/play button
const play = document.querySelector('.hl-button-control.play');
const pause = document.querySelector('.hl-button-control.pause');

//default play is hidden
play.style.display = 'none';

play.addEventListener('click', function () {
    hl_slider.autoplay.start();
    play.style.display = 'none';
    pause.style.display = 'block';
});


pause.addEventListener('click', function () {
    hl_slider.autoplay.stop();
    play.style.display = 'block';
    pause.style.display = 'none';
});
