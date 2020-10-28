<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProposalSeeder extends Seeder
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
				'img' => 'proposal/f5b7f3108d0a09a433e542579ceeff8e.png',
				'mobile_img' => 'proposal/2ac9dc9c5c71f7292fa7a64ab8a0f434.png',
			],
			[
				'img' => 'proposal/02d03ff4736281a657d764e871ecade2.png',
				'mobile_img' => 'proposal/33b6ea2f7636e430ec40c4b4c1d9684c.png',
			],
			[
				'img' => 'proposal/e16a2a40c2e032fbafefe7daedd63431.png',
				'mobile_img' => 'proposal/7c8ff7a4cb0034918f0b27a174d15e55.png',
			],
		];

			\DB::table('proposals')->insert($data);
    }
}
