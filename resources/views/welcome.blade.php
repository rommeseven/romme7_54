<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- //REMEMBER: Add public favicon --}}
        <link rel="shortcut icon" href="asset('frontend/img/favicon.ico')" type="image/x-icon">
        <link rel="icon" href="asset('frontend/img/favicon.ico')" type="image/x-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Biryani" rel="stylesheet">        

        <title>{{ settings('app_title') }} - @stack('title')</title>
        <link href="{{ mix('css/public.css') }}" rel="stylesheet" type="text/css">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @stack("extracss")
    </head>
    <body>

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
		@include("frontend.partials.tmp_navigation")
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
				<div class="column small-12 medium-6 heroavatar"><img src="{{ asset("img/avatar.jpg") }}" alt="" /><div class="bio row collapse align-center"><div class="column shrink"><h2>Christian Neuherz</h2><span class="nickname">"the Problem Solver"</span><br /><h3 class="position">Design und Management</h3>
				</div><!-- END OF .column shrink align-center -->
				</div><!-- END OF .bio --></div><!-- END OF .column small-12 medium-6 avatar -->
								<div class="column small-12 medium-6 heroavatar"><img src="{{ asset("img/avatar.jpg") }}" alt="" /><div class="bio row collapse align-center"><div class="column shrink"><h2>Takács László</h2><span class="nickname">"the Hungarian Genius"</span><br /><h3 class="position">Entwicklung und Design</h3>
				</div><!-- END OF .column shrink align-center -->
				</div><!-- END OF .bio --></div><!-- END OF .column small-12 medium-6 avatar -->
			</div><!-- END OF .row align-spaced align-middle -->
		</div><!-- END OF .column small-12 medium-7 -->
	</div><!-- END OF .row collapse -->
</header>

<div id="anchor"></div><!-- END OF #anchor -->
	<nav id="mainnav">
		<div data-sticky-container id="topbar-wrapper" ><div id="topbar-stick" data-sticky data-top-anchor="anchor" data-options="marginTop:0;stickyOn: small;" style="width:100%" ><div class="row collapse align-justify align-middle" id="topbar">
					<div class="column shrink topbar-icon"><img src="{{ asset("img/icon.gif") }}" alt="" /></div><!-- END OF .column shrink -->
					<div class="column expand show-for-medium">
						<ul class="menu horizontal dropdown align-center" id="main-menu" data-dropdown-menu data-click-open="true" data-closing-time="1500" data-disable-hover="true">
							@include("frontend.partials.tmp_navigation")
						</ul><!-- END OF .menu horizontal -->
					</div><!-- END OF #mainmenu.column expand -->
					<div class="column shrink hide-for-medium">
						            <button class="menu-icon" type="button"  data-toggle="offcanvas-full-screen">
                </button>
					</div><!-- END OF .column shrink hide-for-medium -->
				</div><!-- END OF #topbar.row collapse --></div></div>
	</nav>

<section id="one">
	<div class="row  align-spaced align-bottom">
		<div class="column small-12 large-8 small-order-2 large-order-1">

<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:hinge-in-from-left; animInFromRight:hinge-in-from-right; animOutToLeft:hinge-out-from-left; animOutToRight:hinge-out-from-right;timerDelay:7000">
  <nav class="orbit-bullets">
   <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
   <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
   <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
   <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
 </nav>
  <ul class="orbit-container">
    <button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
    <button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
    <li class="is-active orbit-slide">
		<img class="orbit-image" src="{{asset('img/orbit-1.jpg')}}" alt="Space">
		<figcaption class="orbit-caption">SEVEN Calender Project - <a href="#">Öffnen</a></figcaption>
    </li>
    <li class="orbit-slide">
		<img class="orbit-image" src="{{asset('img/orbit-2.jpg')}}" alt="Space">
		<figcaption class="orbit-caption">SEVEN Calender Project - Handy</figcaption>
    </li>
    <li class="orbit-slide">
		<img class="orbit-image" src="{{asset('img/orbit-3.jpg')}}" alt="Space">
		<figcaption class="orbit-caption">SEVEN Calender Project - Tablet</figcaption>
    </li>
    <li class="orbit-slide">
		<img class="orbit-image" src="{{asset('img/orbit-4.jpg')}}" alt="Space">
		<figcaption class="orbit-caption">SEVEN Calender Project - Desktop</figcaption>
    </li>
  </ul>
</div>

		</div><!-- END OF .column small-12 mediun-6 large-6 -->
		<div class="column small-12 large-4 small-order-1 large-order-2">
			<h3><em>1</em> Responsiv Design</h3>
			<p>Wir bereiten die Designs so, dass verschiedene Endgeräte ein entsprechendes Erlebnis bieten. <br /><br /></p>
			<div class="row align-center collapse">
				<div class="colum shrink"><a href="#" class="button hollow tertiary">Mehr Erfahren</a></div><!-- END OF .colum shrink -->
			</div><!-- END OF .row align-center collapse -->
		</div><!-- END OF .column small-12 mediun-6 large-6 -->
	</div><!-- END OF .row collapse align-spaced align-middle -->



<div class="row align-spaced align-middle">
		<div class="column small-12 medium-12 large-6 small-order-2 align-middle">

<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;timerDelay:12000">
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
</div><!-- END OF .row -->
</section><!-- END OF #two -->


<section>

<a href="" class="button large">say hi</a>


	<p>Obcaecati esse, officia excepturi inventore perspiciatis animi velit beatae minima aut ad, consequuntur vel placeat ducimus unde in, numquam, soluta reprehenderit molestias. Similique fuga, voluptates reprehenderit amet id, consequatur sed eligendi cupiditate voluptate provident fugiat, expedita non! Quo ab provident minima, culpa, consequuntur sit laborum, tempora <a href="#" class="button large secondary">Press Me</a> veritatis ad officia atque mollitia eveniet quod sequi quae deserunt beatae soluta molestiae. Necessitatibus delectus, modi cumque nihil libero aliquid quidem veritatis officiis veniam? Ipsum possimus repellat, quibusdam voluptatibus odit eum unde est labore consequuntur ab vitae amet similique alias vero maxime architecto? Natus cum dolore molestiae pariatur, nostrum at, aliquid nesciunt officiis ex tenetur atque! Nam doloribus eveniet est cumque esse dicta et, maiores debitis fugit quo quidem, ex animi totam perspiciatis optio, ipsam voluptates similique dolorum. Debitis reprehenderit, voluptate atque obcaecati molestias cupiditate laudantium, dolorem alias omnis iste sit ipsa esse architecto aperiam nihil rerum, amet repudiandae tenetur enim odit numquam voluptatum in minus. Quam nemo, labore, dignissimos quod alias id delectus esse dicta eius. Aspernatur doloribus, minima facilis placeat quis voluptas minus reprehenderit sint, dolor similique natus neque quaerat, maxime laborum facere labore vero illo soluta esse iste tenetur quibusdam omnis nihil rerum. Nulla voluptatibus maiores natus, sint temporibus eum doloremque tempora suscipit repellat consectetur voluptates cumque nisi atque. Repudiandae voluptatem iste autem in aspernatur quasi magni, quo commodi quam dignissimos obcaecati debitis neque unde earum suscipit <a href="#" class="button large tertiary">Press Me</a> ducimus omnis ipsum maiores nobis, maxime corporis alias dolores! Sit, eligendi, cumque atque ad eum, accusamus odit optio quam maiores vitae quidem, autem. Debitis et quasi consequuntur tempora quia est voluptatum ipsam quos ad, magnam officia illo. Quaerat molestiae impedit dolore voluptatem hic inventore molestias quis cumque, quidem excepturi vero, et culpa reprehenderit commodi non eveniet incidunt quod aut sit beatae maiores soluta tempore cum. Quas, architecto! Possimus voluptas, doloremque sint placeat libero eligendi, sapiente voluptatibus qui, maiores dolores excepturi fugit quae ratione nesciunt temporibus animi nobis. Necessitatibus incidunt doloremque ad similique velit quisquam itaque fuga dolore rem vitae ducimus deleniti accusamus ipsum vel nesciunt adipisci, tenetur consequatur voluptates fugiat molestias laborum culpa temporibus! Sequi quos error quidem rerum reiciendis ipsum, velit voluptates nemo aut obcaecati fuga animi deserunt, repellendus impedit porro temporibus tempora dolorum libero explicabo consequuntur doloremque magni, ullam quisquam! Illo dicta illum optio enim aperiam assumenda, in aliquam ut quos, repellendus voluptatem veniam! Sit molestias accusamus id vel impedit mollitia magni pariatur in iste rerum fugiat quis molestiae ullam voluptates adipisci nemo, optio quisquam dolorem ipsam illum dolores commodi, tenetur accusantium minima quae. Pariatur odit id totam, iusto ex sit voluptatem fuga sunt explicabo, blanditiis ab eum asperiores, repudiandae aperiam dolore impedit neque voluptate dolor laudantium in molestias quidem odio! Possimus, odio magni dolores tempora, id nostrum mollitia facilis maiores ipsam suscipit facere ea. Officiis sunt corporis quia veritatis, ratione molestiae excepturi, accusantium distinctio autem, consequuntur mollitia iure soluta enim voluptas voluptatibus suscipit inventore eaque deleniti fuga at! Obcaecati, illo odit velit earum, quaerat tenetur quae sapiente quam voluptatum dignissimos. At expedita voluptates numquam quia aliquam officiis fugiat dolore. Accusamus ab placeat alias debitis fuga nihil incidunt ad, at autem, eos consectetur error rem impedit dolorum ratione minima quia, harum deserunt fugit voluptatibus inventore totam tempore officiis. Inventore libero dolores adipisci nemo, minima dolorem perferendis beatae eligendi. Adipisci vitae, officiis enim asperiores numquam culpa alias reprehenderit qui, dolorem repellendus a natus deserunt eaque doloremque obcaecati distinctio quos necessitatibus amet rerum! A architecto repellat quo aperiam voluptatibus dolores. Temporibus rerum veniam vitae doloremque laudantium, ad asperiores dignissimos, assumenda dolores! Corrupti sint nihil atque ipsa, quidem sit tenetur est. Quasi pariatur perferendis mollitia, consequatur nulla doloribus, molestiae eius blanditiis nobis repellendus incidunt quisquam officiis neque. Impedit voluptate sed eaque facilis minus labore sequi quia aperiam voluptas ullam. Alias maxime nemo, commodi officia dicta, odit laudantium, repellendus quas aspernatur quae quibusdam tempora voluptas praesentium sint illum sunt nostrum fugiat facere saepe eveniet. Minima in ad, iure possimus quidem provident nulla omnis dolor quasi maxime, expedita repellendus mollitia ut, tempora praesentium repudiandae debitis maiores dolores. Nobis et animi ducimus dolorum, voluptas aliquid minima? Provident repudiandae, maxime possimus voluptatem, laudantium voluptatum architecto laboriosam odit, molestiae necessitatibus qui est. Labore quidem perspiciatis, sequi adipisci voluptates temporibus non quod ab alias ratione consequuntur tempore consequatur, aliquam fugit odit.</p>
</section>
<section>
	<p>Eos omnis facere est voluptatum accusantium pariatur doloremque numquam minus architecto, excepturi modi, porro repellat dolorem! Quidem voluptate quasi inventore, quibusdam labore facilis quas iusto tempore? Magni sunt maxime, omnis quae repellendus sapiente qui, reprehenderit accusamus quod quibusdam dolores rem ex quos assumenda porro voluptatibus dignissimos quas expedita ipsam vero sint. Eligendi incidunt, expedita dolore! Necessitatibus facere dolore velit inventore ipsum nisi, enim deleniti optio nam adipisci, obcaecati praesentium consequuntur consequatur libero quibusdam cumque. Voluptas optio, consectetur perspiciatis fugiat mollitia enim cupiditate fugit laudantium. Veritatis temporibus modi, dicta delectus non, tenetur eos eius ut, corporis id iure minima. Eos provident, iste tempora necessitatibus dolor fugiat eveniet rerum possimus reprehenderit eius optio nemo alias tenetur voluptatum velit nisi ipsum, minima quo error, ipsam a accusamus laudantium libero! Numquam hic dolorum vero veritatis iusto reprehenderit ducimus minus ut, sequi veniam consequuntur. Quisquam nostrum nobis debitis atque ad deleniti sit, unde cumque perferendis non optio, impedit eius, dignissimos at! Iure, aperiam, eos nostrum quas, repellat accusantium cupiditate placeat enim unde et vel labore ex libero debitis ipsam. Officiis iure, aliquam, aspernatur nihil cupiditate perferendis quasi odio hic est aliquid sapiente exercitationem excepturi. Minima debitis exercitationem illo dignissimos dolorem consequuntur, modi quo amet tempore. Explicabo temporibus omnis iste dolorum nesciunt iusto! Quo beatae qui, repudiandae, suscipit sunt nam porro expedita nihil obcaecati maxime, dolore. Atque nulla ex ullam eum, saepe aperiam consequuntur, architecto culpa, provident aut quidem sit sapiente nemo officia. Numquam, eaque, sint. Unde hic quaerat cum voluptatum placeat pariatur dolorem molestias tempora? Rem incidunt vero dignissimos rerum ullam sequi et nisi ut nulla natus autem, beatae voluptas nemo officia placeat, architecto inventore provident quia fugit hic totam impedit ad nam. At odit vitae eveniet eaque facilis quod labore, molestiae illum culpa ullam beatae, ad, nisi. Commodi asperiores pariatur minus enim id error obcaecati facere est officiis ab praesentium quisquam amet esse aut in maxime necessitatibus laboriosam quas aliquid, unde saepe omnis facilis voluptatem excepturi! Hic totam accusamus itaque maiores, harum distinctio consequuntur commodi adipisci? Eaque mollitia, ut. Eaque nulla iure ullam harum, perferendis dolor quas. Sit ipsa enim quo perspiciatis! Officia non aliquam aperiam aspernatur quae culpa assumenda, quam harum doloribus voluptas modi voluptatibus blanditiis amet dolorem, eaque illum, atque similique, optio cumque itaque! Adipisci possimus minima vitae, quidem quos nam iure! Recusandae, accusantium. Nostrum dignissimos dolores labore nobis. Magnam consequuntur necessitatibus temporibus culpa cupiditate quibusdam, id repellendus soluta quisquam asperiores nulla assumenda odio laborum officia optio deleniti similique recusandae voluptates labore dolor, voluptas aspernatur accusamus fugiat molestias? Praesentium dolores dignissimos eius quidem a omnis nulla facere neque aliquam accusantium. Ullam magni et cupiditate hic tempora dignissimos voluptas, mollitia dicta numquam, id ipsam suscipit molestiae neque nam repellendus repellat. Deserunt veniam officia doloremque voluptatibus debitis commodi aliquam, nemo rerum consequuntur quam vero molestias aspernatur nulla ab alias repellendus in odit. Tempora, repudiandae autem aliquid rerum natus quaerat. Cum impedit rem dolore quasi aliquam illum illo culpa repellat vel alias tenetur sit necessitatibus accusantium, tempora enim rerum numquam facere sapiente reprehenderit ipsa exercitationem. Quae fugit, quas reprehenderit ratione iure optio deserunt non doloremque, eaque provident delectus. Veritatis nesciunt similique, officiis voluptas sint tempora eligendi explicabo sequi ipsa quo qui ipsam sapiente ex tenetur ad dolorem saepe, labore ea quae. Quo porro, distinctio, placeat animi at non dolor, beatae expedita soluta iusto earum odit est dicta quaerat vel error mollitia hic. Nam odit vitae natus quia in similique, atque assumenda voluptate doloremque nisi magnam eaque aperiam repellat eius veritatis cupiditate laboriosam quas, molestias adipisci quisquam harum temporibus dolores. Dicta suscipit accusantium, temporibus aspernatur amet dignissimos maiores non quia nesciunt. Praesentium impedit, aliquid qui suscipit atque minima voluptatum quod iure minus, eligendi corporis quaerat totam tempora vero, voluptatibus ipsam repudiandae! Autem reiciendis modi in, distinctio numquam error odit asperiores, a aliquam doloremque accusamus consequatur accusantium qui possimus perferendis, odio, placeat sit delectus magni. Eligendi error ipsum dolores quos voluptatem, similique praesentium, magni amet deleniti tempore totam, perspiciatis nemo, ullam. Nostrum, voluptatibus necessitatibus ea doloribus deserunt minima perferendis et aut a, corporis nemo, culpa commodi. Eligendi quidem, saepe iusto dignissimos consequuntur! Quod ex voluptas omnis, culpa nulla iusto labore deserunt natus esse, impedit consequatur ipsa eaque mollitia, aspernatur doloremque ea voluptatibus possimus unde sunt minus facilis!</p>
</section>
<section>
	<p>Aperiam eos sit similique, reiciendis sapiente, eius velit voluptatum accusamus cum! Architecto officia tempora earum suscipit voluptas nihil distinctio nobis in, quod, ut eum illo iusto eligendi deserunt sint porro veritatis provident veniam eos quasi quidem quisquam laudantium voluptatum reiciendis corporis. Voluptas deserunt voluptate, ipsa repellat mollitia consectetur architecto quos placeat laboriosam iure, itaque quod. Iure distinctio ratione quaerat ut similique, rerum aspernatur eaque, a temporibus debitis totam asperiores enim veritatis laudantium numquam ad laborum. Quam ex velit at magnam deleniti laudantium voluptatem quasi nemo itaque. Quod, deserunt atque aspernatur natus blanditiis dolorum facere ab doloribus, quidem debitis accusamus! Alias neque ea accusamus, adipisci explicabo excepturi. Eveniet voluptatibus quam sit consequatur autem asperiores minima quia ex mollitia dolorem. Optio facilis impedit architecto placeat, esse, fuga sit consectetur aspernatur. Dolorem quia fugit quis corrupti, placeat quos commodi, assumenda perferendis reiciendis temporibus voluptas nam eaque officia. Aspernatur placeat dicta eius totam repellendus quibusdam, tempore obcaecati, autem voluptatem fugiat qui deleniti, debitis iure, quisquam officia excepturi! Aperiam vero dignissimos corporis, atque eos molestias doloremque earum maiores ipsa modi, animi, nisi, in accusantium saepe omnis quo cupiditate inventore autem ex libero cumque eveniet fugit dolor natus! Tempora, delectus omnis harum eum quidem ab odio similique accusantium, nobis placeat quaerat modi officia earum, enim doloremque. Optio ratione blanditiis, deserunt ab, eum architecto perspiciatis eligendi aut doloribus voluptas amet voluptatem totam cum harum rerum accusamus itaque voluptate quidem obcaecati alias dolorem. Quam dolor non voluptatibus magni culpa provident libero quae impedit commodi, enim fugit esse similique ex ut aspernatur in consequuntur earum, maiores repudiandae quaerat quisquam alias. Excepturi quam aliquam suscipit, esse at a modi optio, eius tempora voluptatibus, nihil vel id neque rerum odit! Magnam optio officiis, dolor nemo tempore eius minima at labore! Eveniet ullam architecto cum itaque amet, accusantium, iusto laudantium, expedita officia at quaerat quisquam. Illo quis placeat repellendus quaerat error omnis eos a perferendis quam, earum voluptatum dolorum illum blanditiis ipsum delectus! Illo voluptas beatae veritatis temporibus, possimus dolore pariatur laboriosam dolor consequatur, at fuga dignissimos itaque ea quidem asperiores perspiciatis iste magnam tenetur neque distinctio, nisi vitae. Ex molestias temporibus, enim ab consequuntur magni at nemo tempora nam officiis laboriosam dolor, voluptates ratione reiciendis maxime illo autem facere unde perspiciatis quod officia vitae possimus! Porro dolore dolor adipisci, ex nobis autem dolorum rem excepturi necessitatibus a quo neque id fuga ullam, libero doloribus enim nostrum minus nemo at? Quibusdam molestias cumque voluptatum minus tempore mollitia recusandae omnis ipsa quisquam cum sint eveniet, labore ratione provident debitis dolorum sapiente officia, animi excepturi! At totam vitae quod soluta commodi eveniet odio sunt est facere perferendis quia, non amet nobis natus eos nulla voluptas iusto numquam praesentium. Autem fugit quo neque aperiam, saepe quia dolore, aliquam quasi tenetur fugiat voluptates voluptatibus omnis eaque repellendus eligendi magnam ab laborum beatae! Ratione adipisci quae repellendus doloribus impedit neque sint, necessitatibus vel pariatur maxime eos temporibus delectus natus tenetur deleniti blanditiis, accusamus harum eius, iste. Officia aperiam deserunt doloribus porro fuga ab soluta accusamus sapiente repellat perferendis sint, incidunt explicabo est, quae et. Modi maiores beatae quidem facilis nemo recusandae reiciendis voluptates, quaerat molestiae tenetur eaque quos neque cum ratione autem necessitatibus illum voluptate consequuntur, maxime esse doloremque perspiciatis ea! Quas facere, nobis distinctio ullam nesciunt dolorem voluptatibus ex. Eligendi, dignissimos inventore amet assumenda dolor reprehenderit quam dolorum illum officiis voluptatibus nostrum nesciunt numquam animi, molestiae enim odio voluptatum vero, nihil. Numquam eos dolorum voluptatum ad, hic distinctio sed, deleniti natus quidem culpa pariatur quibusdam labore? Aperiam cumque inventore numquam saepe in quo odio doloribus non sequi vel, nostrum maxime iste ea mollitia laudantium dolorem, illum autem beatae, sit pariatur. Ullam magnam qui aliquid quidem. Ratione quisquam veritatis impedit nam officiis magnam eum veniam, iste est necessitatibus laboriosam nisi nobis corporis reprehenderit suscipit eos labore quam et pariatur mollitia quidem ab sunt possimus? Commodi iure odit dignissimos impedit consectetur officia alias illo maxime, quae vero eos magni vitae, accusantium voluptatem facere. Earum dicta ipsa, adipisci provident optio beatae itaque eligendi, unde veritatis quos consequatur culpa? Iure nam magni eligendi, et maxime veniam quia non ad quos? Sequi distinctio soluta molestiae aliquid. Vitae hic cumque odit, saepe provident eaque, sed, necessitatibus ipsa tempora molestias ducimus iure adipisci?</p>
</section>
<div class="row collapse align-spaced">
				<div class="column shrink"><img src="{{asset("img/avatar.jpg")}}" alt="" /></div><!-- END OF .column shrink -->
				<div class="column shrink"><img src="{{asset("img/avatar.jpg")}}" alt="" /></div><!-- END OF .column -->
			</div><!-- END OF .row collapse align-spaced -->

    </div> <!-- end of off-canvas-content (PAGE CONTENT) -->
  </div>

<script src="{{ mix('js/public.js') }}">
</script>
@stack("extrajs")
@include('cookieConsent::index')
</body>
</html>
