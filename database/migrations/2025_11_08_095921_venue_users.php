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
        Schema::create('venue_users', function (Blueprint $table) {
            $table->id();

            $table->date('visited_date')->nullable();
            $table->integer('scores');
            $table->boolean('send_certificate')->default(false);
            $table->bigInteger('venue_id');
            $table->bigInteger('user_id');

            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venue_users');
    }
};
