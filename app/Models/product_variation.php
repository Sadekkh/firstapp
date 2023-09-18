<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_variation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_variations';
    protected $fillable = [
        'attribute_id', 'variation_id', 'product_id'
    ];
    public function attribute()
    {
        return $this->belongsTo(attribute::class, 'attribute_id', 'id');
    }

    public function variation()
    {
        return $this->belongsTo(variation::class, 'variation_id', 'id');
    }
}
