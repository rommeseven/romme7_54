<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Settings;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:install';

    protected $appname;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds the database, and creates default users.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($app_name="Website Title")
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
        Settings::set('app_title',$this->appname);
    }
}