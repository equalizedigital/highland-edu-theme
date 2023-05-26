/**
 * Created by mac1 on 7/13/16.
 */
jQuery(document).ready(function(){
    jQuery('#slides').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        autoplay: true,
        autoplaySpeed: 4000,
        adaptiveHeight: true,
        speed: 500,
        dots: true,
    });
});