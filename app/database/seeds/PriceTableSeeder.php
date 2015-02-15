<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PriceTableSeeder extends Seeder {


	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{

			DB::table('price')->insert([
				'item_id' => $faker->numberBetween($min = 1, $max = 10),
				'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 50),
			]);
		}
	}

}