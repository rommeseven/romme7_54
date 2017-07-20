@extends('layouts.master')

@push("title","Dashboard")
@push('content')


<div class="off-canvas position-right" id="offCanvas" data-off-canvas>

    <!-- Close button -->
    <button class="close-button" aria-label="Close menu" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
<br /><br />
    <!-- Menu -->
<ul class="topnav menu vertical">
                <li><a href="">Pages</a>
    <ul class="menu vertical nested">
      <li><a href="#">New Page</a></li>
      <li><a href="#">Manage Pages</a></li>
    </ul>                </li>
                <li><a href="">Navigation</a></li>
                <li><a href="">Support</a></li>
                <li><a href="">Setting</a>
    <ul class="menu vertical nested">
      <li><a href="#">Configuration</a></li>
      <li><a href="#">Account Settings</a></li>
    </ul><!-- END OF .topnav menu -->
  </div>

  <div class="off-canvas-content" data-off-canvas-content>
<div class="container">
    <div class="header row collapse align-middle align-justify">
        <div class="columns shrink">
        <div class="flex-container align-middle">
            <img src="img/logo.png" alt="Seven Logo" />
            <h1>CMSeven</h1>
        </div><!-- END OF .flex-container align-middle -->
        </div><!-- END OF .columns shrink -->
        <div class="columns shrink">
<div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="large">
  <button class="menu-icon" type="button" data-toggle="offCanvas"></button>
  <div data-toggle="offCanvas" class="title-bar-title show-for-medium-only">Menu</div>
</div>      


            <ul class="topnav horizontal menu show-for-large dropdown" data-dropdown-menu>
                <li><a href="">Pages</a>
    <ul class="menu vertical">
      <li><a href="#">New Page</a></li>
      <li><a href="#">Manage Pages</a></li>
    </ul>                </li>
                <li><a href="">Navigation</a></li>
                <li><a href="">Support</a></li>
                <li><a href="">Setting</a>
    <ul class="menu vertical">
      <li><a href="#">Configuration</a></li>
      <li><a href="#">Account Settings</a></li>
    </ul>
  </li>                </li>
            </ul><!-- END OF .topnav menu -->
        </div><!-- END OF .columns shrink -->
    </div><!-- END OF .header row align-middle align-justify -->
    <div class="topcontent">
        <div class="row">
            <h2>Choose an action:</h2>
        </div><!-- END OF .row -->
        <div class="row align-center">
            <div class="small-12 column">
                <div class="row small-up-1 medium-up-2 large-up-4">
                    <div class="column">
                        <div class="card">
                            <div class="card-divider">
                                <h3>Action 1</h3>
                            </div><!-- END OF .card-divider -->
                            <div class="card-section foundation-flex align-middle align-spaced"><i class="fa fa-camera-retro fa-5x"></i><i class="fa fa-camera-retro fa-5x"></i></div><!-- END OF .card-section -->
                            <div class="card-section">Fuga veniam nobis culpa, accusamus eligendi consequuntur expedita consequatur sit voluptatum quisquam est esse iusto veritatis, cupiditate harum, rerum minus beatae alias illo numquam! Quod explicabo facere facilis veritatis architecto!</div><!-- END OF .card-section -->
                        </div><!-- END OF .card -->
                    </div><!-- END OF .column -->
                    <div class="column">
                        <div class="card">
                            <div class="card-divider">
                                <h3>Action 2</h3>
                            </div><!-- END OF .card-divider -->
                            <img src="" alt="" />
                            <card-section>Cupiditate dolorum ipsum maiores quos, error ipsa inventore quae nulla ducimus, ipsam provident fugiat.</card-section>
                        </div><!-- END OF .card -->
                    </div><!-- END OF .column -->
                    <div class="column">
                        <div class="card">
                            <div class="card-divider">
                                <h3>Action 3</h3>
                            </div><!-- END OF .card-divider -->
                            <img src="" alt="" />
                            <card-section>Iste illo odit rerum quasi nulla, autem cumque. Similique architecto aspernatur magnam blanditiis quas!</card-section>
                        </div><!-- END OF .card -->
                    </div><!-- END OF .column -->
                    <div class="column">
                        <div class="card">
                            <div class="card-divider">
                                <h3>Action 4</h3>
                            </div><!-- END OF .card-divider -->
                            <img src="" alt="" />
                            <card-section>Libero tempora, natus hic enim aspernatur possimus ipsam aliquid maiores, magni accusantium, ab, unde.</card-section>
                        </div><!-- END OF .card -->
                    </div><!-- END OF .column -->
                </div><!-- END OF .row small-up-1 medium-up-2 large-up-4 -->
            </div><!-- END OF .small-12 column -->
        </div><!-- END OF .row align-center -->
    </div><!-- END OF .topcontent -->
    <div class="bottomcontent">
        <h2>Visit Statistics:</h2>
        <div class="row">
            <div class="column small-12 medium-9"><img src="" alt="" /></div><!-- END OF .column small-12 medium-9 -->
            <div class="column small-12 small-centered medium-uncentered medium-3">
                <br />
                <button class="button">Totam.</button>
                <button class="button">Maxime.</button>
            </div><!-- END OF .column small-12 small-centered medium-uncentered medium-3 -->
        </div><!-- END OF .row -->
    </div><!-- END OF .bottomcontent -->
    <div class="footer row small-up-1 medium-up-2 large-up-3">
        <div class="column">
            <h3>Bla Bla</h3>
            <ul class="menu vertical">
                <li><a href="">Omnis.</a></li>
                <li><a href="">Debitis!</a></li>
                <li><a href="">Quaerat.</a></li>
                <li><a href="">Facilis.</a></li>
                <li><a href="">Corporis.</a></li>
            </ul><!-- END OF .menu vertical -->
        </div><!-- END OF .column -->
        <div class="column">
            <h3>Bla Bla</h3>
            <ul class="menu vertical">
                <li><a href="">Repellendus.</a></li>
                <li><a href="">Totam.</a></li>
                <li><a href="">Vitae.</a></li>
                <li><a href="">Quia.</a></li>
                <li><a href="">Fuga.</a></li>
            </ul><!-- END OF .menu vertical -->
        </div><!-- END OF .column -->
        <div class="column">
            <h3>Bla Bla</h3>
            <ul class="menu vertical">
                <li><a href="">Veritatis!</a></li>
                <li><a href="">Eveniet.</a></li>
                <li><a href="">Tempora.</a></li>
                <li><a href="">Minima!</a></li>
                <li><a href="">Pariatur!</a></li>
            </ul><!-- END OF .menu vertical -->
        </div><!-- END OF .column -->
    </div><!-- END OF .footer row small-up-1 medium-up-2 large-up-3 -->
</div><!-- END OF .container -->
  </div>
@endpush



@extends('backend.layouts.main')

@push('title')
Dashboard
@endpush


@push('content')
<h1>
    Welcome to {{ config('app.name', 'Laravel') }}
</h1>
<h2 class="subheader">
    You are logged in als {{ Auth::user()->name }}
</h2>

<br />

<ul>
	<li><a href="{{ route('home') }} ">Dashboard</a></li>
	<li><a href="{{ url('manage/users') }} ">Users</a></li>
	<li><a href="{{ url('') }} ">Asperiores</a></li>
	<li><a href="{{ url('') }} ">Nam</a></li>
	<li><a href="{{ url('') }} ">Aspernatur</a></li>
	<li><a href="{{ url('') }} ">Veniam</a></li>
</ul>

<br/>
<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
    Logout
</a>
<form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@endpush

@push('extrajs')
<script>
    alert('welcome home');
</script>
@endpush
