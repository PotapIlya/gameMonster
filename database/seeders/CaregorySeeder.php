<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CaregorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = [
        	'name' => 'Steam'
		];
		$data[] = [
			'name' => 'Uplay'
		];
		$data[] = [
			'name' => 'Origin'
		];
		$data[] = [
			'name' => 'Epic store'
		];


        \DB::table('categories')->insert($data);
    }
}
