<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFastproductTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fastproduct_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fastproduct_id')->constrained()->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name', 999);
            $table->unique(['fastproduct_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fastproduct_translations');
    }
}
