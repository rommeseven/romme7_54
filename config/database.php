<?php
$dburl = parse_url(getenv("DATABASE_URL"));

if (!$dburl['path'])
{
    $dburl["host"] = null;
    $dburl["user"] = null;
    $dburl["pass"] = null;
    $dburl["path"] = null;
}

$host     = $dburl["host"];
$username = $dburl["user"];
$password = $dburl["pass"];
$database = substr($dburl["path"], 1);

$tracker_dburl = parse_url(getenv("CLEARDB_DATABASE_URL"));

if (!$tracker_dburl['path'])
{
    $tracker_dburl["host"] = null;
    $tracker_dburl["user"] = null;
    $tracker_dburl["pass"] = null;
    $tracker_dburl["path"] = null;
}

$tracker_host     = $tracker_dburl["host"];
$tracker_username = $tracker_dburl["user"];
$tracker_password = $tracker_dburl["pass"];
$tracker_database = substr($tracker_dburl["path"], 1);
return array(

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
     */

    'default'     => env('DB_CONNECTION', 'pgsql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
     */

    'connections' => array(

        'sqlite'  => array(
            'driver'   => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix'   => '',
        ),

        'mysql'   => array(
            'driver'      => 'mysql',
            'host'        => env('DB_HOST', '127.0.0.1'),
            'port'        => env('DB_PORT', '3306'),
            'database'    => env('DB_DATABASE', 'forge'),
            'username'    => env('DB_USERNAME', 'forge'),
            'password'    => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => '',
            'strict'      => true,
            'engine'      => null,
        ),

        'tracker' => array(
            'driver'   => 'mysql',
            'host'     => $tracker_host,
            'database' => $tracker_database,
            'username' => $tracker_username,
            'password' => $tracker_password,
            'strict'   => false, // to avoid problems on some MySQL installs
        ),
        'pgsql'   => array(
            'driver'   => 'pgsql',
            'host'     => $host,
            'database' => $database,
            'username' => $username,
            'password' => $password,
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
            'sslmode'  => 'prefer',
        ),

        'sqlsrv'  => array(
            'driver'   => 'sqlsrv',
            'host'     => env('DB_HOST', 'localhost'),
            'port'     => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset'  => 'utf8',
            'prefix'   => '',
        ),

    ),

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
     */

    'migrations'  => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
     */

    'redis'       => array(

        'client'  => 'predis',

        'default' => array(
            'host'     => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port'     => env('REDIS_PORT', 6379),
            'database' => 0,
        ),

    ),

);
