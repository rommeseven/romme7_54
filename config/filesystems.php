<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. A "local" driver, as well as a variety of cloud
    | based drivers are available for your choosing. Just store away!
    |
    | Supported: "local", "ftp", "s3", "rackspace", "null", "azure", "copy",
    |            "dropbox", "gridfs", "memory", "phpcr", "replicate", "sftp",
    |            "vfs", "webdav", "zip", "bos", "cloudinary", "eloquent",
    |            "fallback", "github", "gdrive", "google", "mirror", "onedrive",
    |            "oss", "qiniu", "redis", "runabove", "sae", "smb", "temp"
    |
     */

    'default'  => env('FILE_DRIVER', 'dropbox'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
     */

    'cloud'    => 's3',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
     */

    'disks'    => array(

        'local'            => array(
            'driver'     => 'dropbox',
            'app_secret' => env('DROPBOX_APP_SECRET'),
            'token'      => env('DROPBOX_TOKEN'),


        ),
        'dev'            => array(
            'driver' => 'local',
            'root'   => storage_path('app'),

            // Optional cache settings, available with any storage driver
            'cache'  => array(
                'driver' => 'laravel',
            ),

            // Optional Local Settings...
            // 'permissions' => [],
        ),

        'ftp'              => array(
            'driver'   => 'ftp',
            'host'     => 'ftp.example.com',
            'username' => 'your-username',
            'password' => 'your-password',

            // Optional FTP Settings...
            // 'port'     => 21,
            // 'root'     => '',
            // 'passive'  => true,
            // 'ssl'      => true,
            // 'timeout'  => 30,
        ),

        's3'               => array(
            'driver' => 's3',
            'key'    => 'your-key',
            'secret' => 'your-secret',
            'region' => 'your-region',
            'bucket' => 'your-bucket',

            // Optional S3 Settings...
            // 'root'   => '',
        ),

        'rackspace'        => array(
            'driver'    => 'rackspace',
            'endpoint'  => 'https://identity.api.rackspacecloud.com/v2.0/',
            'username'  => 'your-username',
            'key'       => 'your-key',
            'region'    => 'IAD',
            'url_type'  => 'publicURL',
            'container' => 'your-container',
        ),

        'null'             => array(
            'driver' => 'null',
        ),

        'azure'            => array(
            'driver'      => 'azure',
            'accountName' => 'your-account-name',
            'apiKey'      => 'your-api-key',
            'container'   => 'your-container',
        ),

        'copy'             => array(
            'driver'         => 'copy',
            'consumerKey'    => 'your-consumer-key',
            'consumerSecret' => 'your-consumer-secret',
            'accessToken'    => 'your-access-token',
            'tokenSecret'    => 'your-token-secret',
        ),

        'dropbox'          => array(
            'driver'     => 'dropbox',
            'app_secret' => env('DROPBOX_APP_SECRET'),
            'token'      => env('DROPBOX_TOKEN'),
        ),

/*        'dropbox' => [
'driver'           => 'dropbox',
'accessToken'      => 'your-access-token',
'clientIdentifier' => 'your-client-identifier',
],*/

        'gridfs'           => array(
            'driver'  => 'gridfs',
            'server'  => 'your-server',
            'context' => 'your-context',
            'dbName'  => 'your-db-name',

            // You can also provide other MongoDB connection options here
        ),

        'memory'           => array(
            'driver' => 'memory',
        ),

        'phpcr-jackrabbit' => array(
            'driver'         => 'phpcr',
            'jackrabbit_url' => 'your-jackrabbit-url',
            'workspace'      => 'your-workspace',
            'root'           => 'your-root',

            // Optional PHPCR Settings
            // 'userId'         => 'your-user-id',
            // 'password'       => 'your-password',
        ),

        'phpcr-dbal'       => array(
            'driver'    => 'phpcr',
            'database'  => 'mysql',
            'workspace' => 'your-workspace',
            'root'      => 'your-root',

            // Optional PHPCR Settings
            // 'userId'    => 'your-user-id',
            // 'password'  => 'your-password',
        ),

        'phpcr-prismic'    => array(
            'driver'      => 'phpcr',
            'prismic_uri' => 'your-prismic-uri',
            'workspace'   => 'your-workspace',
            'root'        => 'your-root',

            // Optional PHPCR Settings
            // 'userId'      => 'your-user-id',
            // 'password'    => 'your-password',
        ),

        'replicate'        => array(
            'driver'  => 'replicate',
            'master'  => 'local',
            'replica' => 's3',
        ),

        'sftp'             => array(
            'driver'   => 'sftp',
            'host'     => 'sftp.example.com',
            'username' => 'username',
            'password' => 'password',

            // Optional SFTP Settings
            // 'privateKey'    => 'path/to/or/contents/of/privatekey',
            // 'port'          => 22,
            // 'root'          => '/path/to/root',
            // 'timeout'       => 30,
            // 'directoryPerm' => 0755,
            // 'permPublic'    => 0644,
            // 'permPrivate'   => 0600,
        ),

        'vfs'              => array(
            'driver' => 'vfs',
        ),

        'webdav'           => array(
            'driver'  => 'webdav',
            'baseUri' => 'http://example.org/dav/',

            // Optional WebDAV Settings
            // 'userName' => 'user',
            // 'password' => 'password',
            // 'proxy'    => 'locahost:8888',
            // 'authType' => 'digest',  // alternately 'ntlm' or 'basic'
            // 'encoding' => 'all',     // same as ['deflate', 'gzip', 'identity']
        ),

        'zip'              => array(
            'driver' => 'zip',
            'path'   => 'local://path/to/file.zip',
        ),

        'bos'              => array(
            'driver'      => 'bos',
            'credentials' => array(
                'ak' => 'your-access-key-id',
                'sk' => 'your-secret-access-key',
            ),
            'bucket'      => 'your-bucket',

            // Optional BOS Setting
            // 'endpoint'    => 'http://bj.bcebos.com',
        ),

        'cloudinary'       => array(
            'driver'     => 'cloudinary',
            'api_key'    => env('CLOUDINARY_API_KEY'),
            'api_secret' => env('CLOUDINARY_API_SECRET'),
            'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
        ),

        'eloquent'         => array(
            'driver' => 'eloquent',

            // Optional Eloquent Setting
            // 'model'  => '\Rokde\Flysystem\Adapter\Model\FileModel',
        ),

        'fallback'         => array(
            'driver'   => 'fallback',
            'main'     => 'local',
            'fallback' => 's3',
        ),

        'github'           => array(
            'driver'  => 'github',
            'project' => 'yourname/project',
            'token'   => 'your-github-token',
        ),

        'gdrive'           => array(
            'driver'    => 'gdrive',
            'client_id' => 'your-client-id',
            'secret'    => 'your-secret',
            'token'     => 'your-token',
        ),

        'google'           => array(
            'driver'        => 'google',
            'account'       => 'your-account',
            'secret'        => 'your-secret',
            'developer_key' => 'your-developer-key',
            'p12_file'      => 'local://path/to/file.p12',
            'bucket'        => 'your-bucket',
        ),

        'mirror'           => array(
            'driver' => 'mirror',
            'disks'  => array('local', 's3', 'zip'),
        ),

        'onedrive'         => array(
            'driver'       => 'onedrive',
            'access_token' => 'your-access-token',

            // Options only needed for ignited/flysystem-onedrive
            // 'base_url'     => 'https://api.onedrive.com/v1.0/',
            // 'use_logger'   => false,
        ),

        'oss'              => array(
            'driver'     => 'oss',
            'access_id'  => 'your-access-id',
            'access_key' => 'your-access-key',
            'bucket'     => 'your-bucket',

            // Optional OSS Settings
            // 'endpoint'   => '',
            // 'prefix'     => '',
            // 'region'     => '',    // One of 'hangzhou', 'qingdao', 'beijing', 'hongkong',
            //                        // 'shenzhen', 'shanghai', 'west-1' and 'southeast-1'
        ),

        'qiniu'            => array(
            'driver'    => 'qiniu',
            'accessKey' => 'your-access-key',
            'secretKey' => 'your-secret-key',
            'bucket'    => 'your-bucket',

            // Optional Qiniu Settings
            // 'domain'    => '',
        ),

        'redis'            => array(
            'driver'     => 'redis',
            'connection' => 'default',
        ),

        'runabove'         => array(
            'driver'   => 'runabove',
            'username' => 'your-username',
            'password' => 'your-password',
            'tenantId' => 'your-tenantId',

            // Optional Runabove Settings
            // 'container' => 'container',
            // 'region'    => 'SBG1',   // One of 'SBG1', 'BHS1' and 'GRA1'
        ),

        'sae'              => array(
            'driver' => 'sae',
        ),

        'smb'              => array(
            'driver'   => 'smb',
            'host'     => 'smb.example.com',
            'username' => 'your-username',
            'password' => 'your-password',
            'path'     => 'path/to/shared/directory/for/root',
        ),

        'temp'             => array(
            'driver' => 'temp',

            // Optional TempDir Settings
            // 'prefix'  => '',
            // 'tempdir' => '/tmp',
        ),

    ),

    /*
    |--------------------------------------------------------------------------
    | Automatically Register Stream Wrappers
    |--------------------------------------------------------------------------
    |
    | This is a list of the filesystem "disks" to automatically register the
    | stream wrappers for on application start.  Any "disk" you don't want to
    | register on every application load will have to be manually referenced
    | before attempting stream access, as the stream wrapper is otherwise only
    | registered when used.
    |
     */

    'autowrap' => array(

        'local',

    ),

);
