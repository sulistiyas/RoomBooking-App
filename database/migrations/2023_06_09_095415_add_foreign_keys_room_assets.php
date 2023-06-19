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
        Schema::table('room_assets', function (Blueprint $table) {
            $table->foreign('room_id', 'fk_room_assets_to_room')->references('id')->on('rooms')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('assets_id', 'fk_room_assets_to_assets')->references('id')->on('assets')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('room_assets', function (Blueprint $table) {
            $table->dropForeign('fk_room_assets_to_room');
            $table->dropForeign('fk_room_assets_to_assets');
        });
    }
};
