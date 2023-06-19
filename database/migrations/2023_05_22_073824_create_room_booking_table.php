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
        Schema::create('room_booking', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->time('start_time');
            $table->time('end_time');
            $table->date('booking_date');
            $table->integer('flag'); // 1 = FullDay , 0 = Avaliable
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_booking');
    }
};
