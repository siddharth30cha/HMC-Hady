<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void {
        Schema::create('currency_information', function (Blueprint $table) {
            $table->id();
            $table->text('currency_symbol')->nullable();
            $table->integer('currency_position')->nullable();
            $table->text('currency_thousand_separator')->nullable();
            $table->text('currency_decimal_separator')->nullable();
            $table->integer('currency_precision')->nullable();
            $table->integer('currency_trailing_zeros')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('currency_information');
    }
};
