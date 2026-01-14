<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('marketings', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('naam')->nullable();
            $table->string('company_name')->nullable();
            $table->string('number')->nullable();
            $table->text('address')->nullable();
            $table->string('current_machine')->nullable();
            $table->string('new_machine')->nullable();
            $table->string('jala_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketings');
    }
};
