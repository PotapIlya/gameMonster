<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NavSeeder extends Seeder
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
				'name' => 'Товары',
				'url' => '/development'
			],
			[
				'name' => 'Рулетка',
				'url' => '/development'
			],
			[
				'name' => 'Акции',
				'url' => '/development'
			],
			[
				'name' => 'Гарантии',
				'url' => '/development'
			],
			[
				'name' => 'Контакты',
				'url' => '/development'
			],
			[
				'name' => 'Аренда аккаунтов',
				'url' => '/development'
			],

		];

		\DB::table('navs')->insert($data);
    }
}
