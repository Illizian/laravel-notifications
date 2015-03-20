<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Notifications', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('from_user_id')->unsigned()->index();
			$table->integer('to_user_id')->unsigned()->index();

			$table->string('message');
			$table->string('url');
			$table->boolean('read')->default(false);

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
		Schema::drop('Notifications');
	}

}
