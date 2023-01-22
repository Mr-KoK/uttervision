<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormItemRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_item_rows', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_item_id');
            $table->unsignedInteger('answer_id');
            $table->string('value')->nullable();
            $table->boolean('selected')->default(false)->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();

            $table->foreign('form_item_id')->references('id')->on('form_items')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('answer_id')->references('id')->on('answers')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_item_rows');
    }
}
