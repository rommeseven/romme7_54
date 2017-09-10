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
call heroku config:set MAIL_FROM_ADDRESS=laszlotakacs.95+seven@gmail.com
call heroku config:set MAIL_FROM_NAME="Christian Neuherz - SEVEN Webagentur"
call heroku config:set APP_CODE=%1
call heroku addons:create cloudinary:starter
call heroku addons:create heroku-postgresql:hobby-dev
call heroku addons:create trevor:hobby
call heroku labs:enable metrics-beta
call git push heroku master
call heroku run php artisan migrate
call heroku run php artisan cms:install
call heroku open
