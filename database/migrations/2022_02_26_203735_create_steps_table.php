<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description',200)->nullable();
            $table->integer('index')->nullable();
            $table->string('img')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->integer('position')->default(0)->nullable();

            $table->bigInteger('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('s_groups')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('steps');
    }
}
