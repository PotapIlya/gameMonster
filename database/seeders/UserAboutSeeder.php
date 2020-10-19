<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'user_id' => 1,
			'money' => 100,
		];

		\DB::table('user_abouts')->insert($data);
    }
}
