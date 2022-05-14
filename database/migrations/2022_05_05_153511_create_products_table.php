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
            $table->increments('id');

            $table->foreignId('brand_id')->constrained();

            $table->foreignId('category_id')->constrained();

            $table->string('name');
            $table->string('slug');

//            $table->string('size');
//            $table->string('colour');
//            $table->string('weight');
//            $table->string('price');

            $table->text('description')->nullable();
            $table->unsignedInteger('quantity');
            $table->boolean('featured')->default(0);




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
