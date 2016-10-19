<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->integer('position');
            $table->integer('quiz_id')->unsigned();
            $table->enum('type', ['single', 'multiple']);
        });
	}

	public function down()
	{
		Schema::drop('questions');
	}
}