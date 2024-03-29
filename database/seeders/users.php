<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'role' => 'superadmin',
                'foto' => 'public/admins/profile1.jpg',
                'password' => Hash::make('12345678'),
            ]
        ]);

        Storage::deleteDirectory('public/admins');

        Storage::copy('public/asset/profile-default.jpg', 'public/admins/profile1.jpg');
    }
}
