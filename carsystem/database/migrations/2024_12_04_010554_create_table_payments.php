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
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('PAYMENT_ID');
            $table->integer('BOOK_ID')->index();
            $table->string('NAME');
            $table->string('PHONE', 15);
            $table->decimal('AMOUNT', 10, 2);
            $table->timestamp('PAYMENT_DATE')->useCurrent();
            $table->string('reference_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
