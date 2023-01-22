<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepGroupDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_group_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->unsignedBigInteger('step_group_id');
            $table->foreign('step_group_id')->on('s_groups')->references('id')
                ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('step_group_documents');
    }
}
