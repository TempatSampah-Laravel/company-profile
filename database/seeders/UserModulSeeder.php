<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserModulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_moduls')->insert([
            [
                'role_id' => '1',
                'modul_id' => '1',
                'view' => '1',
                'input' => '1',
                'update' => '1',
                'delete' => '1',
                'posting' => '0',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'role_id' => '1',
                'modul_id' => '2',
                'view' => '1',
                'input' => '1',
                'update' => '1',
                'delete' => '1',
                'posting' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ]);
    }
}
