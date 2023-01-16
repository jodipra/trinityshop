<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitrumahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitrumah', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('listrumah_id');
            $table->foreignId('listrumah_id')->constrained('listperumahan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('type');
            $table->smallInteger('lb');
            $table->smallInteger('lt');
            $table->longText('description');
            $table->longText('spesifikasi');
            $table->string('original_price');
            $table->string('selling_price');
            $table->string('utj_price');
            $table->string('image');
            $table->string('qty');
            $table->tinyInteger('status');
            $table->mediumText('meta_title');
            $table->mediumText('meta_keywords');
            $table->mediumText('meta_descrip');
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
        Schema::dropIfExists('unitrumah');
    }
}
