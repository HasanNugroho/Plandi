<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategori extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            [
                'kategori' => 'pot',
            ],
            [
                'kategori' => 'media tanam',
            ],
            [
                'kategori' => 'karpet',
            ],
            [
                'kategori' => 'dekorasi',
            ],
        ]);
    }
}
