<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model{
    use HasFactory;

    protected $table = 'suppliers';
    protected $fillable = [
        'sup_name', 'sup_email', 'sup_address', 'sup_number', 'sup_note', 'sup_status', 'sup_image'
    ];
}
