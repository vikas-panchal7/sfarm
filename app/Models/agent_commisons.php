<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agent_commisons extends Model
{
    protected $fillable = [
        'agid', // Add 'agid' to the fillable array
        'commission',
    ];
    use HasFactory;
}
