<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gathi extends Model
{
    use HasFactory;

    protected $table = 'gathi';

    protected $fillable = [
        'production_card_id',
        'gathi_person',
        'no',
        'no_of_gat',
    ];

    
    public function productionCard()
    {
        return $this->belongsTo(ProductionCard::class);
    }
}
