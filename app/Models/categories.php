<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    protected $fillable = ['name_en', 'name_ar', 'parent_id', 'trending', 'status'];
    public function parentCategory()
    {
        return $this->belongsTo(categories::class, 'parent_id');
    }

    public function childCategories()
    {
        return $this->hasMany(categories::class, 'parent_id');
    }
    public function products()
    {
        return $this->hasMany(products::class, 'category_id');
    }
    public function productsCount()
    {
        return $this->products()->selectRaw('category_id, count(*) as product_count')->groupBy('category_id');
    }
}
