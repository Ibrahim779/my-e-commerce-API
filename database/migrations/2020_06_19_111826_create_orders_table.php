<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->string('phone');
            $table->unsignedInteger('city_id')->nullable();
            $table->string('address');
            $table->string('email');
            $table->double('total_price')->default(0.0);
            $table->enum('payment_status', ['debt', 'paid'])->default('debt');
            $table->enum('status', ['pending', 'prepared', 'delivered','completed'])->default('pending');
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
}
