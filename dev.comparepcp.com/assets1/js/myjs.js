(function ($) {




//Top Menu Fix On Scroll
    $(window).scroll(function () {
        var top = $(window).scrollTop();
        console.log(top);
        if (top > 60)
        {
            $('.menu-bg').addClass('fixmenu-bg');
            $('.slider-bg').css({ "margin-top": "150px" });
        }
        else
        {
            $('.menu-bg').removeClass('fixmenu-bg');
            $('.slider-bg').css({ "margin-top": "0px" });
        }
    });



//Pop Up
    $(document).ready(function ()
    {
        $('.openpopup').click(function () {
            var a = $(this).data("doc_value");
            $('#pop-up_' + a).show("medium");
            $('.close-icon').click(function () {
                $('.popup').hide("medium");
            });
        });
    });

})(jQuery);


