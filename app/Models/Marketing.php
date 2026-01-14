<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'naam',
        'company_name',
        'number',
        'address',
        'current_machine',
        'new_machine',
        'jala_type',
        'image_name',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
