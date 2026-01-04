<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyDetail extends Model
{
    use HasFactory;

    protected $table = 'party_details';

    protected $fillable = [
        'sr_no',
        'party_name',
        'address',
        'mobile_no'
    ];
}
