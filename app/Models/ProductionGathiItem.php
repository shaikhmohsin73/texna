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
        'gathi_types_a',
        'gathi_types_b',
        'height_a',
        'height_b',
        'tar_qty_a',
        'tar_qty_b',
    ];

    public function productionCard()
    {
        return $this->belongsTo(ProductionCard::class, 'production_card_id');
    }

}



// bhai ek kaam karna hai 
// <div class="dori-row-item">
//                     <label>TOTAL TAR</label>
//                     <input type="text" name="total_tar_new" id="total_tar_new" readonly>
//                 </div> isko multi* karna hai 2 bar ek bar karna hai
//   <div class="math-box">
//                                 <div class="math-line">
//                                     <span class="symbol">*</span>
//                                     <input type="text" id="mul1_a_1" name="gathi_items[0][gathi_types_a]">
//                                 </div>
//                                 <div class="math-line">
//                                     <span class="symbol">*</span>
//                                     <input type="text" id="mul1_b_1" name="gathi_items[0][gathi_types_b]">
//                                 </div>
//                             </div> in dono ki value se  jo value aayegi dono ki usko divid karna hai 39.37 se 
// fir isko divid karna hai 
// <div class="dori-row-item">
//                     <label>METER'S</label>
//                     <input type="text" name="meter" id="meter" readonly>
//                 </div> iski value se  fir dono ka answer jo aaayega 
// mann lo agar apne 