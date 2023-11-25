<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_type_id');
    }

    public function pricingRules()
    {
        return $this->hasMany(ProductPricingRule::class, 'product_type_id');
    }

}
