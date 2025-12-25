<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'mobile_no',
        'photo',
        'role',
        'status',
    ];

    public function locations()
    {
        return $this->hasMany(Location::class, 'e_id');
    }
}
