<?php

namespace Modules\Shop\App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{

    /**
     * The attributes that are mass assignable.
     */

    protected $table = 'shop_cart_items';

    protected $fillable = [
        'cart_id',
        'product_id',
        'qty',
    ];
    
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function getSubTotalAttribute()
    {
        return number_format($this->qty * $this->product->price);
    }
}
