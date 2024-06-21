<?php

namespace Modules\Shop\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Database\factories\AddressFactory;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */

    protected $table = 'shop_addresses';

    protected $fillable = [];
    
    protected static function newFactory(): AddressFactory
    {
        return AddressFactory::new();
    }
}
