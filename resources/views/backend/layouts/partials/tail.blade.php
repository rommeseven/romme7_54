</div><!-- END OF #app2 -->
@stack("outside_app")
<script src="{{ mix('js/app.js') }}"></script>
@stack("extrajs")
<script type="text/javascript">
$(function()
{
	alert('hola');
	
@if(Session::has('info'))
    notify("info",'{{ Session::get("flashtitle") or 'Quick Tip:'  }}','{{Session::get('info')}}');
@endif
  
@if(Session::has('warning'))
    notify("warning",'{{ Session::get("flashtitle") or 'Warning:'  }}','{{Session::get('warning')}}');
@endif
  
@if(Session::has('success'))
    notify("success",'{{ Session::get("flashtitle") or 'Success!'  }}','{{Session::get('success')}}');
@endif

@if(Session::has('error'))
    notify("error",'{{ Session::get("flashtitle") or 'Whoops!'  }}','{{Session::get('error')}}');
@endif

@if(Session::has('flashinfo'))
    notify("white",'{{ Session::get("flashtitle") or ''  }}','{{Session::get('flashinfo')}}','{{ Session::get("flashicon") or 'default'  }}');
@endif
});

function notify(style, title, text, givenicon = 'default')
{
    let icon = '';
    if (givenicon == 'default')
    {
        if (style == "info")
        {
            icon = '<i class="fa fa-info"></i>';
        }
        if (style == "success")
        {
            icon = '<i class="fa fa-check"></i>';
        }
        if (style == "white" || style == "black")
        {
            icon = '<i class="fa fa-thumbs-up"></i>';
        }
        if (style == "error" || style == "warning")
        {
            icon = '<i class="fa fa-warning"></i>';
        }
    }
    else
    {
        icon = "<i class='fa fa-" + givenicon + "'></i>";
    }
    $.notify(
    {
        title: title,
        text: text,
        icon: icon
    },
    {
        style: 'metro',
        className: style,
        autoHide: false,
        clickToHide: true
    });
}

</script>
</body>
</html>