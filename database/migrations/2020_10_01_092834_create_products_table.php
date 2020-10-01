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

            $table->string('title', 255)->default(null)->nullable();
            $table->string('price', 255)->default(null)->nullable();
            $table->string('old_price', 255)->default(null)->nullable();
            $table->string('discounts', 255)->default(null)->nullable();

            $table->text('preloader')->default(null)->nullable();
            $table->text('img')->default(null)->nullable();
            $table->text('text')->default(null)->nullable();


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
