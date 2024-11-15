<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model{
    use HasFactory;

    protected $table = 'expenses';
    protected $fillable = [
        'exp_name', 'exp_date', 'exp_amount', 'exp_payment_mod', 'exp_reason', 'exp_comment', 'exp_receipt'
    ];
}
