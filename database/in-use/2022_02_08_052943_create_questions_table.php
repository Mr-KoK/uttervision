<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',400);
            $table->string('text',500);
            $table->integer('index');
            $table->integer('type');
            $table->unsignedInteger('parent_id')->unsigned()->nullable();
            $table->unsignedInteger('step_id')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('questions')
                ->onDelete('set null');

            $table->foreign('step_id')->references('id')->on('steps')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
