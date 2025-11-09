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
        Schema::create('users', function (Blueprint $table) {
            $table->id();


            $table->string('email')->unique();
            $table->string('password');
            $table->date('birthday');
            $table->integer('level');

            $table->bigInteger('municipal_id');
            $table->bigInteger('school_id');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('municipal_id')->references('id')->on('municipals');
            $table->foreign('school_id')->references('id')->on('schools');

            $table->index('municipal_id');
            $table->index('school_id');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
