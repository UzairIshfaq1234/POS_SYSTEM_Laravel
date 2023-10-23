<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('Id')->autoIncrement();
            $table->string('Product_Name');
            $table->string('Product_Code')->unique();
            $table->string('Product_SKU')->unique();
            $table->string('Product_Description');
            $table->string('Product_Stock');
            $table->string('Product_Sale_Price');
            $table->string('Product_Retail_Price')->nullable();

            $table->string('Product_Image');
            $table->string('Product_Barcode');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
