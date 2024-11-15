<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'category_id', 'prd_name', 'prd_description', 'prd_status', 'prd_order', 'main_price', 'retail_price', 'wholesale_price', 'prd_image', 'prd_stock', 'prd_track_stock', 'prd_selling_out_stock', 'prd_reatil_barcode', 'prd_reatil_sku', 'prd_wholesale_barcode', 'prd_wholesale_sku'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
