require('./bootstrap');
import Foundation from 'foundation-sites'
var hidden = false;
$(function()
{
    $(document).foundation();
    checkicon();
    $(window).on('scroll', checkicon);
    $('#main-menu').on('show.zf.dropdownmenu', function()
    {
        var dropdown = $(this).find('.is-dropdown-submenu');
        dropdown.css('display', 'none');
        dropdown.fadeIn('fast');
    });
    $('#main-menu').on('hide.zf.dropdownmenu', function()
    {
        var dropdown = $(this).find('.is-dropdown-submenu');
        dropdown.css('display', 'inherit');
        dropdown.fadeOut('fast');
    });
    $(".current_page").click(function(e)
    {
        $('html, body').animate(
        {
            scrollTop: 0
        }, 500);
        e.preventDefault();
        return false;
    });
    $("#main-menu").on('show.zf.dropdownmenu', function()
    {
        var top = $(window).scrollTop(),
            divBottom = $('header').offset().top + $('header').outerHeight();
        if (divBottom > top) $('html, body').animate(
        {
            scrollTop: divBottom + 1
        }, 200);
        return false;
    });

    function checkicon()
    {
        var top = $(window).scrollTop(),
            divBottom = $('header').offset().top + $('header').outerHeight();
        if (divBottom > top)
        {
            if (!hidden)
            {
                hidden = true;
                //$('.topbar-icon').addClass('invisible');
                $('.topbar-icon>img').css('display', 'inherit');
                $('.topbar-icon>img').fadeOut('fast');
                $("#topbar-stick").removeClass("is-stuck");
            }
        }
        else
        {
            if (hidden)
            {
                hidden = false;
                $('.topbar-icon>img').removeClass('invisible');
                $('.topbar-icon>img').css('display', 'none');
                $('.topbar-icon>img').fadeIn();
                $("#topbar-stick").addClass("is-stuck");
            }
        }
    }
});
// TODO: sticky on heroku: JAVASCRIPT PROBLEM