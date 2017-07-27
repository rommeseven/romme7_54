require('./bootstrap');
import Foundation from 'foundation-sites'

$(function()
{
	$(document).foundation();


    //alert("jquery and js are working.");
    $(".userRemover").click(function()
    {
        $(this).next("form").submit();
    });
});
require('./form/core');
require('./vendor/sortable.js');
/*

new Vue(
{
    el: '#app'
    //components: {},
    //data: {},
    //methods: {}
});

 */
