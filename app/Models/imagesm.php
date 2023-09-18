<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagesm extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'imagesm';
    protected $fillable = ['products_id', 'name'];
    public function product()
    {
        return $this->belongsTo(products::class);
    }
}
