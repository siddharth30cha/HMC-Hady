<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyInformation extends Model {
    use HasFactory;

    protected $table = 'currency_information';
    protected $fillable = [
        'currency_symbol', 'currency_position', 'currency_thousand_separator', 'currency_decimal_separator', 'currency_precision', 'currency_trailing_zeros'
    ];
}
