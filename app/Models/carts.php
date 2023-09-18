<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carts';
    protected $fillable = ['user_id', 'session_id','ip_adress', 'product_id', 'quantity', 'colors', 'sizes', 'capacity','model', 'tall' ];
    public function product()
    {
        return $this->belongsTo(products::class);
    }
}
