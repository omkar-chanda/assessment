<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'email',
        'shipping_address_1',
        'city',
        'country_code',
        'zip_postal_code',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
