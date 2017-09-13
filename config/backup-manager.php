<?php

return array(
    'local'   => array(
        'type' => 'Local',
        'root' => storage_path('app'),
    ),


    'dropbox' => array(
        'type'   => 'Dropbox',
        'token'  => env('DBOX_TOKEN'),
        'key'    => env('DBOX_APP_KEY'),
        'secret' => env('DBOX_APP_SECRET'),
        'app'    => env('APP_CODE'),
        'root'   => env('APP_CODE')
    ),

);

