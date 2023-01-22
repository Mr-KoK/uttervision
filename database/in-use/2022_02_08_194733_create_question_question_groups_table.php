<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionQuestionGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_question_groups', function (Blueprint $table) {
            $table->integer('question_id')->unsigned();

            $table->integer('questiongroup_id')->unsigned();

            $table->foreign('question_id')->references('id')->on('questions')

                ->onDelete('cascade');

            $table->foreign('questiongroup_id')->references('id')->on('question_groups')

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
        Schema::dropIfExists('question_question_groups');
    }
}
