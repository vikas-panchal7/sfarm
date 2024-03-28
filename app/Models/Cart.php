<?php

namespace App\Models;

use App\Models\Register;
use App\Models\SubProducts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['uid', 'spid', 'price', 'qty', 'total_price'];

    /**
     * Get the user that owns the cart.
     */
    public function user()
    {
        return $this->belongsTo(Register::class, 'uid');
    }

    /**
     * Get the sub product associated with the cart.
     */
    public function subProduct()
    {
        return $this->belongsTo(SubProducts::class, 'spid');
    }
}
