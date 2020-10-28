<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
        		'img' => 'lick/3d27f53ef7e68f011b2fd219736b6372.png',
				'href' => '/development',
			],
			[
				'img' => 'lick/c20274953d50ffd03d42a363ab62744c.png',
				'href' => '/development',
			],
			[
				'img' => 'lick/d7f1c80a6b650d1cab50a2ad3a0da860.png',
				'href' => '/development',
			],
		];

        \DB::table('licks')->insert($data);
    }
}
