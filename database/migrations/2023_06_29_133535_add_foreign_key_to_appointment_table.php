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
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('userId')->references('id')->on('users')->constrained()->onUpdate('cascade');
            $table->foreign('doctorId')->references('id')->on('doctors')->constrained()->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign('appointment_user_id_foreign');
            $table->dropForeign('appointment_doctor_id_foreign');
        });
    }
};
