<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('supplier_payments', function (Blueprint $table) {
            $table->id();
            $table->text('supplier_id')->nullable();
            $table->text('sup_payment_date')->nullable();
            $table->integer('sup_payment_mode')->comment('1=cash, 2=check, 3=creditcard, 4=banktransfer')->nullable();
            $table->text('sup_payment_amount')->nullable();
            $table->longText('sup_payment_comment')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('supplier_payments');
    }
};
