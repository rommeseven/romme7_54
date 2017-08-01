<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Settings;
use \App\Permission;
use \App\Role;
use \App\User;
// TODO: use class from other namespace laravel @internet

class InstallCommand extends Command
{
    protected $appname;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds the database, and creates default users.';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:install';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($app_name = "Website Title")
    {
        parent::__construct();
        $this->appname = $app_name;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Settings::set('app_title', $this->appname);
        // 1. User Erstellen

        $laci = new App\User(
            array(
                'name'     => 'laci',
                'email'    => "email@email.com",
                'password' => bcrypt("admin"), // lass admin als pw, ich programiere später, dass es nach änderung fragt beim ersten einloggen
            )
        );
        $chrisi = new App\User(
            array(
                'name'     => 'chrisii',
                'email'    => "email@email.com",
                'password' => bcrypt("admin"), // lass admin als pw, ich programiere später, dass es nach änderung fragt beim ersten einloggen
            )
        );
        $admin = new App\User( // für den Chef, sollte superadmin rolle haben
            array(
                'name'     => 'admin',
                'email'    => "email@email.com",
                'password' => bcrypt("admin"), // lass admin als pw, ich programiere später, dass es nach änderung fragt beim ersten einloggen
            )
        );
        $person = new App\User( // für den Chef, sollta admin rolle haben (es ist für alltägliche gedacht, wenn ned sein muss, soll er ned als superadmin herumwirkeln... möglichkeit hat er aber)
            array(
                'name'     => 'person',
                'email'    => "email@email.com",
                'password' => bcrypt("admin"), // lass admin als pw, ich programiere später, dass es nach änderung fragt beim ersten einloggen
            )
        );

        // 2. Rollen erstellen
        $superadmin = new App\Role(
            array(
                'name'         => 'superadmin', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $admin = new App\Role(
            array(
                'name'         => 'admin', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $supereditor = new App\Role(
            array(
                'name'         => 'supereditor', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $editor = new App\Role(
            array(
                'name'         => 'editor', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        // 3. Berechtigungen erstellen
        $create_users = new App\Permission(
            array(
                'name'         => 'create-users', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $update_users = new App\Permission(
            array(
                'name'         => 'update-users', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $delete_users = new App\Permission(
            array(
                'name'         => 'delete-users', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $read_users = new App\Permission(
            array(
                'name'         => 'delete-users', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $create_permissions = new App\Permission(
            array(
                'name'         => 'create-permissions', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $give_permissions = new App\Permission(
            array(
                'name'         => 'give-permissions', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $update_permissions = new App\Permission(
            array(
                'name'         => 'update-permissions', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $delete_permissions = new App\Permission(
            array(
                'name'         => 'delete-permissions', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $read_permissions = new App\Permission(
            array(
                'name'         => 'delete-permissions', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $create_roles = new App\Permission(
            array(
                'name'         => 'create-roles', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $give_roles = new App\Permission(
            array(
                'name'         => 'give-roles', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $update_roles = new App\Permission(
            array(
                'name'         => 'update-roles', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $delete_roles = new App\Permission(
            array(
                'name'         => 'delete-roles', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $read_roles = new App\Permission(
            array(
                'name'         => 'delete-roles', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $create_sites = new App\Permission(
            array(
                'name'         => 'create-sites', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $update_sites = new App\Permission(
            array(
                'name'         => 'update-sites', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $delete_sites = new App\Permission(
            array(
                'name'         => 'delete-sites', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $read_sites = new App\Permission(
            array(
                'name'         => 'delete-sites', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $create_content = new App\Permission(
            array(
                'name'         => 'create-content', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $update_content = new App\Permission(
            array(
                'name'         => 'update-content', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $delete_content = new App\Permission(
            array(
                'name'         => 'delete-content', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $read_content = new App\Permission(
            array(
                'name'         => 'delete-content', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

        $update_settings = new App\Permission(
            array(
                'name'         => 'update-settings', // name = slug
                'display_name' => "email@email.com",
                'description'  => 'text was ich halt herschreibe',
            )
        );

// Rollen berechtigungen geben (für jede einzelne eine zeile)
        $superadmin->permissions()->save($create_users); // superadmin recht geben zu ...
        $superadmin->permissions()->save($update_users);
        $superadmin->permissions()->save($delete_users);
        $superadmin->permissions()->save($read_users);
        $superadmin->permissions()->save($create_permissions);
        $superadmin->permissions()->save($give_permissions);
        $superadmin->permissions()->save($update_permissions);
        $superadmin->permissions()->save($delete_permissions);
        $superadmin->permissions()->save($read_permissions);
        $superadmin->permissions()->save($create_roles);
        $superadmin->permissions()->save($give_roles);
        $superadmin->permissions()->save($update_roles);
        $superadmin->permissions()->save($delete_roles);
        $superadmin->permissions()->save($read_roles);
        $superadmin->permissions()->save($create_sites);
        $superadmin->permissions()->save($update_sites);
        $superadmin->permissions()->save($delete_sites);
        $superadmin->permissions()->save($read_sites);
        $superadmin->permissions()->save($create_content);
        $superadmin->permissions()->save($update_content);
        $superadmin->permissions()->save($delete_content);
        $superadmin->permissions()->save($read_content);
        $superadmin->permissions()->save($update_settings);

        $admin->permissions()->save($create_users); // superadmin recht geben zu ...
        $admin->permissions()->save($update_users);
        $admin->permissions()->save($delete_users);
        $admin->permissions()->save($read_users);
        $admin->permissions()->save($give_permissions);
        $admin->permissions()->save($delete_permissions);
        $admin->permissions()->save($create_roles);
        $admin->permissions()->save($give_roles);
        $admin->permissions()->save($update_roles);
        $admin->permissions()->save($delete_roles);
        $admin->permissions()->save($read_roles);
        $admin->permissions()->save($create_sites);
        $admin->permissions()->save($update_sites);
        $admin->permissions()->save($delete_sites);
        $admin->permissions()->save($read_sites);
        $admin->permissions()->save($create_content);
        $admin->permissions()->save($update_content);
        $admin->permissions()->save($delete_content);
        $admin->permissions()->save($read_content);
        $admin->permissions()->save($update_settings);

        $supereditor->permissions()->save($create_sites);
        $supereditor->permissions()->save($update_sites);
        $supereditor->permissions()->save($delete_sites);
        $supereditor->permissions()->save($read_sites);
        $supereditor->permissions()->save($create_content);
        $supereditor->permissions()->save($update_content);
        $supereditor->permissions()->save($delete_content);
        $supereditor->permissions()->save($read_content);
        $supereditor->permissions()->save($update_settings);

        $editor->permissions()->save($create_sites);
        $editor->permissions()->save($update_sites);
        $editor->permissions()->save($delete_sites);
        $editor->permissions()->save($read_sites);
        $editor->permissions()->save($create_content);
        $editor->permissions()->save($update_content);
        $editor->permissions()->save($delete_content);
        $editor->permissions()->save($read_content);

    }
}
