<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(): void {
        Schema::create('pos_information', function (Blueprint $table) {
            $table->id();
            $table->integer('delivery_feature')->nullable();
            $table->integer('cash_drawer_feature')->nullable();
            $table->float('default_vat', 15, 3)->nullable();
            $table->integer('vat_type')->nullable();
            $table->float('default_delivery_charge', 15, 3)->nullable();
            $table->float('default_discount', 15, 3)->nullable();
            $table->integer('item_audio')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pos_information');
    }
};
