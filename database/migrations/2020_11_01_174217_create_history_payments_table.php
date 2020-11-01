<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_payments', function (Blueprint $table) {
            $table->id();

            $table->string('user_id', 255)->default(null)->nullable();
            $table->string('money', 255)->default(null)->nullable();
            $table->string('billId', 255)->default(null)->nullable();
            $table->string('type', 255)->default(null)->nullable();
            $table->boolean('status')->default(false)->nullable();

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
        Schema::dropIfExists('history_payments');
    }
}
