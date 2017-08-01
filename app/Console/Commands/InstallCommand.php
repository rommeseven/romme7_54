<?php
// REMEMBER: Chrisi todo
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Settings;


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

        $laci           = new \App\User;
        $laci->name     = 'László Takács';
        $laci->username = 'takl95';
        $laci->email    = "laszlo.takacs.95@gmail.com";
        $laci->password = bcrypt("admin"); // lass admin als pw; ich programiere später; dass es nach änderung fragt beim ersten einloggen
        $laci->save();

        $chrisi           = new \App\User;
        $chrisi->name     = 'Christan Neuherz';
        $chrisi->username = 'chrisii';
        $chrisi->email    = "christian.neuherz@gmail.com";
        $chrisi->password = bcrypt("admin"); // lass admin als pw; ich programiere später; dass es nach änderung fragt beim ersten einloggen
        $chrisi->save();

        $padmin           = new \App\User; // für den Chef; sollte superadmin rolle haben
        $padmin->name     = 'Der Chef';
        $padmin->username = 'superadmin';
        $padmin->email    = "chef@gmail.com";
        $padmin->password = bcrypt("admin"); // lass admin als pw; ich programiere später; dass es nach änderung fragt beim ersten einloggen
        $padmin->save();

        $person           = new \App\User; // für den Chef; sollta admin rolle haben (es ist für alltägliche gedacht; wenn ned sein muss; soll er ned als superadmin herumwirkeln... möglichkeit hat er aber)
        $person->name     = 'Der Chef';
        $person->username = 'admin';
        $person->email    = "chef@gmail.com";
        $person->password = bcrypt("admin"); // lass admin als pw, ich programiere später, dass es nach änderung fragt beim ersten einlogge;
        $person->save();

        // 2. Rollen erstellen
        $superadmin               = new \App\Role;
        $superadmin->name         = "superadmin";
        $superadmin->description  = "Chrisi macht description";
        $superadmin->display_name = "Superadmin";
        $superadmin->save();

        $admin               = new \App\Role;
        $admin->name         = "admin";
        $admin->description  = "Chrisi macht description";
        $admin->display_name = "Admin";
        $admin->save();

        $supereditor               = new \App\Role;
        $supereditor->name         = "supereditor";
        $supereditor->description  = "Chrisi macht description";
        $supereditor->display_name = "Supereditor";
        $supereditor->save();

        $editor               = new \App\Role;
        $editor->name         = "editor";
        $editor->description  = "Chrisi macht description";
        $editor->display_name = "editor";
        $editor->save();

        $create_users               = new \App\Permission;
        $create_users->name         = 'create_users'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $create_users->display_name = "Chrisi macht display name";
        $create_users->description  = "Chrisi macht description";
        $create_users->save();

        $update_users               = new \App\Permission;
        $update_users->name         = 'update_users'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $update_users->display_name = "Chrisi macht display name";
        $update_users->description  = "Chrisi macht description";
        $update_users->save();

        $delete_users               = new \App\Permission;
        $delete_users->name         = 'delete_users'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $delete_users->display_name = "Chrisi macht display name";
        $delete_users->description  = "Chrisi macht description";
        $delete_users->save();

        $read_users               = new \App\Permission;
        $read_users->name         = 'read_users'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $read_users->display_name = "Chrisi macht display name";
        $read_users->description  = "Chrisi macht description";
        $read_users->save();

        $create_permissions               = new \App\Permission;
        $create_permissions->name         = 'create_permissions'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $create_permissions->display_name = "Chrisi macht display name";
        $create_permissions->description  = "Chrisi macht description";
        $create_permissions->save();

        $give_permissions               = new \App\Permission;
        $give_permissions->name         = 'give_permissions'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $give_permissions->display_name = "Chrisi macht display name";
        $give_permissions->description  = "Chrisi macht description";
        $give_permissions->save();

        $read_permissions               = new \App\Permission;
        $read_permissions->name         = 'read_permissions'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $read_permissions->display_name = "Chrisi macht display name";
        $read_permissions->description  = "Chrisi macht description";
        $read_permissions->save();

        $delete_permissions               = new \App\Permission;
        $delete_permissions->name         = 'delete_permissions'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $delete_permissions->display_name = "Chrisi macht display name";
        $delete_permissions->description  = "Chrisi macht description";
        $delete_permissions->save();

        $update_permissions               = new \App\Permission;
        $update_permissions->name         = 'update_permissions'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $update_permissions->display_name = "Chrisi macht display name";
        $update_permissions->description  = "Chrisi macht description";
        $update_permissions->save();

        $create_pages               = new \App\Permission;
        $create_pages->name         = 'create_pages'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $create_pages->display_name = "Chrisi macht display name";
        $create_pages->description  = "Chrisi macht description";
        $create_pages->save();

        $give_pages               = new \App\Permission;
        $give_pages->name         = 'give_pages'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $give_pages->display_name = "Chrisi macht display name";
        $give_pages->description  = "Chrisi macht description";
        $give_pages->save();

        $read_pages               = new \App\Permission;
        $read_pages->name         = 'read_pages'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $read_pages->display_name = "Chrisi macht display name";
        $read_pages->description  = "Chrisi macht description";
        $read_pages->save();

        $delete_pages               = new \App\Permission;
        $delete_pages->name         = 'delete_pages'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $delete_pages->display_name = "Chrisi macht display name";
        $delete_pages->description  = "Chrisi macht description";
        $delete_pages->save();

        $update_pages               = new \App\Permission;
        $update_pages->name         = 'update_pages'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $update_pages->display_name = "Chrisi macht display name";
        $update_pages->description  = "Chrisi macht description";
        $update_pages->save();

        $read_roles               = new \App\Permission;
        $read_roles->name         = 'read_roles'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $read_roles->display_name = "Chrisi macht display name";
        $read_roles->description  = "Chrisi macht description";
        $read_roles->save();

        $delete_roles               = new \App\Permission;
        $delete_roles->name         = 'delete_roles'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $delete_roles->display_name = "Chrisi macht display name";
        $delete_roles->description  = "Chrisi macht description";
        $delete_roles->save();

        $update_roles               = new \App\Permission;
        $update_roles->name         = 'update_roles'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $update_roles->display_name = "Chrisi macht display name";
        $update_roles->description  = "Chrisi macht description";
        $update_roles->save();

        $update_settings               = new \App\Permission;
        $update_settings->name         = 'update_settings'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $update_settings->display_name = "Chrisi macht display name";
        $update_settings->description  = "Chrisi macht description";
        $update_settings->save();

        $give_roles               = new \App\Permission;
        $give_roles->name         = 'give_roles'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $give_roles->display_name = "Chrisi macht display name";
        $give_roles->description  = "Chrisi macht description";
        $give_roles->save();

        $create_roles               = new \App\Permission;
        $create_roles->name         = 'create_roles'; // Chrisi macht underline zum Bindestrich ( _  -> - )
        $create_roles->display_name = "Chrisi macht display name";
        $create_roles->description  = "Chrisi macht description";
        $create_roles->save();

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
        $superadmin->permissions()->save($create_pages);
        $superadmin->permissions()->save($update_pages);
        $superadmin->permissions()->save($delete_pages);
        $superadmin->permissions()->save($read_pages);
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
        $admin->permissions()->save($create_pages);
        $admin->permissions()->save($update_pages);
        $admin->permissions()->save($delete_pages);
        $admin->permissions()->save($read_pages);
        $admin->permissions()->save($update_settings);

        $supereditor->permissions()->save($create_pages);
        $supereditor->permissions()->save($update_pages);
        $supereditor->permissions()->save($delete_pages);
        $supereditor->permissions()->save($read_pages);
        $supereditor->permissions()->save($update_settings);

        $editor->permissions()->save($create_pages);
        $editor->permissions()->save($update_pages);
        $editor->permissions()->save($delete_pages);
        $editor->permissions()->save($read_pages);

        $laci->attachRole($superadmin);
        $chrisi->attachRole($superadmin);
        $person->attachRole($admin);
        $padmin->attachRole($superadmin);

    }
}
