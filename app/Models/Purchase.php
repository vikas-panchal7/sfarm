<?php

namespace App\Models;

use App\Models\Register;
use App\Models\SubProducts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = ['purchase_bill_id','price', 'sproduct_id', 'quantity', 'total_amount'];

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
