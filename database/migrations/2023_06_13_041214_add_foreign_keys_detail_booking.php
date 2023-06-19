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
        Schema::table('room_booking_detail', function (Blueprint $table) {
            $table->foreign('id_booking', 'fk_detail_booking_to_room_booking')->references('id')->on('room_booking')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_room', 'fk_detail_booking_to_rooms')->references('id')->on('rooms')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_user', 'fk_detail_booking_to_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('room_booking_detail', function (Blueprint $table) {
            $table->dropForeign('fk_detail_booking_to_room_booking');
            $table->dropForeign('fk_detail_booking_to_rooms');
            $table->dropForeign('fk_detail_booking_to_users');
        });
    }
};
