call heroku login
call set /p appname="App name: "
call heroku create %appname% --region eu
call heroku access:add laszlotakacs.95+heroku@gmail.com
call php artisan key:generate --show
call set /p id="COPY APP KEY HERE: "
call heroku git:remote -a %appname%
call heroku labs:enable runtime-dyno-metadata -a %appname%
call heroku plugins:install heroku-pipelines
call heroku pipelines:create -a %appname%
call heroku pipelines:add -a %appname%-staging %appname%
call ./herokuconfig.bat