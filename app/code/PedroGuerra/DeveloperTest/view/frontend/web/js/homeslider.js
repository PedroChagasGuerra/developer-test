require(['jquery', 'flexslider'], function($){
    $(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            animationLoop: false,
            itemWidth: 210,
            itemMargin: 5,
            pausePlay: true,
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
});
