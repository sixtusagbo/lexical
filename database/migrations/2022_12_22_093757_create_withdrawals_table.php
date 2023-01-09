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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            // referral or task earnings respectively
            $table->string('type', 10);
            $table->decimal('amount', 10);
            $table->string('acc_name');
            $table->string('bank');
            $table->string('acc_num');
            $table->tinyInteger('status')->default(0)->comment('0=pending,1=successful,2=failed');
            $table->string('remark')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('withdrawals');
    }
};
