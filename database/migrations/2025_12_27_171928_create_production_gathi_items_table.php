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
        Schema::create('production_gathi_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_card_id')->constrained()->onDelete('cascade');
            $table->string('border_tar')->nullable();
            $table->string('to_tar')->nullable();
            $table->string('height_a')->nullable(); 
            $table->string('height_b')->nullable(); 
            $table->string('tar_qty_a')->nullable(); 
            $table->string('tar_qty_b')->nullable(); 
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('production_gathi_items');
    }
};
