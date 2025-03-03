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
        // Drop tables in reverse order of their dependencies
        // Schema::dropIfExists('tickets');
        // Schema::dropIfExists('navettes');
        // Schema::dropIfExists('companies');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration is for dropping tables, so no action needed to reverse it
        // The tables will be recreated by their respective create migrations
    }
};
