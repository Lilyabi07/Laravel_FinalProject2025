<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('category');
        $table->text('description');
        $table->decimal('price', 8, 2);
        $table->string('image')->nullable();
        $table->integer('stock_quantity');
        $table->timestamps();
    });
}

}
