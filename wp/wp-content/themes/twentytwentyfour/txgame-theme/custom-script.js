// JavaScript Document
(function($) {
    // Dropdown menu
    $(document).ready(function(){
        $('.btnMenu').click(function () {
            if($('.language-menu').hasClass('show')){
                $('.language-menu').removeClass("show");
            } else {
                $('.language-menu').addClass("show");
            }
        });
    });

    // Hambuger menu
    $(document).ready(function(){
        $('.hamburger').click(function (){
            if ($('.hamburger').hasClass("show-menu")){
                $('.hamburger').removeClass("show-menu");
                $('.list-active').removeClass("show-menu");
            }
            else {
                $('.hamburger').addClass("show-menu");
                $('.list-active').addClass("show-menu");
            }
        });
    });
})(jQuery);