<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('production_cards', function (Blueprint $table) {
            $table->id();
            // Header Info
            $table->string('firm_name')->nullable();
            $table->date('or_date')->nullable();
            $table->string('own_name')->nullable();
            $table->string('mo_no')->nullable();
            $table->text('address')->nullable();
            $table->string('bill_no')->nullable();
            $table->string('loom_no')->nullable();
            $table->string('chalan_no')->nullable();
            $table->date('del_date')->nullable();

            // Technical Specs
            $table->string('jala_no')->nullable();
            $table->string('f_reed')->nullable();
            $table->string('line')->nullable();
            $table->string('pcs')->nullable();
            $table->string('pattern_no')->nullable();
            $table->string('bharai')->nullable();
            $table->string('pana')->nullable();
            $table->string('t_tar')->nullable();
            
            // Frame & Belt Specs
            $table->string('u_frame')->nullable();
            $table->string('size')->nullable();
            $table->string('l_frame')->nullable();
            $table->string('kaski')->nullable();
            $table->string('u_belt')->nullable();
            $table->string('l_belt')->nullable();
            $table->string('labour')->nullable();
            $table->string('mc_name')->nullable();

            // Hardware & Dori
            $table->string('spring')->nullable();
            $table->string('raj')->nullable();
            $table->string('patti')->nullable();
            $table->string('legpin')->nullable();
            $table->string('tube')->nullable();
            $table->string('total_pcs')->nullable();
            $table->string('dori_type')->nullable();
            $table->string('dori_cut_person')->nullable();
            $table->string('dori_kg')->nullable();

            // Personnel/Teams
            $table->string('jala_bharai_team')->nullable();
            $table->string('g_button_team')->nullable();
            $table->string('gathi_person')->nullable();
            $table->string('old_jala_khola_team')->nullable();
            $table->string('rs_set')->nullable();
            $table->string('tubeInner')->nullable();
            $table->string('kaccha_pakka_team')->nullable();
            $table->date('kaccha_pakka_date')->nullable();
            
            // Textareas
            $table->text('button_texna')->nullable();
            $table->text('guide_board_texna')->nullable();
            $table->text('remark')->nullable();

            // Checklist (Stored as JSON)
            $table->json('checklist')->nullable();

            $table->decimal('grand_total', 15, 2)->default(0);
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('production_cards');
    }
};
