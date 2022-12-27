<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayar', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('name');
            $table->string('lname');
            $table->string('email');
            $table->string('phone');
            $table->string('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('negara');
            $table->string('kodepos');
            $table->integer('total_price');
            $table->string('image')->nullable();
            $table->string('payment_mode');
            $table->string('payment_id')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->string('message')->nullable();
            $table->string('tracking_no');

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
        Schema::dropIfExists('bayar');
    }
}
