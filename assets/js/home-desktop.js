$(document).ready(function(e) {
    function viewPortRatio() {
        var dw = $(window).width() + 17,
            dh = $(window).height();
        return {
            w: dw,
            h: dh,
            r: dh / dw
        };
    }
    /*******************************************
     *	Slider de trabalhos
     */
    $('.slider').flexslider({
        animation: "slide",
        slideshow: false,
        slideshowSpeed: 3000,
        start: function(slider) {},
        after: function(slider) {}
    });
    /*******************************************
     *	Slider de clientes
     */
    $('.flexslider-clients').flexslider({
        animation: "slide",
        animationLoop: false,
        slideshow: false,
        itemWidth: 130,
        itemHeight: 80,
        itemMargin: 5,
        minItems: 5,
        controlNav: false,
        prevText: "",
        nextText: "",
        randomize: true,
        //maxItems: 4,
        start: function(slider) {
            slider.find('.flex-prev').append('<i class="icon-ctrl-l" />');
            slider.find('.flex-next').append('<i class="icon-ctrl-r" />');
        }
    });
});