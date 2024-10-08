<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained('invoices')->onDelete('cascade');
            $table->string('item_name');
            $table->integer('quantity');
            $table->decimal('price', 8, 0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoice_details');
    }

};
