<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionGathiItem extends Model
{
    use HasFactory;

    protected $table = 'production_gathi_items';

    protected $fillable = [
        'production_card_id',
        'border_tar',
        'to_tar',
        'height_a',
        'height_b',
        'tar_qty_a',
        'tar_qty_b',
    ];

    public function productionCard()
    {
        return $this->belongsTo(ProductionCard::class, 'production_card_id');
    }

    //     $request->validate([
    //     // Header Info
    //     'firm_name' => 'nullable|string|max:255',
    //     'or_date' => 'nullable|date',
    //     'own_name' => 'nullable|string|max:255',
    //     'mo_no' => 'nullable|string|max:255',
    //     'address' => 'nullable|string',
    //     'bill_no' => 'nullable|string|max:255',
    //     'loom_no' => 'nullable|string|max:255',
    //     'chalan_no' => 'nullable|string|max:255',
    //     'del_date' => 'nullable|date',

    //     // Technical Specs
    //     'jala_no' => 'nullable|string|max:255',
    //     'f_reed' => 'nullable|string|max:255',
    //     'line' => 'nullable|string|max:255',
    //     'pcs' => 'nullable|string|max:255',
    //     'pattern_no' => 'nullable|string|max:255',
    //     'bharai' => 'nullable|string|max:255',
    //     'pana' => 'nullable|string|max:255',
    //     't_tar' => 'nullable|string|max:255',

    //     // Frame & Belt Specs
    //     'u_frame' => 'nullable|string|max:255',
    //     'size' => 'nullable|string|max:255',
    //     'l_frame' => 'nullable|string|max:255',
    //     'kaski' => 'nullable|string|max:255',
    //     'u_belt' => 'nullable|string|max:255',
    //     'l_belt' => 'nullable|string|max:255',
    //     'labour' => 'nullable|string|max:255',
    //     'mc_name' => 'nullable|string|max:255',

    //     // Hardware & Dori
    //     'spring' => 'nullable|string|max:255',
    //     'raj' => 'nullable|string|max:255',
    //     'patti' => 'nullable|string|max:255',
    //     'legpin' => 'nullable|string|max:255',
    //     'tube' => 'nullable|string|max:255',
    //     'total_pcs' => 'nullable|string|max:255',
    //     'dori_type' => 'nullable|string|max:255',
    //     'dori_cut_person' => 'nullable|string|max:255',
    //     'dori_kg' => 'nullable|string|max:255',

    //     // Personnel / Teams
    //     'jala_bharai_team' => 'nullable|string|max:255',
    //     'g_button_team' => 'nullable|string|max:255',
    //     'gathi_person' => 'nullable|string|max:255',
    //     'old_jala_khola_team' => 'nullable|string|max:255',
    //     'rs_set' => 'nullable|string|max:255',
    //     'tubeInner' => 'nullable|string|max:255',
    //     'kaccha_pakka_team' => 'nullable|string|max:255',
    //     'kaccha_pakka_date' => 'nullable|date',

    //     // Textareas
    //     'button_texna' => 'nullable|string',
    //     'guide_board_texna' => 'nullable|string',
    //     'remark' => 'nullable|string',

    //     // Checklist
    //     'checklist' => 'nullable|array',

    //     // Grand Total
    //     'grand_total' => 'nullable|numeric',

    //     // Gathi Items
    //     'gathi_items' => 'nullable|array',
    //     'gathi_items.*.border_tar' => 'nullable|string|max:255',
    //     'gathi_items.*.to_tar' => 'nullable|string|max:255',
    //     'gathi_items.*.height_a' => 'nullable|string|max:255',
    //     'gathi_items.*.height_b' => 'nullable|string|max:255',
    //     'gathi_items.*.tar_qty_a' => 'nullable|string|max:255',
    //     'gathi_items.*.tar_qty_b' => 'nullable|string|max:255',
    // ]);

}
