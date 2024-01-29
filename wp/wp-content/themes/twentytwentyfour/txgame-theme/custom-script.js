// JavaScript Document
(function($) {
    // Dropdown menu
    $(document).ready(function (){
        $('.btnMenu').click(function (){
            if($('.language-menu').hasClass('show')){
                $('.language-menu').removeClass("show");
            } else {
                $('.language-menu').addClass("show");
            }
        });
    });

    // Hambuger menu
    $(document).ready(function (){
        $('.hamburger').click(function (){
            if ($('.hamburger').hasClass("show-menu")){
                $('.hamburger').removeClass("show-menu");
                $('.list-active').removeClass("show-menu");
                $('body').removeClass("no-scroll");       
            }
            else {
                $('.hamburger').addClass("show-menu");
                $('.list-active').addClass("show-menu");
                $('body').addClass("no-scroll");
            }
        });
    });

    // Get link active
    $(document).ready(function (){
        pageUrl = location.href;
        $('.list-active li a').each(function (){
            menuURL = $(this).attr("href");
            if (menuURL == pageUrl) {
                $(this).addClass("active");
            }
        });

        $('li.item-active a').each(function (){
            menuURL = $(this).attr("href");
            $('li.item-active').removeClass("li-active");
            if (menuURL == pageUrl) {
                $(this).addClass("active");
            }
        });
    });

    // Change text of title page
    $(document).ready(function (){
        pageUrl = location.pathname;
        if ("/ja/" == pageUrl) {
            // óVÇ—êSÇ™èHìcÇïœÇ¶ÇÈ
            $('.main-title').text(decodeURIComponent("%E9%81%8A%E3%81%B3%E5%BF%83%E3%81%8C%E7%A7%8B%E7%94%B0%E3%82%92%E5%A4%89%E3%81%88%E3%82%8B"));
        } 
    });

    // Close button dropdown 
    $(document).ready(function (){
        // add mousedown event to html
        $('html').mousedown(function (){
            if($('.language-menu').hasClass('show')){
                $('.language-menu').removeClass("show");
            }
        });

        // mousedown must not be triggered inside menu
        $('.language-menu').bind('mousedown', function (e){
            e.stopPropagation();
        });
    });
})(jQuery);