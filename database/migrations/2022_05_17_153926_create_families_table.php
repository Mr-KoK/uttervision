<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('relation')->nullable();
            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->string('pass_id')->nullable();

            $table->integer('same_pass')->defualt(0)->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->string('img')->nullable();
            $table->timestamp('pass_expire_at')->nullable();
            $table->timestamp('birthday')->nullable();

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
        Schema::dropIfExists('families');
    }
}
