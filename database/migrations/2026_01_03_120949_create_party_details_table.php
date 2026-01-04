<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('party_details', function (Blueprint $table) {
            $table->id();
            $table->integer('sr_no')->nullable();
            $table->string('party_name');
            $table->text('address')->nullable();
            $table->string('mobile_no', 15);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('party_details');
    }
};
