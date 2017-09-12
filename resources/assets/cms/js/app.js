require('./bootstrap');
import Foundation from 'foundation-sites'
$(function()
{
    $(document).foundation();
    //alert("jquery and js are working.");
    $(".userRemover, .pageRemover").click(function()
    {
        $(this).next("form").submit();
    });
});
require('./form/core');
require('./vendor/sortable.js');
require('./vendor/notify.js');
require('./core/notify-metro.js');
/*

new Vue(
{
    el: '#app'
    //components: {},
    //data: {},
    //methods: {}
});

 */