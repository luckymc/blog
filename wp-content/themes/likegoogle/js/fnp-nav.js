jQuery(document).ready(function($){
    $('.fnp-previous').mouseenter(function(){
        $('.fnp-content-left').stop().animate({
            left:-20
        },300);
        $('.fnp-content-left .fnp-nav-title,.fnp-content-left .fnp-nav-link').stop().delay(300).animate({
            opacity:1
        },200)
    });
    $('.fnp-previous').mouseleave(function(){
        $('.fnp-content-left').stop().animate({
            left:-235
        },300);
        $('.fnp-content-left .fnp-nav-title,.fnp-content-left .fnp-nav-link').stop().animate({
            opacity:0
        },200);
    });
    $('.fnp-next').mouseenter(function(){
        $('.fnp-content-right').stop().animate({
            right:-20
        },300);
        $('.fnp-content-right .fnp-nav-title,.fnp-content-right .fnp-nav-link').stop().delay(300).animate({
            opacity:1
        },200)
    });
    $('.fnp-next').mouseleave(function(){
        $('.fnp-content-right').stop().animate({
            right:-235
        },300);
        $('.fnp-content-right .fnp-nav-title,.fnp-content-right .fnp-nav-link').stop().animate({
            opacity:0
        },200);
    });
});