<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionCard extends Model
{
    use HasFactory;

    protected $table = 'production_cards';

    protected $fillable = [
        'firm_name',
        'or_date',
        'own_name',
        'mo_no',
        'address',
        'bill_no',
        'loom_no',
        'chalan_no',
        'del_date',
        'jala_no',
        'f_reed',
        'line',
        'pcs',
        'pattern_no',
        'pattern_File',
        'bharai',
        'pana',
        't_tar',
        'u_frame',
        'size',
        'l_frame',
        'kaski',
        'u_belt',
        'l_belt',
        'labour',
        'mc_name',
        'spring',
        'raj',
        'patti',
        'legpin',
        'tube',
        'total_pcs',
        'dori_type',
        'dori_cut_person',
        'dori_kg',
        'jala_bharai_team',
        'g_button_team',
        'gathi_person',
        'old_jala_khola_team',
        'rs_set',
        'tubeInner',
        'springInner',
        'raj_inner',
        'kaccha_pakka_team',
        'kaccha_pakka_date',
        'button_texna',
        'guide_board_texna',
        'remark',
        'checklist',
        'grand_total',
        'status',
        'dori_type_dropdown',
        'meter',
        'br_tar',
        'new_tar',
        'total_tar_new',
        'kg_1',
        'kg_2',
        'total_kg',
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
