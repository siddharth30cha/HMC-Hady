<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('category_id')->nullable();
            $table->text('prd_name')->nullable();
            $table->longText('prd_description')->nullable();
            $table->integer('prd_status')->comment('1=Active, 2=Inactive')->nullable();
            $table->text('prd_order')->nullable();
            $table->float('main_price', 15, 7)->nullable();
            $table->float('retail_price', 15, 7)->nullable();
            $table->float('wholesale_price', 15, 7)->nullable();
            $table->text('prd_image')->nullable();
            $table->text('prd_stock')->nullable();
            $table->integer('prd_track_stock')->nullable();
            $table->integer('prd_selling_out_stock')->nullable();
            $table->text('prd_reatil_barcode')->nullable();
            $table->text('prd_reatil_sku')->nullable();
            $table->text('prd_wholesale_barcode')->nullable();
            $table->text('prd_wholesale_sku')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('products');
    }

};
