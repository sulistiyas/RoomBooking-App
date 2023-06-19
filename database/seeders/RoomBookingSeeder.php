<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $room_booking = [
            [
                'status'            => '3',
                'start_time'        => '10:00:00',
                'end_time'          => '11:00:00',
                'booking_date'      => '2023-06-17',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'status'            => '3',
                'start_time'        => '09:00:00',
                'end_time'          => '16:00:00',
                'booking_date'      => '2023-06-19',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ]
        ];

        Booking::insert($room_booking);
    }
}
