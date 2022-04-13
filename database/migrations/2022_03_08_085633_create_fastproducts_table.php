<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFastproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fastproducts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('product_date');
            $table->dateTime('expiry_date');
            $table->string('product_number');
            $table->string('photo_name');
            $table->string('min_price');
            $table->string('max_price');
            $table->string('counter');
            $table->string('minutes');
            $table->string('decreasing_value');
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
        Schema::dropIfExists('fastproducts');
    }
}
