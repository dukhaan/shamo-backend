<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransactionIdToTransactionItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('transaction_items', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('users_id');
        $table->unsignedBigInteger('products_id');
        $table->unsignedBigInteger('transaction_id')->default(0); // Set a default value here
        $table->integer('quantity');
        $table->timestamps();

        $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction_items', function (Blueprint $table) {
            $table->dropForeign(['transaction_id']);
            $table->dropColumn('transaction_id');
        });
    }
}
