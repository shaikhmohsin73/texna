<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['e_id', 'lang', 'long'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'e_id');
    }
}
