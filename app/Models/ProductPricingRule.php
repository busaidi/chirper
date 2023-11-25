<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPricingRule extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_type_id',
        'base_price',
        'color_price',
        'crimping_price',
        'min_length',
        'max_length',
        'min_qty',
        'max_qty',
        'weight_price',
        'weight_per_meter_price',
        'bar_length_price'
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}
