<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrderTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			DB::table('orders')->insert([
				'buyer_id' => 1,
				'item_id' => $faker->numberBetween($min = 1, $max = 10),
			]);
		}
	}

}