<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_atribute extends Model
{
    protected $table = 'product_attribute';
    protected $fillable = [
        'attribute_id', 'product_id'
    ];
    public function attribute()
    {
        return $this->belongsTo(attribute::class);
    }
    public function product()
    {
        return $this->belongsTo(products::class);
    }
}
