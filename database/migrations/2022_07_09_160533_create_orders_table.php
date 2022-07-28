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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_status_id');
            $table->bigInteger('order_total');
            $table->integer('product_count');
            $table->string('primary_email')->default('');
            $table->string('delivery_first_name')->default('');
            $table->string('delivery_last_name')->default('');
            $table->string('delivery_phone')->nullable();
            $table->string('delivery_company')->nullable();
            $table->string('delivery_street1')->default('');
            $table->string('delivery_street2')->nullable();
            $table->string('delivery_city')->default('');
            $table->string('delivery_postal_code')->default('');
            $table->foreignId('delivery_country')->default(703);
            $table->string('billing_first_name')->nullable();
            $table->string('billing_last_name')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_company')->nullable();
            $table->string('billing_street1')->nullable();
            $table->string('billing_street2')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_postal_code')->nullable();
            $table->foreignId('billing_country')->default(703);
            $table->string('payment_method')->nullable();
            $table->string('currency')->default('EUR');
            $table->string('host')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
