<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- //REMEMBER: Add public favicon --}}
        <link rel="shortcut icon" href="{{asset('img/seven.ico')}}" type="image/x-icon">
        <link rel="icon" href="{{asset('img/seven.ico')}}" type="image/x-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Biryani" rel="stylesheet">        

        <title>{{ settings('app_title') }} - {{$page->title}}</title>
        <link href="{{ mix('css/public.css') }}" rel="stylesheet" type="text/css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @stack("extracss")
    </head>
    <body>





{{-- CRISI: [landing-page] Text (Weiß) umschreiben, gleich auf Deutsch, brauchst nicht übersetzen, ist front-end --}}

<div class="off-canvas-wrapper">
<div id="offcanvas-full-screen" class="offcanvas-full-screen" data-off-canvas data-transition="detached">
<div class="offcanvas-full-screen-inner">

<div class="row collapse align-justify align-middle offcanvas-topbar">
	<div class="column shrink topbar-icon"><img src="{{ asset("img/icon.gif") }}" alt="" /></div><!-- END OF .column shrink topbar-icon -->
	<div class="column shrink">
		<span style="font-size: 1.25rem;">Menü</span>
	</div><!-- END OF .column shrink -->
	<div class="column shrink">	
    <button class="offcanvas-full-screen-close" aria-label="Close menu" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button></div><!-- END OF .column shrink -->
</div><!-- END OF .row collapse align-justify align-middle -->


	<ul class="menu vertical drilldown menu-ul" data-drilldown>
		@include("frontend.partials.navigation")
	</ul><!-- END OF .menu -->
</div>
    </div>
    <div class="off-canvas-content" data-off-canvas-content>

<header id="header" class="img-container">
	<div class="row collapse align-middle">
		<div class="column small-12 large-5">@include("frontend.partials.logosvg")
		<h1 class="dontlook">SEVEN Webagentur</h1><!-- END OF .dontlook --></div><!-- END OF .column small-12 medium-5 -->
		<div class="column small-12 large-7 align-middle heroavatars">
			<div class="row align-spaced align-middle">
				<div class="column small-12 medium-6 heroavatar"><img src="{{ asset("img/chrisi.jpg") }}" alt="" /><div class="bio row collapse align-center"><div class="column shrink"><h2>Christian Neuherz</h2><span class="nickname">info@sevenweb.eu</span><br /><h3 class="position">Konzeptentwicklung und Management</h3>
				</div><!-- END OF .column shrink align-center -->
				</div><!-- END OF .bio --></div><!-- END OF .column small-12 medium-6 avatar -->
								<div class="column small-12 medium-6 heroavatar"><img src="{{ asset("img/laci.jpg") }}" alt="" /><div class="bio row collapse align-center"><div class="column shrink"><h2>Takács László</h2><span class="nickname">info@sevenweb.eu</span><br /><h3 class="position">Programmierung und Design</h3>
				</div><!-- END OF .column shrink align-center -->
				</div><!-- END OF .bio --></div><!-- END OF .column small-12 medium-6 avatar -->
			</div><!-- END OF .row align-spaced align-middle -->
		</div><!-- END OF .column small-12 medium-7 -->
	</div><!-- END OF .row collapse -->
</header>

	<nav id="mainnav">
		<div data-sticky-container id="topbar-wrapper" ><div id="topbar-stick" style="width:100%" ><div class="row collapse align-justify align-middle" id="topbar">
					<div class="column shrink topbar-icon"><img src="{{ asset("img/icon.gif") }}" alt="" /></div><!-- END OF .column shrink -->
					<div class="column expand show-for-medium">
						<ul class="menu horizontal dropdown align-center" id="main-menu" data-dropdown-menu data-click-open="true" data-closing-time="1500" data-disable-hover="true">
							@include("frontend.partials.navigation")
						</ul><!-- END OF .menu horizontal -->
					</div><!-- END OF #mainmenu.column expand -->
					<div class="column shrink hide-for-medium">
						           <a data-toggle="offcanvas-full-screen"><i class="fa fa-2x fa-navicon"></i></a>
					</div><!-- END OF .column shrink hide-for-medium -->
				</div><!-- END OF #topbar.row collapse --></div></div>
	</nav>

<section id="one">
	<div class="row  align-spaced align-bottom">
		<div class="column small-12 large-8 small-order-2 large-order-1">

<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:hinge-in-from-left; animInFromRight:hinge-in-from-right; animOutToLeft:hinge-out-from-left; animOutToRight:hinge-out-from-right;timerDelay:7000">
  <nav class="orbit-bullets">
   <button class="is-active" data-slide="0"><span class="show-for-sr">Erste Folie - Details</span><span class="show-for-sr">Aktuelle Folie</span></button>
   <button data-slide="1"><span class="show-for-sr">Zweite Folie - Details.</span></button>
   <button data-slide="2"><span class="show-for-sr">Dritte Folie - Details.</span></button>
   <button data-slide="3"><span class="show-for-sr">Vierte Folie - Details.</span></button>
 </nav>
  <ul class="orbit-container">
    <button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
    <button class="orbit-next" aria-label="next"><span class="show-for-sr">Nächste Folie</span>&#9654;</button>
    <li class="is-active orbit-slide">
		<img class="orbit-image" src="{{asset('img/orbit-1.jpg')}}" alt="Space">
		<figcaption class="orbit-caption">SEVEN Kalender Projekt - <a href="#">Öffnen</a></figcaption>
    </li>
    <li class="orbit-slide">
		<img class="orbit-image" src="{{asset('img/orbit-2.jpg')}}" alt="Space">
		<figcaption class="orbit-caption">SEVEN Kalender Projekt - Handy</figcaption>
    </li>
    <li class="orbit-slide">
		<img class="orbit-image" src="{{asset('img/orbit-3.jpg')}}" alt="Space">
		<figcaption class="orbit-caption">SEVEN Kalender Projekt - Tablet</figcaption>
    </li>
    <li class="orbit-slide">
		<img class="orbit-image" src="{{asset('img/orbit-4.jpg')}}" alt="Space">
		<figcaption class="orbit-caption">SEVEN Kalender Projekt - Desktop</figcaption>
    </li>
  </ul>
</div>

		</div><!-- END OF .column small-12 mediun-6 large-6 -->
		<div class="column small-12 large-4 small-order-1 large-order-2">
			<h3><em>1</em> Responsiv Design</h3>
			<p>Wir erstellen das Design so, dass verschiedene Endgeräte eine ideale Benutzerfreundlichkeit bieten.<br /><br /></p>
			<div class="row align-center collapse">
				<div class="colum shrink"><a href="#" class="button hollow tertiary">Mehr Erfahren</a></div><!-- END OF .colum shrink -->
			</div><!-- END OF .row align-center collapse -->
		</div><!-- END OF .column small-12 mediun-6 large-6 -->
	</div><!-- END OF .row collapse align-spaced align-middle -->



<div class="row align-spaced align-middle">
		<div class="column small-12 medium-12 large-6 small-order-2 align-middle">

<div class="orbit shaded" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;timerDelay:12000">
  <ul class="orbit-container">
       <li class="is-active orbit-slide">
		<img class="two orbit-image" src="{{asset('img/orbit-1.jpg')}}" alt="Space">
    </li>
    <li class="orbit-slide">
		<img class="two orbit-image" src="{{asset('img/orbit-2.jpg')}}" alt="Space">
    </li>
    <li class="orbit-slide">
		<img class="two orbit-image" src="{{asset('img/orbit-3.jpg')}}" alt="Space">
    </li>
    <li class="orbit-slide">
		<img class="two orbit-image" src="{{asset('img/orbit-4.jpg')}}" alt="Space">
    </li>
  </ul>
</div>

		</div><!-- END OF .column small-12 mediun-6 large-6 -->
		<div class="column small-12 medium-12 large-6 small-order-1 self-align-top align-self-top">
			<h3><em>2</em> Programmierung & Entwicklung</h3>
			<p>Mollitia error nihil, aspernatur voluptatem doloremque esse nulla, vitae iusto. Vero magnam minus, ut ab corporis aliquam architecto, ipsam suscipit placeat. Fugiat, vitae tempora non repellat recusandae? In, ad culpa.</p>
		</div><!-- END OF .column small-12 mediun-6 large-6 -->
	</div><!-- END OF .row collapse align-spaced align-middle -->	
</section>

<section id="two">
<div class="row align-center">
<div class="column shrink"   id="allfeatures">
 		<div class="row align-center">
 			<div class="column shrink"><button></button><button></button><button></button></div><!-- END OF .column small-12 -->
 		</div><!-- END OF .row -->
 		<div class="row align-center">
 			<div class="column small-12 small-offset-2"><a href="#"></a></div><!-- END OF .column small-12 -->
 		</div><!-- END OF .row --></div><!-- END OF .column small-12 --> </div><!-- END OF .column align-center shrink -->
</section><!-- END OF #two -->

<section id="three">
	<div class="row collapse align-center">
		<div class="column shrink">
			<h1>SEVEN Webagentur</h1>
		</div><!-- END OF .column shrink -->
	</div><!-- END OF .row collapse align-center -->
	<div class="row align-spaced align-middle" id = "nokontakt">
		<div class="column" style="text-align:right">
			<h4>Sie haben Fragen?</h4>
			<p>Lassen Sie uns eine Nachricht da und wird nehmen Kontakt auf!</p>
		</div><!-- END OF .column -->
		<div class="column" style="text-align:center"><i class="fa fa-envelope-o kontakticon"></i></div><!-- END OF .column -->
	</div><!-- END OF .row align-spaced -->
		<div class="row align-center align-middle" id="contacted">
		<div class="column" style="text-align:right">
			<h4>Nachricht wurde gesendet!</h4>
			<p>Wir melden uns so bald wie möglich.</p>
		</div><!-- END OF .column -->
		<div class="column" style="text-align:left"><i class="fa fa-envelope" id="kontakticon"></i></div><!-- END OF .column -->
	</div><!-- END OF .row align-spaced -->
<form action="{{route("kontakt")}}" method="POST" id="kontakt">
{{csrf_field()}}
<div class="row">
		<div class="column small-12 medium-7 medium-offset-3 large-5 large-offset-4 input-container"><input placeholder="Email" type="text" name="email" id="email"/><label for="email">Email</label></div><!-- END OF .column small-12 medium-7 medium-offset-3 large-5 large-offset-4 input-container -->
	</div><!-- END OF .row -->
	<div class="row">
		<div class="column small-12 medium-7 medium-offset-3 large-5 large-offset-4 input-container"><input placeholder="Thema" type="text" name="subject" id="subject"/><label for="subject" >Thema</label></div><!-- END OF .column small-12 medium-7 medium-offset-3 large-5 large-offset-4 input-container -->
	</div><!-- END OF .row -->
	<div class="row">
		<div class="column small-12 medium-7 medium-offset-3 large-5 large-offset-4 input-container"><textarea placeholder="Nachricht" name="message" id="message"></textarea><label for="message" name="subject" id="subject">Nachricht</label></div><!-- END OF .column small-12 medium-7 medium-offset-3 large-5 large-offset-4 input-container -->
	</div><!-- END OF .row -->
	
	<div class="row">
		<div class="column small-offset-2 small-10 medium-5 medium-offset-5 large-4 large-offset-5">
		<button type="submit" class="expanded button large fabu fa-envelope">Senden</button>
		</div><!-- END OF .column small-12 medium-7 medium-offset-3 large-5 large-offset-4 input-container -->
	</div><!-- END OF .row --></form>

	<!-- END OF #kontakt -->
</section><!-- END OF #three -->

<section id="blog">
<div class="row collapse align-center">
		<div class="column  small-12 medium-10 large-8">
			<h2>21 Entscheidungen, die man treffen muss, bevor man sich eine Website erstellen lässt.</h2>
		</div><!-- END OF .column shrink -->
	</div><!-- END OF .row collapse align-center -->
	<br />
	<div class="row align-center">
		<div class="column small-12 medium-10 large-8">
			<p>Ullam, error aut voluptates laudantium quod, doloribus tempore eius adipisci. Nesciunt facere, aut dolore quibusdam? Adipisci nam obcaecati harum quos eos mollitia quis deleniti deserunt, ut aperiam quidem, veniam vero saepe animi debitis asperiores doloribus est sequi. Possimus, sit, quos distinctio eum eius ratione dolor accusantium ab suscipit temporibus at incidunt est animi odio unde minima, enim deleniti ipsa nesciunt praesentium consequuntur ex. Dicta laboriosam quaerat architecto, ut itaque accusantium maiores illo voluptas ducimus dignissimos non aliquid quam omnis, tenetur reiciendis eos blanditiis amet ea, quidem labore iste, perferendis explicabo nulla! Mollitia iusto ea voluptate quis eligendi eos iure quaerat, magnam, iste consectetur recusandae explicabo odio ratione perferendis doloribus corporis ab eaque quam modi voluptas dignissimos provident in voluptates accusantium? Delectus tempore ullam laborum alias aut eveniet accusamus dolor nulla, consequatur! Iusto, ratione, quibusdam? Quia maiores provident, molestiae exercitationem soluta eius deleniti omnis saepe architecto impedit temporibus porro natus. Repellendus.</p>
		</div><!-- END OF .column shrink -->
	</div><!-- END OF .row align-center -->
	<div class="row align-center">
		<div class="column small-offset-3 shrink"><a href="#" class="button large hollow">Weiterlesen im Blog</a></div><!-- END OF .column small-offset-3 -->
	</div><!-- END OF .row align-center -->
	
</section><!-- END OF #blog -->

<footer>
	<div id="line" class="row"></div><!-- END OF #line.row -->
	<div class="row main align-justify align-bottom">
		<div class="column small-12 medium-4"><p><small>Seven Webagentur ist der Verkaufsname der Firma Seven Webagentur Christian Neuherz und Takács László GesnbR.  </small></p></div><!-- END OF .column small-12 medium-4 -->
		<div class="column small-12 medium-4">
			<ul class="menu vertical align-center">
				<li><a href="#"><i class="fa fa-file-text"></i> Blog</a></li>
				<li><a href="#"><i class="fa fa-info-circle"></i> Impressum</a></li>
				{{-- CRISI: [landing-page] Disclaimer   Schreib dazu, dass die firma nocht nicht gegründet is. Die gründung erfolgt ende das Jahr 2017.  Schreib dazu, dass die Webseite noch in bearbeitung ist. --}}
				{{-- CRISI: [landing-page] Datenschutz --}}
				{{-- CRISI: [landing-page] Copyright text (such a mustertext) --}}
				{{-- CRISI: [landing-page] Impressum (mit deine daten für jetzt, dann firmendaten (kannst firmendaten auch schon generieren, in evernote speichern)) --}}
				<li><a href="#"><i class="fa fa-info-circle"></i> Disclaimer</a></li>
				<li><a href="#"><i class="fa fa-shield"></i> Datenschutzbedingungen</a></li>
				<li><a href="#"><i class="fa fa-copyright"></i> Alle rechte vorbehalten.</a></li>
			</ul><!-- END OF .menu vertical -->
		</div><!-- END OF .column small-12 medium-4 -->

		{{-- CRISI: [info] @read-and-delete das ist unser firmenbeschreibung für seo und für social media: --}}
		<div class="column small-12 medium-4"><p>SEVEN Webagentur bietet Webseite Design und Programmierung, Logodesign und individuelle Webapplikationen für Firmen in der Nähe von Graz und Klagenfurt.</p></div><!-- END OF .column small-12 medium-4 -->
		<div class="column small-12">	<div class="row align-center align-middle" id="footer-svg-container">
		<div class="column shrink" >
			@include("frontend.partials.logo-horizontal-svg")
		</div><!-- END OF .column -->
	</div><!-- END OF .row --></div><!-- END OF .column small-12 -->
	</div><!-- END OF .row main align-justify align-top -->

</footer>


    </div> <!-- end of off-canvas-content (PAGE CONTENT) -->
  </div>



<script src="{{ mix('js/public.js') }}">
</script>
<script>
	$(function() {
		var contacted = false;
				$("#contacted").hide();
		$("body").on("submit","#kontakt",function() {
			if(!contacted)
			{
				contacted=true;
				$("#nokontakt").hide();
				$("#contacted").fadeIn("slow");
				$("#kontakt").hide();
$('html,body').animate({
   scrollTop: $("#three").offset().top
});
			}
			return false;
		});

	});

</script>
@stack("extrajs")
@include('frontend.partials.cookie')
</body>
</html>


{{-- CRISI: [landing page] text german correct & [lang] --}}