<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name', 191)->nullable();
            $table->string('slug', 191)->nullable();
            $table->integer('top_category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->integer('third_level_sub_category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('stock_type')->default(1)->comment("1 = Single, 2 = Size By");
            $table->text('desc');
            $table->double('price', 8, 2);
            $table->string('banner', 191);
            $table->integer('status')->default(1)->comment("1 = Active, 2 = Inactive");
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
        Schema::dropIfExists('product');
    }
}
