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
        Schema::create('person_names', function (Blueprint $table) {
            $table->id();

            $table->string('first_name', 40);
            $table->string('last_name', 40);
            $table->string('patronymic', 40);
            $table->boolean('is_parent')->default(false);

            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('child_id')->nullable()->references('id')->on('person_names')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person_names');
    }
};
