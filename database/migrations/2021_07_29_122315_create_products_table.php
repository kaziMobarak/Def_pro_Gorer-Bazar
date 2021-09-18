<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            //product informations
            $table->string('name')->unique();
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('unit');
            $table->tinyInteger('min_qty');
            $table->string('refundable');

            //product image info
            $table->string('photes');
            $table->string('thumbnail_img');
            //color section
      

            //product video info
            $table->string('video_provider')->nullable();
            $table->string('video_link')->nullable();

            //product variant
            //variant table [color, size, price, product_id]

            //product price + stoke
            $table->string('unit_price');
            $table->string('date_range_start')->nullable();
            $table->string('data_range_end')->nullable();
            $table->string('discount')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('sku')->nullable();


            //shipping info (right side)
            $table->string('shipping_type');
            $table->string('shipping_charge')->nullable();
            $table->integer('low_stock_quantity')->nullable();
            $table->string('stock_visibility_state')->nullable();
            $table->string('cash_on_delivery');
            $table->string('status');
            $table->integer('est_shipping_days')->nullable();
            $table->integer('tex')->nullable();

            //product description
            $table->longText('description');
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
}
