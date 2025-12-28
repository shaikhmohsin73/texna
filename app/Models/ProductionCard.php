<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionCard extends Model
{
    use HasFactory;

    protected $table = 'production_cards';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        // Header Info
        'firm_name',
        'or_date',
        'own_name',
        'mo_no',
        'address',
        'bill_no',
        'loom_no',
        'chalan_no',
        'del_date',

        // Technical Specs
        'jala_no',
        'f_reed',
        'line',
        'pcs',
        'pattern_no',
        'bharai',
        'pana',
        't_tar',

        // Frame & Belt Specs
        'u_frame',
        'size',
        'l_frame',
        'kaski',
        'u_belt',
        'l_belt',
        'labour',
        'mc_name',

        // Hardware & Dori
        'spring',
        'raj',
        'patti',
        'legpin',
        'tube',
        'total_pcs',
        'dori_type',
        'dori_cut_person',
        'dori_kg',

        // Personnel/Teams
        'jala_bharai_team',
        'g_button_team',
        'gathi_person',
        'old_jala_khola_team',
        'rs_set',
        'tubeInner',
        'kaccha_pakka_team',
        'kaccha_pakka_date',

        // Textareas
        'button_texna',
        'guide_board_texna',
        'remark',

        // Checklist
        'checklist',

        // Total
        'grand_total',
    ];

    
    protected $casts = [
        'or_date' => 'date',
        'del_date' => 'date',
        'kaccha_pakka_date' => 'date',
        'checklist' => 'array',
        'grand_total' => 'decimal:2',
    ];

    public function items()
    {
        return $this->hasMany(ProductionGathiItem::class, 'production_card_id');
    }
}
