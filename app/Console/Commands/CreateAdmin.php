<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'role' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        echo "Admin created!\n";
    }
}
