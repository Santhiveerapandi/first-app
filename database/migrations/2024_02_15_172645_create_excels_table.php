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
        Schema::create('excels', function (Blueprint $table) {
            $table->id();
            $table->string('Region', 200)->nullable();
            $table->string('Country',200);
            $table->string('ItemType', 200);
            $table->string('SalesChannel',40)->nullable();
            $table->string('OrderPriority',2)->comment("C,H,L,M");
            $table->string('OrderDate')->nullable();
            $table->bigInteger('OrderID')->unsigned();
            $table->string('ShipDate')->nullable();
            $table->integer('UnitsSold')->unsigned();
            $table->double('UnitPrice')->default(0.0);
            $table->double('UnitCost')->default(0.0);	
            $table->double('TotalRevenue')->default(0.0);
            $table->double('TotalCost')->default(0.0);
            $table->double('TotalProfit')->default(0.0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excels');
    }
};
