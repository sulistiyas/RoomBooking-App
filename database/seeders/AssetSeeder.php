<?php

namespace Database\Seeders;

use App\Models\Assets;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assets = [
            [
                'asset_name'        => 'Whiteboard',
                'status'            => 'Normal'
            ],
            [
                'asset_name'        => 'Whiteboard Marker',
                'status'            => 'Normal'
            ],
            [
                'asset_name'        => 'Projector',
                'status'            => 'Normal'
            ],
            [
                'asset_name'        => 'Projector Screen',
                'status'            => 'Normal'
            ],
            [
                'asset_name'        => 'Chair',
                'status'            => 'Normal'
            ],
        ];

        Assets::insert($assets);
    }
}
