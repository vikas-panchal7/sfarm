<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesBill extends Model
{
    use HasFactory;
    protected $fillable = ['agent_id', 'farmer_id', 'commission', 'bill_amount', 'total_amount'];

    // Define relationships
    public function agent()
    {
        return $this->belongsTo(Register::class, 'agent_id');
    }

    public function farmer()
    {
        return $this->belongsTo(Register::class, 'farmer_id');
    }
}
