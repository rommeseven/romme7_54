call heroku login
call set /p appname="App name: "
call heroku create %appname% --region eu
call php artisan key:generate --show
call set /p id="COPY APP KEY HERE: "
call heroku git:remote -a %appname%
call ./herokuconfig.bat