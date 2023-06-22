<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'color',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
