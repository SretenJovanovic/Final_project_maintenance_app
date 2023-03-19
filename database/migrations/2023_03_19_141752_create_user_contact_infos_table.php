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
        Schema::create('user_contact_infos', function (Blueprint $table) {
            $table->id();
            $table->string('adress');
            $table->string('city');
            $table->string('phone');
            $table->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_contact_infos');
    }
};
