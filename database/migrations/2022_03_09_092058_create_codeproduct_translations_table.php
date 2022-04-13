<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeproductTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codeproduct_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('codeproduct_id')->constrained()->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('codeproduct_name', 999);
            $table->unique(['codeproduct_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codeproduct_translations');
    }
}
