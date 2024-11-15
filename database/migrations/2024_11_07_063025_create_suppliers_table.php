<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->text('sup_name')->nullable();
            $table->text('sup_email')->nullable();
            $table->longText('sup_address')->nullable();
            $table->text('sup_number')->nullable();
            $table->longText('sup_note')->nullable();
            $table->integer('sup_status')->comment('1=Active, 2=InActive')->nullable();
            $table->text('sup_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('suppliers');
    }
};
