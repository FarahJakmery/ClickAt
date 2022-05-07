<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCounterAndDecreasingValueColumnsFromFastproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fastproducts', function (Blueprint $table) {
            $table->dropColumn(['counter', 'decreasing_value']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fastproducts', function (Blueprint $table) {
            $table->string('counter');
            $table->string('decreasing_value');
        });
    }
}
