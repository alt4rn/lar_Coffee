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
            $table->increments('id');
            $table->string('order_number')->default('#00000000');
            $table->enum('status', ['not paid', 'being processed', 'ready to take', 'sending', 'done', 'canceled']);
            $table->unsignedInteger('user_id')->nullable();
            $table->string('re_name');
            $table->string('re_address')->nullable();
            $table->string('re_phone');
            $table->enum('delivery_method', ['take away', 'GOFOOD']);
            $table->double('delivery_cost', 20, 2)->nullable();
            $table->double('discount', 20, 2)->nullable();
            $table->double('sub_total', 20, 2);
            $table->double('total', 20, 2);
            $table->text('note', 500)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
