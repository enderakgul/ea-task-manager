<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $developers = [
            [
                'isim' => 'DEV1',
                'sure' => 1,
                'zorluk' => 1,
            ],
            [
                'isim' => 'DEV2',
                'sure' => 1,
                'zorluk' => 2,
            ],
            [
                'isim' => 'DEV3',
                'sure' => 1,
                'zorluk' => 3,
            ],
            [
                'isim' => 'DEV4',
                'sure' => 1,
                'zorluk' => 4,
            ],
            [
                'isim' => 'DEV5',
                'sure' => 1,
                'zorluk' => 5,
            ],
        ];

        DB::table('developers')->insert($developers);
    }
}
