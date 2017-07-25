@include("backend.layouts.partials.head")
<div class="off-canvas position-right" data-off-canvas="" id="offCanvas">
    <!-- Close button -->
    <button aria-label="Close menu" class="close-button" data-close="" type="button">
        <span aria-hidden="true">
            ×
        </span>
    </button>
    <br/>
    <br/>
    <!-- Menu -->
    <ul class="topnav menu vertical">
        <li>
            <a href="">
                Pages
            </a>
            <ul class="menu vertical nested">
                <li>
                    <a href="#">
                        New Page
                    </a>
                </li>
                <li>
                    <a href="#">
                        Manage Pages
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="">
                Navigation
            </a>
        </li>
        <li>
            <a href="">
                Support
            </a>
        </li>
        <li>
            <a href="">
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
<div class="off-canvas-content" data-off-canvas-content="">
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
                <ul class="topnav horizontal menu show-for-large dropdown underline-from-center" data-dropdown-menu="">
                    <li>
                        <a href="">
                            Pages
                        </a>
                        <ul class="menu">
                            <li>
                                <a href="#">
                                    New Page
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Manage Pages
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="">
                            Navigation
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Support
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Manage
                        </a>
                        <ul class="menu vertical">
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
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END OF .topnav menu -->
<!-- END OF .columns shrink -->
<!-- END OF .header row align-middle align-justify -->
@include("backend.layouts.partials.flash")
<div class="row medium-offset-1">
    <div class="column shrink"><br />
        <nav aria-label="You are here:" role="navigation">
          <ul class="breadcrumbs">
            <li><a href="{{ url('/dashboard') }}">Home</a></li>
            @stack("bread")
          </ul>
        </nav>
    </div><!-- END OF .column shrink -->
</div><!-- END OF .row breadcrumps -->
<div class="topcontent">
    @stack("content")
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
@include("backend.layouts.partials.tail")
