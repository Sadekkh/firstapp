<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brands';

    public function products()
    {
        return $this->hasMany(products::class, 'brand_id');
    }
    public function productsCount()
    {
        return $this->products()->selectRaw('brand_id, count(*) as product_count')->groupBy('brand_id');
    }
}
