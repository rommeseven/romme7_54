rem call php artisan db:restore --database=mysql --source=dropbox --sourcePath=project --timestamp="d-m-Y" --compression=gzip
heroku pg:backups:restore 'http://22laci.22web.org/latest.dump'