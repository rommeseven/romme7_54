$(function()
{
    $("input").focus(function()
    {
    //	alert('focus');

        $(this).next(".errortext").fadeOut("fast");
        $(this).parent().next(".errortext").fadeOut("fast");
        $(this).parent().parent("label.is-invalid-label").removeClass("is-invalid-label");
        $(this).parent("label.is-invalid-label").removeClass("is-invalid-label");
    });
    $("label").has(".errortext:not(:empty)").addClass("is-invalid-label");
    $(".hiddenPanel:not(:has(.errortext:not(:empty)))").hide();
   // $(".hiddenPanel").has(".errortext:not(:empty)").foundation('toggle');

});