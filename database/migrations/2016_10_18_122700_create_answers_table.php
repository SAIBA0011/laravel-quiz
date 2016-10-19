<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswersTable extends Migration {

	public function up()
	{
		Schema::create('answers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('attempt_id')->unsigned();
			$table->integer('question_id')->unsigned();
			$table->integer('option_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('answers');
	}
}