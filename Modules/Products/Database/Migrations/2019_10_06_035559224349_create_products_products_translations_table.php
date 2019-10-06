<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsProductsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products__products_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('products_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['products_id', 'locale']);
            $table->foreign('products_id')->references('id')->on('products__products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products__products_translations', function (Blueprint $table) {
            $table->dropForeign(['products_id']);
        });
        Schema::dropIfExists('products__products_translations');
    }
}
