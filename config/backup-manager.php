<?php

return array(
    'local'   => array(
        'type' => 'Local',
        'root' => storage_path('app'),
    ),

    //CRISI: add dropbox to stammdaten @important @schnell
    'dropbox' => array(
        'type'   => 'Dropbox',
        'token'  => '',
        'key'    => env('DBOX_TOKEN'),
        'secret' => env('DBOX_APP_SECRET'),
        'app'    => '',
        'root'   => 'backups/'.env('APP_CODE'),
    ),

);
