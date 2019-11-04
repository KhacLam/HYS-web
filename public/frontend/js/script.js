$(document).ready(function() {
    $('.lib-list').isotope({
        // options
        itemSelector: '.lib-item',
        layoutMode: 'masonry'
    });
    $("#slide-carousel").slick({
        arrows: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 3000
    });
})