<?php

namespace Database\Seeders;

use App\Models\DetilUser;
use Illuminate\Database\Seeder;

class DetilUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detail_user = [
            [
                'id_user'           => 1,
                'division'          => 'Operational',
                'company'           => 'PT.inlingua',
                // 'level'             => 'Admin',
                'phone_number'      => '082110873602',
                'status'            => 'Active',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s'),
            ],
            [
                'id_user'           => 2,
                'division'          => 'Operational',
                'company'           => 'PT.inlingua',
                // 'level'             => 'Staff',
                'phone_number'      => '082110873602',
                'status'            => 'Active',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s'),
            ],
            [
                'id_user'           => 3,
                'division'          => 'Operational',
                'company'           => 'PT.inlingua',
                // 'level'             => 'User',
                'phone_number'      => '082110873602',
                'status'            => 'Active',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s'),
            ],
            [
                'id_user'           => 4,
                'division'          => 'Academic',
                'company'           => 'PT.inlingua',
                // 'level'             => 'User',
                'phone_number'      => '082110873602',
                'status'            => 'Active',
                'created_at'        => date('Y-m-d h:i:s'),
                'updated_at'        => date('Y-m-d h:i:s'),
            ],
        ];

        DetilUser::insert($detail_user);
    }
}
