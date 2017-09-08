<?php
return array(
    'app' => env("APP_CODE","seven"),

    'seven' => array(
    	array('key' => 'slogen', 'name' => 'Slogen', 'default' => 'Something Clever', 'type' => "text", "description" => 'The text show in the header', 'validation' => "sometimes|max:255"),
        array('key' => 'motto', 'name' => 'Motto', 'default' => 'This is our OTTO', 'type' => "text", "description" => 'The smaller text in the header', 'validation' => "sometimes|max:255"),
    ),


    'vogl' => array(
		/* ANDERE BUILDING BLOCKS */    	
    ),

);
