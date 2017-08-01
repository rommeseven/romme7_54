@include("frontend.partials.head")
<h3>Slogan: {{ $bbs['slogan'] }}</h3>
<div id="container">
    <div id="navigationbar">
		    @include('frontend.partials.navigation')
    </div>
    <div id="content">
		@stack("content")

        <hr/>
        <div id="footer row">
        <div class="column shrink">
            ©2013. Minden jog fenntartva!
            <br/>
            A weboldalt készítette: Takács László  ➺
            <a href="mailto://laszlo.takacs.95@gmail.com">
                laszlo.takacs.95@gmail.com
            </a>
            </div><!-- END OF .column shrink -->
        </div>
    </div>
</div>
<script src="{{ mix('js/public.js') }}">
</script>
@stack("extrajs")
</body>
</html>
