<?php

namespace App\Console\Commands;
use Database\Seeders\kontak;
use Database\Seeders\users;
use Database\Seeders\kategori;
use Illuminate\Console\Command;

class refreshSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh database dan seeder';

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
     * @return int
     */
    public function handle()
    {
        $this->info('On progress...'); // info
        $this->info('Fresh & Migrate database');
        $this->call('migrate:fresh'); // call mihgate:fresh
        $this->info('Migrating done'); //info
        $this->info('Seeding user'); //info
        $this->call(users::class); // call  db seeder 
        $this->info('seeding user done'); //info
        $this->info('Seeding kontak'); //info
        $this->call(kontak::class); // call  db seeder 
        $this->info('seeding kontak done'); //info
        $this->info('Seeding kategori'); //info
        $this->call(kategori::class); // call  db seeder 
        $this->info('seeding kategori done'); //info
        $this->info('Seeding done'); //info
        $this->info('Success'); //info
    }
}
