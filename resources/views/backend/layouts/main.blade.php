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
            <!-- END OF .flex-container align-middle -->
        </div>
        <!-- END OF .columns shrink -->
        <div class="columns shrink">
            <div class="title-bar hide-for-large" data-hide-for="large" data-toggle="offCanvas">
                <button class="menu-icon" type="button">
                </button>
                <div class="title-bar-title show-for-medium-only" style="cursor:pointer">
                    Menu
                </div>
            </div>
            <ul class="horizontal menu show-for-large dropdown topnavigation" style="margin-right:15px;" data-dropdown-menu="" data-closing-time="1500" data-disable-hover="true" data-click-open="true">
            <li class="notifs_large"><a href="#" class="notifs_large" id="notifications_large_toggler" data-toggle="notifications_large"><i class="fa fa-envelope notifs_large"></i><span class="badge success notifs_large" style="position: absolute; left: 28px; top: 6px;">14</span></a> <div class="dropdown-pane large notifs_large" id="notifications_large" data-dropdown data-hover-pane="false" data-close-on-click="true"  data-v-offset="17" >
  Just some junk that needs to be said. Or not. Your choice.
</div>
            </li>           
                <li style="margin-top: 4px;">
                    <a @click.prevent="''">
                        Takács
                    </a>
                    <ul class="menu vertical" style="text-align:right">

                        <li>
                            <a href="#" >
                              <i class="fa fa-user"></i>   Profile
                            </a>
                        </li>                      
                        <li>
                            <a href="#">
                            <i class="fa fa-cog"></i>    Account Settings 
                            </a>
                        </li>                    
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <span>Logout</span> <i class="fa fa-sign-out"></i>
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
<div class="topcontent row collapse">
    <div class="column shrink off-canvas in-canvas-for-large position-right" data-off-canvas="" data-transition="push" id="offCanvas">
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
            <ul class="vertical menu accordion-menu" data-accordion-menu="">
                <li>
                    <a href="#">
                        Pages
                    </a>
                    <ul class="menu vertical nested">
                        <li>
                            <a href="{{url('/manage/pages/create')}}">
                                New Page
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/manage/pages')}}">
                                Manage Pages
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('/manage/navigation')}}">
                        Navigation
                    </a>
                </li>
                <li>
                    <a href="">
                        Support
                    </a>
                </li>
                <li>
                    <a href="#">
                        Manage
                    </a>
                    <ul class="menu vertical nested">
                        <li>
                            <a href="{{url('manage/users')}}">
                                Users
                            </a>
                        </li>
                        <li>
                            <a href="{{url('manage/roles')}}">
                                Roles
                            </a>
                        </li>
                        <li>
                            <a href="{{url('manage/permissions')}}">
                                Permissions
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('settings') }}">
                                Settings
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Account
                            </a>
                        </li>
                    </ul>
                    <!-- END OF .topnav menu -->
                    <!-- END OF .menu vertical -->
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <!-- END OF .topnav -->
    </div>
    <!-- END OF .column -->
    <div class="column expanded" style="padding-left:15px;padding-right:15px">
        @include("backend.layouts.partials.flash")
        <div class="row medium-offset-1">
            <div class="column shrink">
                <br/>
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li>
                            <a href="{{ url('/dashboard') }}">
                                Home
                            </a>
                        </li>
                        @stack("bread")
                    </ul>
                </nav>
            </div>
            <!-- END OF .column shrink -->
        </div>
        @stack("content")
        <!-- END OF #app2 -->
    </div>
    <!-- END OF .column -->
</div>
<!-- END OF .topcontent -->
<div class="bottomcontent">
    @stack('bottomcontent')
</div>
<!-- END OF .bottomcontent -->
<div class="footer row small-up-1 medium-up-2 large-up-3">
    @stack("footer")
</div>
<!-- END OF .footer row small-up-1 medium-up-2 large-up-3 -->
<!-- END OF .container -->
<form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
</div><!-- END OF #app2 -->
@stack("outside_app")
<script src="{{ mix('js/app.js') }}"></script>
@stack("extrajs")
<script>
    // $(".topnavigation").click(function() {
    //     alert("hi");

    //     $('#notifications_large_toggler').trigger('click');
    // });

</script>
</body>
</html>