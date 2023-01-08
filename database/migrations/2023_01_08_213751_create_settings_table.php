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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('email');
            $table->string('admin_email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('currency');
            $table->boolean('cashout_day')->default(0);
            $table->boolean('referral_cashout_day')->default(0);
            $table->decimal('referral_worth');
            $table->decimal('welcome_bonus');
            $table->decimal('sponsored_post');
            $table->decimal('daily_login_bonus')->default(0.00);
            $table->decimal('withdrawal_charge')->default(0.00);
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
        Schema::dropIfExists('settings');
    }
};
