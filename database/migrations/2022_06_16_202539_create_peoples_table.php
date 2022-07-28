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
        Schema::create('peoples', function (Blueprint $table) {
            $table->id();
            $table->integer('peoples_type_id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('slug');
            $table->text('teaser');
            $table->text('body');
            $table->text('links')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('published');
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
        Schema::dropIfExists('peoples');
    }
};
