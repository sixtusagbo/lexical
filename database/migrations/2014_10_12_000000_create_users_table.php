<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->startingValue(4201);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number');
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->string('profile_image')->default('no_profile_image.png');
            $table->timestamp('last_login')->nullable();
            $table->timestamp('last_share_blog')->nullable();
            $table->decimal('task_earnings')->default(0);
            $table->decimal('referral_earnings')->default(0);
            $table->unsignedBigInteger('referrer_id')->nullable();
            $table->foreign('referrer_id')->references('id')->on('users');
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
};
