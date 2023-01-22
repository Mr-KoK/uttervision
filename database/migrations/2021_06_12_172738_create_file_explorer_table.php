<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileExplorerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_explorer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('folder_id')->unsigned()->nullable();
            $table->bigInteger('admin_id')->unsigned();
            $table->text('img');
            $table->foreign('folder_id')->references('id')->on('folder_explorer')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('file_explorer');
    }
}