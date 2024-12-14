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
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('BOOK_ID');
            $table->integer('CAR_ID')->index();
            $table->string('EMAIL')->index();
            $table->string('BOOK_PLACE');
            $table->date('BOOK_DATE');
            $table->integer('DURATION');
            $table->bigInteger('PHONE_NUMBER');
            $table->string('DESTINATION');
            $table->string('ID_PHOTO')->nullable();
            $table->integer('PRICE');
            $table->string('BOOK_STATUS')->default('UNDER PROCESSING');
            $table->date('RETURN_DATE')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
