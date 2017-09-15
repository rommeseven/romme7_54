<div class="okcBeginAnimate js-cookie-consent cookie-consent" id="okCookie">
    <p>
        <span class="cookie-consent__message">
            {!! trans('cookieConsent::texts.message') !!}
        </span>
    </p>
    <a class="js-cookie-consent-agree cookie-consent__agree" href="#" id="okClose">
        {{ trans('cookieConsent::texts.agree') }}
    </a>
    <a href="https://www.google.com" id="okCprivacy">
        Privacy Policy
    </a>
</div>

    <script>

        window.laravelCookieConsent = (function () {

            var COOKIE_VALUE = 1;

            function consentWithCookies() {
                setCookie(env("COOKIE_NAME","COOKIE_YES", COOKIE_VALUE, 365 * 20);
                hideCookieDialog();
            }

            function cookieExists(name) {
                return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
            }

            function hideCookieDialog() {
                var dialogs = document.getElementsByClassName('js-cookie-consent');

                for (var i = 0; i < dialogs.length; ++i) {
                    dialogs[i].style.display = 'none';
                }
            }

            function setCookie(name, value, expirationInDays) {
                var date = new Date();
                date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
                document.cookie = name + '=' + value + '; ' + 'expires=' + date.toUTCString() +';path=/{{ config('session.secure') ? ';secure' : null }}';
            }

            if(cookieExists(env("COOKIE_NAME","COOKIE_YES")) {
                hideCookieDialog();
            }

            var buttons = document.getElementsByClassName('js-cookie-consent-agree');

            for (var i = 0; i < buttons.length; ++i) {
                buttons[i].addEventListener('click', consentWithCookies);
            }

            return {
                consentWithCookies: consentWithCookies,
                hideCookieDialog: hideCookieDialog
            };
        })();
    </script>
