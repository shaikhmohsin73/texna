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
