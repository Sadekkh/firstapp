<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'variations';
    protected $fillable = [
        'name_ar', 'name_en', 'value', 'attribute_id'
    ];
    public function attribute()
    {
        return $this->belongsTo(attribute::class);
    }
    public function product()
    {
        return $this->belongsTo(product_variation::class, 'products_id');
    }

    // Define the relationship with product_variations
    public function productVariations()
    {
        return $this->hasMany(product_variation::class);
    }
}
