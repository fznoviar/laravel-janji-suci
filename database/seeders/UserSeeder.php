<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private const TABLE = 'users';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(self::TABLE)->truncate();
        DB::table(self::TABLE)->insert(
            [
                'name'     => 'Admin',
                'email'    => 'admin@themesbrand.com',
                'password' => Hash::make('123456'),
            ]
        )
        ;
    }
}
