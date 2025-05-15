<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
       Schema::create('orders', function (Blueprint $table) {
        $table->id();                         // ← add this line
        $table->string('customer_name');
        $table->string('customer_email');
        $table->text('customer_address');
        $table->decimal('total_amount', 10, 2);
        $table->string('payment_type');
        $table->foreignId('user_id')
              ->nullable()
              ->constrained();
        $table->timestamps();
    });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}