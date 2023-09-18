<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attribute extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attributes';
    protected $fillable = [
        'name_ar', 'name_en', 'type', 'activate_filter'
    ];
    public function productVariations()
    {
        return $this->hasMany(product_variation::class, 'attribute_id', 'id');
    }
    public function variation()
    {
        return $this->hasMany(variation::class, 'attribute_id', 'id');
    }
}
