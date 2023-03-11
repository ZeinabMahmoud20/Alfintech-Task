<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->boolean('VAT')->default(0);
            $table->float('VAT_percentage')->default(0.0);
            $table->float('VAT_value')->default(0.0);
            $table->double('paied_price')->default(0.0);
            $table->integer('shipping_cost')->default(0);
            $table->bigInteger('store_id')->unsigned();
            $table->foreign('store_id')
                ->references('id')
                ->on('stores')
                ->cascadeOnDelete();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
