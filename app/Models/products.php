<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';
    protected $fillable = ['status', 'category_id', 'brand_id', 'offer_id', 'name_en', 'name_ar', 'description_en', 'description_ar', 'price', 'primary_price', 'quantity', 'quantity_left', 'discount', 'price_disc', 'date_end_disc', 'top_collection', 'best_selling', 'seo_meta_tag', 'created_at', 'updated_at', 'deleted_at', 'buying_count'];

    public function category()
    {
        return $this->belongsTo(categories::class, 'category_id');
    }
    public function offer()
    {
        return $this->belongsTo(offer::class, 'offer_id');
    }
    public function image()
    {
        return $this->hasMany(imagesm::class);
    }
    public function brand()
    {
        return $this->belongsTo(brands::class, 'brand_id');
    }
    public function attribute()
    {
        return $this->hasMany(product_atribute::class, 'products_id');
    }
    public function variation()
    {
        return $this->hasMany(product_variation::class);
    }
    public function dissattribute()
    {
        return $this->variation()->selectRaw('attribute_id, count(*) as product_count')->groupBy('attribute_id');
    }
}
