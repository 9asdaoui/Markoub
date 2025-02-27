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
        Schema::create('navettes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('departure_city');
            $table->string('arrival_city');
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->integer('seats_total');
            $table->integer('seats_booked')->default(0);
            $table->text('description')->nullable();
            $table->enum('status', ['available', 'full', 'cancelled'])->default('available');            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navettes');
    }
};
