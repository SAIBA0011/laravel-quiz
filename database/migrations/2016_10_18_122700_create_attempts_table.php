<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttemptsTable extends Migration {

	public function up()
	{
		Schema::create('attempts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('quiz_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->boolean('passed');
			$table->integer('percentage');
		});
	}

	public function down()
	{
		Schema::drop('attempts');
	}
}