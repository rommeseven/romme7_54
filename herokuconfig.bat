call heroku config:set TZ=Europe/Budapest
call heroku config:set APP_LOG=errorlog
call heroku config:set CACHE_DRIVER=database
call heroku config:set SESSION_DRIVER=database
call heroku config:set APP_DEBUG=true
call heroku config:set DB_CONNECTION=pgsql
call heroku config:set MAIL_DRIVER=smtp
call heroku config:set MAIL_HOST=smtp.sendgrid.net
call heroku config:set MAIL_PORT=587
call heroku config:set MAIL_ENCRYPTION=ssl
call heroku config:set MAIL_FROM_ADDRESS=noreply@sevenweb.eu
call heroku config:set MAIL_FROM_NAME="SEVEN Webagentur"
call heroku config:set APP_CODE=%1
call heroku config:set DBOX_APP_SECRET=hoc7vwfos8xt0ss
call heroku config:set DBOX_APP_KEY=uc2v7iq2qk243ba
call heroku config:set DBOX_TOKEN=MQAa74FtCyAAAAAAAAAADY1pxQxtorN4QjwQxC3mu6gF0XEZQMcN7DZpJ6GAss3V
call set /p apptitle="App TITLE: "
call heroku config:set DEFAULT_APP_TITLE="%apptitle%"
call heroku addons:create cloudinary:starter
call heroku addons:create heroku-postgresql:hobby-dev
call heroku addons:create trevor:hobby
call heroku labs:enable metrics-beta
call git push heroku master
call heroku run php artisan migrate
call heroku run php artisan cms:install
call heroku open
call heroku pipelines:promote -r staging

