<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
    		'role_id' => 2,
    		'login' => 'tester',
    		'email' => 'tester@t.r',
    		'password' => bcrypt('testertester'),
		];


    	\DB::table('users')->insert($data);
    }
}
