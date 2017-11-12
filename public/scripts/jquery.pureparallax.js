(function($) {
    /**
     * Copyright 2014, Purethemes
     * Licensed under the MIT license.
     *
     * @author Lukasz Girek
     * @desc A small plugin that scroll background of div based on window scroll position.
     */
     $.fn.pureparallax = function( options ) {

        return this.each( function() {
            var settings = $.extend({
                // These are the defaults.
                overlayBackgroundColor: "#000",
                overlayOpacity: "0.45",
                timeout: 500
            }, options );


            var banner = $(this),
            overlay = banner.find('.parallax-overlay'),
            image = banner.find("img"),
            height = banner.data('height');
            banner.height(height),
            overlayCSS = (banner.data('background')) ? banner.data('background') : settings.overlayBackgroundColor;
            opacityCSS = (banner.data('opacity')) ? banner.data('opacity') : settings.overlayOpacity;

            overlay.css({
                "backgroundColor"   : overlayCSS,
                "opacity"           : opacityCSS,
            })

            banner.find(".parallax-title").css({
                "top": ((height - banner.find(".parallax-title").height()) / 2) + "px"
            });

            function parallaxit(banner, height, anim){
                var imgTop = 0, scrollPos = $(window).scrollTop(),
                bannerpos = banner.offset().top,
                winheight = $(window).height(),
                scrollmin = bannerpos-winheight,
                scrollmax = bannerpos,
                imgTopmax = (image.height()-height);

                var ratio = (scrollmax-scrollmin)/imgTopmax;
                imgTop = ((scrollPos-scrollmax)/ratio);
                if(anim === true){
                    image.stop().animate({
                        "top": (imgTop)+"px"
                    });
                } else {
                    image.css({
                        "top": (imgTop)+"px"
                    });
                }
            }
            $(window).bind("load",function(e){

                var transition =    "-webkit-transition: -webkit-transform 0.66s ease-in-out 1s,  opacity 0.66s ease-in-out 1s;" +
                "transition: transform 0.66s ease-in-out 1s, opacity 0.66s ease-in-out 1s;" +
                "-webkit-perspective: 1000;" +
                "-webkit-backface-visibility: hidden;";
                var initial     =   "-webkit-transform: translatey(30px);" +
                "transform: translatey(30px);" +
                "opacity: 0;";
                var target      =   "-webkit-transform: translatey(0);" +
                "transform: translatey(0);" +
                "opacity: 1;";
                banner.attr('style', initial);

                setTimeout(function(){
                    var anim = true;
                    parallaxit(banner,height,anim);
                    banner.attr('style', target+transition);
                },500)
            })


            $(window).on("resize",function(e){
                var anim = false;
                parallaxit(banner,height,anim);
            })

            $(document).bind('touchstart touchend touchcancel touchleave touchmove', function(e){
                var anim = false;
                parallaxit(banner,height,anim)
            });

            $(window).scroll(function() {
                var anim = false;
                parallaxit(banner,height,anim)
            });

        });


}

}(jQuery));



