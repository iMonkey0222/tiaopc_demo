<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		// $this->call('ItemTableSeeder');
		// $this->call('PriceTableSeeder');
		// $this->call('OrderTableSeeder');

		$this->call('SentrySeeder');
	}

}
