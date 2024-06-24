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

    protected $fillable = [
        'user_id',
        'is_primary',
        'first_name',
        'last_name',
        'label',
        'address1',
        'address2',
        'phone',
        'email',
        'city',
        'province',
        'postcode',
    ];
    
    protected static function newFactory(): AddressFactory
    {
        return AddressFactory::new();
    }
}
