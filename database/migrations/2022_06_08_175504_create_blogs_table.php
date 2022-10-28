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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_type_id');
            $table->integer('user_id');
            $table->string('feature_img')->nullable();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('authors')->nullable();
            $table->text('teaser')->nullable();
            $table->mediumText('body');
            $table->text('links')->nullable();
            $table->boolean('featured')->default(false);
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
        Schema::dropIfExists('blogs');
    }
};
