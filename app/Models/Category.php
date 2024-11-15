<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'cat_name', 'cat_sort', 'cat_status', 'cat_image'
    ];
}
