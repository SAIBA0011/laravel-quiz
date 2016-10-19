<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionOptionsTable extends Migration {

	public function up()
	{
		Schema::create('question_options', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->integer('question_id')->unsigned();
            $table->boolean('is_correct');
        });
	}

	public function down()
	{
		Schema::drop('question_options');
	}
}