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
        Schema::create('room_booking_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_booking')->nullable()->index('fk_detail_booking_to_room_booking');
            $table->foreignId('id_room')->nullable()->index('fk_detail_booking_to_rooms');
            $table->foreignId('id_user')->nullable()->index('fk_detail_booking_to_users');
            $table->string('notes_detail');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_booking_detail');
    }
};
