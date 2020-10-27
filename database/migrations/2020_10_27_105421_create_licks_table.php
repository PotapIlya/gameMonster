<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licks', function (Blueprint $table) {
            $table->id();

            $table->string('img', 255)->default(null)->nullable();
            $table->string('games', 255)->default(null)->nullable();
            $table->string('profit', 255)->default(null)->nullable();
            $table->string('games_form', 255)->default(null)->nullable();
            $table->string('new_price', 255)->default(null)->nullable();
            $table->string('old_price', 255)->default(null)->nullable();

			$table->string('href', 255)->default(null)->nullable();
			$table->string('discount', 255)->default(null)->nullable();


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
        Schema::dropIfExists('licks');
    }
}
