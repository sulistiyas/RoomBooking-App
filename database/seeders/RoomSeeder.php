<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'room_name'         => 'Calibrate',
                'capacity'          => '20',
                'photo_path_1'      => '1686646018_1.jpg',
                'photo_path_2'      => '1686646018_2.jpg',
                'photo_path_3'      => '1686646018_3.jpg',
                'photo_path_4'      => '1686646018_4.jpg',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'room_name'         => 'Kids',
                'capacity'          => '5',
                'photo_path_1'      => '1686646091_1.jpg',
                'photo_path_2'      => '1686646091_2.jpg',
                'photo_path_3'      => '1686646091_3.jpg',
                'photo_path_4'      => '1686646091_4.jpg',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ]
        ];

        Room::insert($rooms);
    }
}
