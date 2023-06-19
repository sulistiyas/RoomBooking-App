<?php

namespace Database\Seeders;

use App\Models\RoomAsset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomAssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $room_asset = [
            [
                'room_id'           => '1',
                'assets_id'         => '1',
                'assets_qty'        => '1',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'room_id'           => '1',
                'assets_id'         => '2',
                'assets_qty'        => '2',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'room_id'           => '1',
                'assets_id'         => '3',
                'assets_qty'        => '1',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'room_id'           => '1',
                'assets_id'         => '4',
                'assets_qty'        => '1',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'room_id'           => '1',
                'assets_id'         => '5',
                'assets_qty'        => '20',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'room_id'           => '2',
                'assets_id'         => '3',
                'assets_qty'        => '1',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'room_id'           => '2',
                'assets_id'         => '4',
                'assets_qty'        => '1',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ],
            [
                'room_id'           => '2',
                'assets_id'         => '5',
                'assets_qty'        => '5',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s')
            ]
        ];

        RoomAsset::insert($room_asset);
    }
}
