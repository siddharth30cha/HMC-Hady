<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('store_information', function (Blueprint $table) {
            $table->id();
            $table->text('store_name')->nullable();
            $table->longText('store_address')->nullable();
            $table->text('store_phone')->nullable();
            $table->text('store_website')->nullable();
            $table->text('store_email')->nullable();
            $table->longText('store_add_info')->nullable();
            $table->longText('store_svg_logo')->nullable();
            $table->integer('store_language')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('store_information');
    }
};
