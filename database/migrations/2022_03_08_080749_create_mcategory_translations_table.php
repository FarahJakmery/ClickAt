<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcategory_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mcategory_id')->constrained()->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('category_name', 999);
            $table->text('description')->nullable();
            $table->unique(['mcategory_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mcategory_translations');
    }
}
