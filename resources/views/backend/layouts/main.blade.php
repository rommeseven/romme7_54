@include("backend.layouts.partials.head")
<div class="container">
    <div class="header row collapse align-middle align-justify">
        <div class="columns shrink">
            <div class="flex-container align-middle">
                <img alt="Seven Logo" src="{{ asset('img/logo.png') }}"/>
                <h1>
                    <a href="{{ route('home') }}">
                        CMSeven
                    </a>
                </h1>
            </div>
            <!-- END OF .flex-container align-fdsafmiddle -->
        </div>
        

        <!-- END OF .columns shrink -->
        <div class="column shrink align-left hide-for-large"><a href="#" data-toggle="offCanvasNotifs">
                        <i class="fa  @if(!count(auth()->user()->unreadNotifications))
                fa-bell-o
                @elseif(count(auth()->user()->unreadNotifications) < 10 )
                fa-bell warning
                @else
                alert fa-bell
                @endif"></i> <span class="badge 
                @if(!count(auth()->user()->unreadNotifications))
                secondary
                @elseif(count(auth()->user()->unreadNotifications) < 10 )
                warning
                @else
                alert
                @endif
                         notifs_large" style="position:relative;top:-10px;left:-6px;">
                           @auth
                           {{ count(auth()->user()->unreadNotifications)}}
                           @endauth
                        </span>
                    </a></div><!-- END OF .column shrink -->
        <div class="columns shrink align-left">

            <div class="title-bar hide-for-large" data-hide-for="large" data-toggle="offCanvas">

                <button class="menu-icon" type="button">
                </button>
                <div class="title-bar-title show-for-medium-only" style="cursor:pointer">
                    Menu
                </div>

            </div>
            <ul class="horizontal menu show-for-large dropdown topnavigation" data-click-open="true" data-closing-time="1500" data-disable-hover="true" data-dropdown-menu="" style="margin-right:15px;">
                <li style="margin-top: 4px;" id="notif">
    
                    <a @click.prevent="''" data-toggle="offCanvasNotifs">
                        <i class="fa  @if(!count(auth()->user()->unreadNotifications))
                fa-bell-o
                @elseif(count(auth()->user()->unreadNotifications) < 10 )
                fa-bell warning
                @else
                alert fa-bell
                @endif"></i> <span class="badge 
                @if(!count(auth()->user()->unreadNotifications))
                secondary
                @elseif(count(auth()->user()->unreadNotifications) < 10 )
                warning
                @else
                alert
                @endif
                         notifs_large" style="position:relative;top:-10px;left:-6px;">
                           @auth
                           {{ count(auth()->user()->unreadNotifications)}}
                           @endauth
                        </span>
                    </a>
                </li>
                <li style="margin-top: 4px;" class="show-for-large">
                    <a onclick="hideNotif()">
                        {{ auth()->user()->name}}
                    </a>
                    <ul class="menu vertical" style="text-align:right">
                        <li>
                            <a href="#">
                                <i class="fa fa-user">
                                </i>
                                @lang("Profile")
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cog">
                                </i>
                                @lang("Account Settings")
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span>
                                    @lang("Logout")
                                </span>
                                <i class="fa fa-sign-out">
                                </i>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END OF .topnav menu -->
<!-- END OF .columns shrink -->
<!-- END OF .header row align-middle align-justify -->
<!-- END OF .row breadcrumps -->
            <div class="off-canvas-wrapper">
          <div class="off-canvas-absolute position-top"  data-auto-focus ="false" id="offCanvasNotifs" data-transition="detached" data-off-canvas>

@include("backend.layouts.partials.user_notifications")

      </div>

<div class="off-canvas-content" style="min-idth: 100%;" data-off-canvas-content>

<div class="topcontent row collapse" style="padding-top:0 !important;">
    <div class="column shrink off-canvas in-canvas-for-large position-right" data-off-canvas="" data-transition="detached" id="offCanvas">
        <div class="topnav">
            <button aria-label="Close menu" class="close-button" data-close="" type="button">
                <span aria-hidden="true">
                    ×
                </span>
            </button>
            <div class="hide-for-large">
                <br/>
                <br/>
            </div>
            <!-- END OF .hide-for-large -->
                       <div class="hide-for-large">
                            <ul class="vertical menu accordion-menu" data-accordion-menu="">
                           <li class="hide-for-large">
                               <a href="#">{{ auth()->user()->name}}</a>
                               <ul class="menu vertical nested">
                                    <li>
                               <a href="#">
                                   <i class="fa fa-user">
                                   </i>
                                   @lang("Profile")
                               </a>
                           </li>
                           <li>
                               <a href="#">
                                   <i class="fa fa-cog">
                                   </i>
                                   @lang("Account Settings")
                               </a>
                           </li>
                           <li>
                               <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                   <span>
                                       @lang("Logout")
                                   </span>
                                   <i class="fa fa-sign-out">
                                   </i>
                               </a>
                           </li>
                               </ul><!-- END OF .menu vertical nested -->
                           </li><!-- END OF .hide-for-large --> 
                           </ul>
                           <hr />
                       </div><!-- END OF .hide-for-large -->
            <ul class="vertical menu accordion-menu" data-accordion-menu="">
    
                <li>
                    <a href="#">
                        @lang("Pages")
                    </a>
                    <ul class="menu vertical nested">
                        <li>
                            <a href="{{route('pages.create')}}">
                                @lang("New Page")
                            </a>
                        </li>
                        <li>
                            <a href="{{route("pages.index")}}">
                                @lang("Manage Pages")
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route("navigation")}}">
                        @lang("Navigation")
                    </a>
                </li>
                <li>
                    <a href="">
                        @lang("Support")
                    </a>
                </li>
                <li>
                    <a href="#">
                        Manage
                    </a>
                    <ul class="menu vertical nested">
                        <li>
                            <a href="{{route("users.index")}}">
                                Users
                            </a>
                        </li>
                        <li>
                            <a href="{{route("roles.index")}}">
                                Roles
                            </a>
                        </li>
                        <li>
                            <a href="{{route("permissions.index")}}">
                                Permissions
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('settings') }}">
                                Settings
                            </a>
                        </li>
                    </ul>
                    <!-- END OF .topnav menu -->
                    <!-- END OF .menu vertical -->
                </li>
            </ul>
        </div>
        <!-- END OF .topnav -->
    </div>
    <!-- END OF .column -->

    <div class="column expanded" style="padding-left:15px;padding-right:15px">
 
        <div class="row medium-offset-1">
            <div class="column shrink">


                <br/>
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li>
                            <a href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        @stack("bread")
                    </ul>
                </nav>
            </div>
        </div>
            <!-- END OF .column shrink -->
        @stack("content")
<div class="bottomcontent">
    @stack('bottomcontent')
</div>
        <!-- END OF #app2 -->
    </div>
    <!-- END OF .column -->
</div>
<!-- END OF .topcontent -->
<!-- END OF .bottomcontent -->
<div class="footer row small-up-1 medium-up-2 large-up-3">
    @stack("footer")
</div>
      </div>
    </div>

<!-- END OF .footer row small-up-1 medium-up-2 large-up-3 -->
<!-- END OF .container -->
<form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
</div>
<!-- END OF #app2 -->
@stack("outside_app")
<script src="{{ mix('js/app.js') }}">
</script>
<script type="text/javascript">
    $(function()
{
    
@if(Session::has('info'))
    notify("info",'{{ Session::get("info_flash_title", function() { return 'Quick Tip:'; }) }}','{{Session::get('info')}}','{{ Session::get("success_flash_icon", function() { return 'default'; })  }}', {{ Session::get("info_autohide",function() { return '0';}) }});
@endif
  @if(Session::has('info2'))
    notify("info",'{{ Session::get("info2_flash_title", function() { return 'Quick Tip:'; }) }}','{{Session::get('info2')}}','{{ Session::get("success_flash_icon", function() { return 'default'; })  }}', {{ Session::get("info2_autohide",function() { return '0';}) }});
@endif
  
@if(Session::has('warning'))
    notify("warning",'{{ Session::get("warning_flash_title", function() { return 'Warning:'; }) }}','{{Session::get('warning')}}','{{ Session::get("warning_flash_icon", function() { return 'default'; })   }}', {{ Session::get("warning_autohide",function() { return '0';}) }});
@endif
  
@if(Session::has('success'))
    notify("success",'{{ Session::get("success_flash_title", function() { return 'Success!'; }) }}','{{Session::get('success')}}','{{ Session::get("success_flash_icon", function() { return 'default'; })  }}', {{ Session::get("success_autohide",function() { return '0';}) }});
@endif

@if(Session::has('error'))
    notify("error",'{{ Session::get("error_flash_title", function() { return 'Whoops!'; }) }}','{{Session::get('error')}}','{{ Session::get("success_flash_icon", function() { return 'default'; })  }}', {{ Session::get("error_autohide",function() { return '0';}) }});
@endif

@if(Session::has('flashinfo'))
    notify("white",'{{ Session::get("flashinfo_flash_title", function() { return 'Info Box'; }) }}','{{Session::get('flashinfo')}}','{{ Session::get("success_flash_icon", function() { return 'default'; })  }}','{{Session::get('flashinfo')}}','{{ Session::get("flashinfo_flash_icon", function() { return 'default'; })  }}', {{ Session::get("flashinfo_autohide",function() { return '0';}) }});
@endif


@if (count($errors) > 0)
    notify("warning",'Warning:','@lang("You must fix all the errors to proceed.")','default', 7000);
     @foreach ($errors->all() as $error)
         tut('Error:','{{$error}}',"error");
      @endforeach  
@endif


});
function err (error) {
   notify("error","Error!",error);

}
function tut (title,text,style="white",givenicon = 'default',time=0) {


    var icon = '';
    
    if (givenicon == 'default')
    {
        
            icon = '<i class="fa fa-info-circle"></i>';
        
    }
    else
    {
        icon = "<i class='fa fa-" + givenicon + "'></i>";
    }

        $.notify({
            title: title,
            text: text,
            icon: icon
        },{
        style: 'metro',

elementPosition: 'bottom right', 
globalPosition: 'bottom right',         
        className: style,
showAnimation: 'slideDown', 
showDuration: 400, 
hideAnimation: 'slideUp', 
        autoHide: (!time) ? false:true,
        autoHideDelay: (!time) ? 0:time ,
hideDuration: 200,         
        clickToHide: true
        }); 
    
}


function notify(style, title, text, givenicon = 'default',time=0)
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

elementPosition: 'top center', 
globalPosition: 'top center',         
        className: style,
showAnimation: 'slideDown', 
showDuration: 400, 
hideAnimation: 'slideUp', 
hideDuration: 200,         
        autoHide: (!time) ? false:true,
        autoHideDelay: (!time) ? 0:time ,
        clickToHide: true
    });
}
function hideNotif () {
  $('#offCanvasNotifs').foundation('close');

}
</script>
@stack("extrajs")
</body>
</html>