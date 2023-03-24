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
        Schema::create('open_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->boolean('status')->default(true);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('equipement_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ticket_category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('open_tickets');
    }
};
