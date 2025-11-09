<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            $table->string('qr_code');

            $table->bigInteger('phone_id');
            $table->bigInteger('address_id');
            $table->bigInteger('marathon_id');

            $table->foreign('phone_id')->references('id')->on('phones');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('marathon_id')->references('id')->on('marathons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
