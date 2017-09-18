<?php
return array(
    'app'   => env("APP_CODE", "seven"),

    'seven' => array(
        array('key' => 'app_title', 'name' => 'Application name', 'default' => env("APP_CODE", "SEVEN").' APP', 'type' => "text", "description" => 'The display name of the website.', 'validation' => "sometimes|max:255", 'module' => "all"),
        array('key' => 'slogen', 'name' => 'Slogen', 'default' => 'Something Clever', 'type' => "text", "description" => 'The text show in the header', 'validation' => "sometimes|max:255", 'module' => "all"),
        array('key' => 'hero', 'name' => 'Hero Bild', 'default' => 'hero.jpg', 'type' => "img", "description" => 'The image in the header', 'validation' => "sometimes|max:100", 'module' => "all"),
        array('key' => 'section1_h', 'name' => 'Section 1 Titel', 'default' => '<em>1</em> Responsiv Design', 'type' => "html", "description" => 'Section 1 Titel', 'validation' => "", 'module' => "landing-page"),
        array('key' => 'section1', 'name' => 'Section 2 Content', 'default' => 'Wir bereiten die Designs so, dass verschiedene Endgeräte ein entsprechendes Erlebnis bieten. <br /><br />', 'type' => "html", "description" => 'Section 2 Content', 'validation' => "", 'module' => "landing-page"),
        array('key' => 'foot', 'name' => 'Footer text', 'default' => 'I am at your feet', 'type' => "html", "description" => 'Footer Content', 'validation' => "", 'module' => "all"),
        array('key' => 'head', 'name' => 'Header info', 'default' => 'Pls dont hit me baby', 'type' => "html", "description" => 'Header Content', 'validation' => "", 'module' => "all"),
    ),

    'vogl'  => array(
        /* ANDERE BUILDING BLOCKS */
    ),

    'types' => array('img' => "Bild",
        'text'                 => "Einfacher Text",
        'html'                 => "Formatierte Inhalt",
    ),

);
