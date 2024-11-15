<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->longText('exp_name')->nullable();
            $table->text('exp_date')->nullable();
            $table->text('exp_amount')->nullable();
            $table->integer('exp_payment_mod')->comment('1=cash, 2=check, 3=creditcard, 4=banktransfer')->nullable();
            $table->longText('exp_reason')->nullable();
            $table->longText('exp_comment')->nullable();
            $table->text('exp_receipt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
