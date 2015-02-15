<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ItemTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			DB::table('items')->insert([

				'title' => $faker->sentence($nbWords = 3),
				'description' => $faker->paragraph($nbSentences = 5),
				'seller_id' => 1,
				'product_condition' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10),

			]);
		}
	}

}