<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizzesTable extends Migration {

	public function up()
	{
		Schema::create('quizzes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
		});
	}

	public function down()
	{
		Schema::drop('quizzes');
	}
}