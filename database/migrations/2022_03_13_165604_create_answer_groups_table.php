<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('index')->default(0);
            $table->integer('type')->default(0);
            $table->boolean('check_input')->default(false);
            $table->unsignedInteger('question_id');
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_groups');
    }
}
