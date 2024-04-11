<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agent_products extends Model
{
    protected $fillable = [
        'pid', // Add 'pid' to the fillable array
        // Add other fillable properties here if any
    ];
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Products::class, 'pid');
    }

    public function subproduct()
    {
        return $this->belongsTo(SubProducts::class, 'spid');
    }
}
