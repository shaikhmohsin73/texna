<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('e_id')->constrained('employees')->onDelete('cascade');
            $table->decimal('lang', 10, 7); 
            $table->decimal('long', 10, 7);
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
