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
    		'name' => 'tester',
    		'email' => 'tester@t.r',
    		'password' => 'testertester',
		];


    	\DB::table('users')->insert($data);
    }
}
