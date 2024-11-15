<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POSInformation extends Model{
    use HasFactory;

    protected $table = 'pos_information';
    protected $fillable = [
        'delivery_feature', 'cash_drawer_feature', 'default_vat', 'vat_type', 'default_delivery_charge', 'default_discount', 'item_audio'
    ];
}
