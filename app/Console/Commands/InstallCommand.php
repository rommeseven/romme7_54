<?php
namespace App\Console\Commands;

use App\Page;
use Settings;
use Illuminate\Console\Command;

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

        $this->info('cms: Created Users');

        // 2. Rollen erstellen
        $superadmin               = new \App\Role;
        $superadmin->name         = "superadmin";
        $superadmin->description  = "Der Superadmin hat alle Berechtigungen.";
        $superadmin->display_name = "Superadmin";
        $superadmin->save();

        $admin               = new \App\Role;
        $admin->name         = "admin";
        $admin->description  = "Der Admin hat die gleichen Berechtigungen, wie der Superadmin, nur Berechtigungen und Rollen löschen, ändern und erstellen kann er nicht.";
        $admin->display_name = "Admin";
        $admin->save();

        $supereditor               = new \App\Role;
        $supereditor->name         = "supereditor";
        $supereditor->description  = "Der Supereditor kann Seiten erstellen, Inhalte schreiben und Einstellungen vornehmen, allerdings hat er keinerlei Rechte im Bereich Berechtigungen und Rollen.";
        $supereditor->display_name = "Supereditor";
        $supereditor->save();

        $editor               = new \App\Role;
        $editor->name         = "editor";
        $editor->description  = "Der Editor hat die gleichen Berechtigungen, wie der Supereditor, aber er kann zusätzlich keine Einstellungen ändern.";
        $editor->display_name = "editor";
        $editor->save();

        $this->info('cms: Created Roles');

        $create_users               = new \App\Permission;
        $create_users->name         = 'create-users';
        $create_users->display_name = "Benutzer erstellen";
        $create_users->description  = "Das Recht Benutzer zu erstellen";
        $create_users->save();

        $update_users               = new \App\Permission;
        $update_users->name         = 'update-users';
        $update_users->display_name = "Benutzer ändern";
        $update_users->description  = "Das Recht Benutzer zu ändern";
        $update_users->save();

        $delete_users               = new \App\Permission;
        $delete_users->name         = 'delete-users';
        $delete_users->display_name = "Benutzer löschen";
        $delete_users->description  = "Das Recht Benutzer zu löschen";
        $delete_users->save();

        $read_users               = new \App\Permission;
        $read_users->name         = 'read-users';
        $read_users->display_name = "Chrisi macht display name";
        $read_users->description  = "Chrisi macht description";
        $read_users->save();

        $create_permissions               = new \App\Permission;
        $create_permissions->name         = 'create-permissions';
        $create_permissions->display_name = "Berechtigungen erstellen";
        $create_permissions->description  = "Das Recht Berechtigungen zu erstellen";
        $create_permissions->save();

        $give_permissions               = new \App\Permission;
        $give_permissions->name         = 'give-permissions';
        $give_permissions->display_name = "Berechtigungen vergeben";
        $give_permissions->description  = "Das Recht Berechtigungen zu vergeben";
        $give_permissions->save();

        $read_permissions               = new \App\Permission;
        $read_permissions->name         = 'read-permissions';
        $read_permissions->display_name = "Berechtigungen lesen";
        $read_permissions->description  = "Das Recht Berechtigungen zu lesen";
        $read_permissions->save();

        $delete_permissions               = new \App\Permission;
        $delete_permissions->name         = 'delete-permissions';
        $delete_permissions->display_name = "Berechtigungen löschen";
        $delete_permissions->description  = "Das Recht Berechtigungen zu löschen";
        $delete_permissions->save();

        $update_permissions               = new \App\Permission;
        $update_permissions->name         = 'update-permissions';
        $update_permissions->display_name = "Berechtigungen ändern";
        $update_permissions->description  = "Das Recht Berechtigungen zu verändern";
        $update_permissions->save();

        $create_pages               = new \App\Permission;
        $create_pages->name         = 'create-pages';
        $create_pages->display_name = "Seiten erstellen";
        $create_pages->description  = "Das Recht Seiten zu erstellen";
        $create_pages->save();

        $give_pages               = new \App\Permission;
        $give_pages->name         = 'give-pages';
        $give_pages->display_name = "Seiten vergeben"; //LACI: stimmt die Übersetzung?
        $give_pages->description  = "Das Recht Seiten zu vergeben";
        $give_pages->save();

        $read_pages               = new \App\Permission;
        $read_pages->name         = 'read-pages';
        $read_pages->display_name = "Seiten lesen";
        $read_pages->description  = "Das Recht Seiten zu lesen";
        $read_pages->save();

        $delete_pages               = new \App\Permission;
        $delete_pages->name         = 'delete-pages';
        $delete_pages->display_name = "Seiten löschen";
        $delete_pages->description  = "Das Recht Seiten zu löschen";
        $delete_pages->save();

        $update_pages               = new \App\Permission;
        $update_pages->name         = 'update-pages';
        $update_pages->display_name = "Seiten ändern";
        $update_pages->description  = "Das Recht Seiten zu verändern";
        $update_pages->save();

        $read_roles               = new \App\Permission;
        $read_roles->name         = 'read-roles';
        $read_roles->display_name = "Rollen lesen";
        $read_roles->description  = "Das Recht Rollen zu lesen";
        $read_roles->save();

        $delete_roles               = new \App\Permission;
        $delete_roles->name         = 'delete-roles';
        $delete_roles->display_name = "Rollen löschen";
        $delete_roles->description  = "Das Recht Rollen zu löschen";
        $delete_roles->save();

        $update_roles               = new \App\Permission;
        $update_roles->name         = 'update-roles';
        $update_roles->display_name = "Rollen ändern";
        $update_roles->description  = "Das Recht Rollen zu verändern";
        $update_roles->save();

        $update_settings               = new \App\Permission;
        $update_settings->name         = 'update-settings';
        $update_settings->display_name = "Einstellungen ändern";
        $update_settings->description  = "Das Recht Einstellungen zu verändern";
        $update_settings->save();

        $give_roles               = new \App\Permission;
        $give_roles->name         = 'give-roles';
        $give_roles->display_name = "Rollen vergeben";
        $give_roles->description  = "Das Recht Rollen zu vergeben";
        $give_roles->save();

        $create_roles               = new \App\Permission;
        $create_roles->name         = 'create-roles';
        $create_roles->display_name = "Rollen erstellen";
        $create_roles->description  = "Das Recht Rollen zu erstellen";
        $create_roles->save();

        $this->info('cms: Created Permissions');
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

        $this->info('cms: Create Auth connections');

        $bb          = collect(config("building_blocks"));
        $bb_keys     = $bb->pluck("key");
        $bb_defaults = $bb->pluck("default");
        for ($i = 0; $i < sizeof($bb_keys); $i++)
        {
            Settings::set($bb_keys[$i], $bb_defaults[$i]);
        }
        $this->info('cms: Initialized settings and building blocks');

        $landing_page = $this->choice('Art of Landing Page:', array('module', 'simple-page'), "simple-page");
        if ($landing_page == "module")
        {
            new Page(array('title' => "Willkommen!",
                'menutitle'       => "Start",
                'display_order'   => 1,
                'published'       => 1,
                'step'            => 7,
                'slug'            => "start",
                'module'          => "landing-page",

            ));

            $this->info('cms: Landing page generated');
        }
        else
        {
            $this->info('cms: Landing page must be created manually!');
        }
        $this->info('cms: Initialized settings and building blocks');
    }
}
