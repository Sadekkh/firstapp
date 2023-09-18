<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'offers';
    protected $fillable = ['state', 'name_en', 'name_ar', 'discount', 'badge', 'trending'];

    public function Product()
    {
        return $this->hasMany(products::class, 'offer_id');
    }
}
