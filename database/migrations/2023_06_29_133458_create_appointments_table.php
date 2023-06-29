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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default(0);
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('appoinmentDate');
            $table->unsignedBigInteger('doctorId');
            $table->string('phone');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('userId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
