<?php

namespace Database\Seeders;

use App\Models\DetailBooking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomBookingDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $room_booking_detail = [
            [
                'id_booking'            => '1',
                'id_room'               => '1',
                'id_user'               => '1',
                'notes_detail'          => 'Test Notes Booking Room 1'
            ],
            [
                'id_booking'            => '2',
                'id_room'               => '2',
                'id_user'               => '4',
                'notes_detail'          => 'Room Booked Full time in one day 😁😂😁😁😁😁😁😁😁😁😁'
            ],
        ];

        DetailBooking::insert($room_booking_detail);
    }
}
