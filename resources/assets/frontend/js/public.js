require('./bootstrap');
import Foundation from 'foundation-sites'
var hidden = false;
$(function()
{
    checkicon();
    jQuery(window).on('scroll', checkicon);
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
    $(document).foundation();
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
        var top = jQuery(window).scrollTop(),
            divBottom = jQuery('header').offset().top + jQuery('header').outerHeight();
        if (divBottom > top) $('html, body').animate(
        {
            scrollTop: divBottom + 1
        }, 200);
        return false;
    });
});

function checkicon()
{
    var top = jQuery(window).scrollTop(),
        divBottom = jQuery('header').offset().top + jQuery('header').outerHeight();
    if (divBottom > top)
    {
        if (!hidden)
        {
            hidden = true;
            //jQuery('.topbar-icon').addClass('invisible');
            jQuery('.topbar-icon>img').css('display', 'inherit');
            jQuery('.topbar-icon>img').fadeOut('fast');
        }
    }
    else
    {
        if (hidden)
        {
            hidden = false;
            jQuery('.topbar-icon>img').removeClass('invisible');
            jQuery('.topbar-icon>img').css('display', 'none');
            jQuery('.topbar-icon>img').fadeIn();
        }
    }
}