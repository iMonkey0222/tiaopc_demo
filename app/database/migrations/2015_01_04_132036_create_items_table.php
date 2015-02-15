<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('seller_id');
			$table->string('title', 100);
			$table->tinyInteger('category_id');
			$table->tinyInteger('product_condition');
			$table->tinyInteger('order_status');  // Sold or unsold
			$table->tinyInteger('status'); // 1 for show, 2 for hide(delete), 3 for froze
			$table->text('description')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('items');
	}

}
