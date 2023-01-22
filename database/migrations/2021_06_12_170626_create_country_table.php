<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->string('img');
            $table->string('cover_img_mobile')->nullable();
            $table->string('slug')->unique();
            $table->longText('content')->nullable();
            $table->string('cover_img')->nullable();
            $table->string('title',60);
            $table->string('meta_description',160 )->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('abstract',250)->nullable();
            $table->string('points_map')->nullable();
            $table->boolean('show_on_map')->default(0);
            $table->string('short_name')->nullable();
            $table->string('video')->nullable();
            $table->string('continent')->nullable();

            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null')->onUpdate('cascade');

            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('s_groups')->onDelete('set null')->onUpdate('cascade');

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
        Schema::dropIfExists('country');
    }
}