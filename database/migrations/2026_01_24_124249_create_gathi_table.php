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
        Schema::create('gathi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_card_id')
                  ->constrained('production_cards')
                  ->onDelete('cascade'); // optional, agar related production card delete ho to
            $table->string('gathi_person');
            $table->integer('no')->nullable();
            $table->integer('no_of_gat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gathi');
    }
};
