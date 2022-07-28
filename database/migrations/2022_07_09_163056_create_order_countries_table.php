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
        Schema::create('order_countries', function (Blueprint $table) {
            $table->id();
            $table->string('country_name_sk');
            $table->string('country_name_en');
            $table->string('country_iso_code_2');
            $table->string('country_iso_code_3');
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
        Schema::dropIfExists('order_countries');
    }
};
