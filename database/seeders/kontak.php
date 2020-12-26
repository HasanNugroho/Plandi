<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kontak extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            [
                'kontak' => '62895421900858',
                'jenis_kontak' => 'whatsapp',
            ],
            [
                'kontak' => '62895421900858',
                'jenis_kontak' => 'sms',
            ],
            [
                'kontak' => '62895421900858',
                'jenis_kontak' => 'telephone',
            ],
        ]);
    }
}
