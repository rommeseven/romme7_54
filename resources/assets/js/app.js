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
});
require('./form/core'); 




/*

new Vue(
{
    el: '#app'
    //components: {},
    //data: {},
    //methods: {}
});

 */