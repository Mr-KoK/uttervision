<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     *
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->string('country')->nullable();
            $table->string('email')->unique();

            $table->bigInteger('partner_id')->unsigned()->nullable();
            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade')->onUpdate('cascade');

            $table->string('password');
            $table->string('slug')->nullable();
            $table->string('bio')->nullable();
            $table->boolean('reset_pass')->nullable();
            $table->integer('type')->nullable();
            $table->integer('check_privacy')->default(0)->nullable();
            $table->string('username')->unique()->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->string('img')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('google_id')->nullable();
            $table->bigInteger('facebook_id')->nullable();
            $table->text('phone')->nullable();
            $table->string('pass_id',400)->nullable();
            $table->string('verify_code',400)->nullable();
            $table->boolean('is_active')->default('0')->nullable();
            $table->timestamp('premium_until')->nullable();
            $table->timestamp('date_to_active')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->timestamp('expire_passport')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}