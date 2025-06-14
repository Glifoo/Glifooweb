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
        Schema::create('byproducts', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('costo', 10, 2)->default(0.00)->nullable();
            $table->text('descripcion')->nullable();
            $table->foreignId('product_id')
            ->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('byproducts');
    }
};
