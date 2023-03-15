<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('authors')->nullable();
            $table->string('editors')->nullable();
            $table->string('translation')->nullable();
            $table->string('cover')->nullable();
            $table->text('teaser')->nullable();
            $table->longText('body')->nullable();
            $table->text('sample')->nullable();
            $table->text('links')->nullable();
            $table->boolean('is_product')->default(false);
            $table->bigInteger('aspekt_price')->nullable();
            $table->bigInteger('common_price')->nullable();
            $table->integer('pages')->nullable();
            $table->string('isbn')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('published')->default(false);
            $table->string('language')->default('sk');
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
        Schema::dropIfExists('books');
    }
};
