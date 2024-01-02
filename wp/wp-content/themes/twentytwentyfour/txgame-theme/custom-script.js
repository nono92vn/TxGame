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

    $(document).ready(function(){
        $('.hamburger').click(function (){
            $('.hamburger').toggle("change");
            $('.list-active').toggle("nav-change");
        });
    });
})(jQuery);

  