<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreInformation extends Model{
    use HasFactory;

    protected $table = 'store_information';
    protected $fillable = [
        'store_name', 'store_address', 'store_phone', 'store_website', 'store_email', 'store_add_info', 'store_svg_logo', 'store_language'
    ];
}
