require('./bootstrap');
import Foundation from 'foundation-sites'
$(document).foundation();
$(function()
{
    //alert("jquery and js are working.");
    $(".userRemover").click(function()
    {
        $(this).next("form").submit();
    });
    $("input").focus(function()
    {
        $(this).next(".errortext").fadeOut("fast");
        $(this).parent("label.is-invalid-label").removeClass("is-invalid-label");
    });
});
/*

new Vue(
{
    el: '#app'
    //components: {},
    //data: {},
    //methods: {}
});

 */