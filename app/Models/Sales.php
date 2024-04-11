<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = ['sale_bill_id','price', 'sproduct_id', 'quantity', 'total_amount'];

    // Define relationships
    public function agent()
    {
        return $this->belongsTo(Register::class);
    }

    public function subProduct()
    {
        return $this->belongsTo(SubProducts::class,'sproduct_id');
    }
}
