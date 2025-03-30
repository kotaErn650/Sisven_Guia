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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('phone_number', 20)->nullable();
            $table->timestamp('Email_verificated_at')->nullable();
            $table->timestamps();

        });       

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schemas::dropIfExists('users');
    }
};
