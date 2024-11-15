<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPayments extends Model{
    use HasFactory;

    protected $table = 'supplier_payments';
    protected $fillable = [
        'supplier_id', 'sup_payment_date', 'sup_payment_mode', 'sup_payment_amount', 'sup_payment_comment'
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
