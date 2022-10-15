<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyQtyInUnitrumahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unitrumah', function (Blueprint $table) {
            $table->dropColumn('qty');
            $table->boolean('sold')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unitrumah', function (Blueprint $table) {
            $table->string('qty')->after('utj_price')->default(0);
            $table->dropColumn('sold');
        });
    }
}
