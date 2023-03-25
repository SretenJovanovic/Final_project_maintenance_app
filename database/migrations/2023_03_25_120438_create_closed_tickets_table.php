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
        Schema::create('closed_tickets', function (Blueprint $table) {
            $table->id();
            $table->text('solution_description');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('open_ticket_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('closed_tickets');
    }
};
