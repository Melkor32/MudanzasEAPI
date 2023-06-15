<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->unique()->nullable();
            $table->date('date');
            $table->unsignedBigInteger('client_id');
            $table->string('concept');
            $table->float('amount', 12, 2);
            $table->float('advanced', 12, 2);
            $table->string('payment_type', 20);
            $table->boolean('is_budget');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
