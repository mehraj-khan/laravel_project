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
        Schema::create('appoinments', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('doctor_id');
            $table->string('name')->require;
            $table->string('phone')->require;
            $table->string('select_doctor')->require;
            $table->string('gender')->require;
            $table->string('date')->require;
            $table->string('user_id')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'canceled']);
            $table->timestamps();

            // $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoinments');
    }
};
