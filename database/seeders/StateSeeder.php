<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Andhra Pradesh', 'code' => 'AP', 'type' => 'state'],
            ['name' => 'Arunachal Pradesh', 'code' => 'AR', 'type' => 'state'],
            ['name' => 'Assam', 'code' => 'AS', 'type' => 'state'],
            ['name' => 'Bihar', 'code' => 'BR', 'type' => 'state'],
            ['name' => 'Chhattisgarh', 'code' => 'CG', 'type' => 'state'],
            ['name' => 'Goa', 'code' => 'GA', 'type' => 'state'],
            ['name' => 'Gujarat', 'code' => 'GJ', 'type' => 'state'],
            ['name' => 'Haryana', 'code' => 'HR', 'type' => 'state'],
            ['name' => 'Himachal Pradesh', 'code' => 'HP', 'type' => 'state'],
            ['name' => 'Jharkhand', 'code' => 'JH', 'type' => 'state'],
            ['name' => 'Karnataka', 'code' => 'KA', 'type' => 'state'],
            ['name' => 'Kerala', 'code' => 'KL', 'type' => 'state'],
            ['name' => 'Madhya Pradesh', 'code' => 'MP', 'type' => 'state'],
            ['name' => 'Maharashtra', 'code' => 'MH', 'type' => 'state'],
            ['name' => 'Manipur', 'code' => 'MN', 'type' => 'state'],
            ['name' => 'Meghalaya', 'code' => 'ML', 'type' => 'state'],
            ['name' => 'Mizoram', 'code' => 'MZ', 'type' => 'state'],
            ['name' => 'Nagaland', 'code' => 'NL', 'type' => 'state'],
            ['name' => 'Odisha', 'code' => 'OR', 'type' => 'state'],
            ['name' => 'Punjab', 'code' => 'PB', 'type' => 'state'],
            ['name' => 'Rajasthan', 'code' => 'RJ', 'type' => 'state'],
            ['name' => 'Sikkim', 'code' => 'SK', 'type' => 'state'],
            ['name' => 'Tamil Nadu', 'code' => 'TN', 'type' => 'state'],
            ['name' => 'Telangana', 'code' => 'TS', 'type' => 'state'],
            ['name' => 'Tripura', 'code' => 'TR', 'type' => 'state'],
            ['name' => 'Uttar Pradesh', 'code' => 'UP', 'type' => 'state'],
            ['name' => 'Uttarakhand', 'code' => 'UK', 'type' => 'state'],
            ['name' => 'West Bengal', 'code' => 'WB', 'type' => 'state'],
            ['name' => 'Andaman and Nicobar Islands', 'code' => 'AN', 'type' => 'ut'],
            ['name' => 'Chandigarh', 'code' => 'CH', 'type' => 'ut'],
            ['name' => 'Dadra and Nagar Haveli and Daman and Diu', 'code' => 'DN', 'type' => 'ut'],
            ['name' => 'Lakshadweep', 'code' => 'LD', 'type' => 'ut'],
            ['name' => 'Delhi', 'code' => 'DL', 'type' => 'ut'],
            ['name' => 'Jammu and Kashmir', 'code' => 'JK', 'type' => 'ut'],
            ['name' => 'Ladakh', 'code' => 'LA', 'type' => 'ut'],
        ];

        foreach ($states as $state) {
            \App\Models\State::create($state);
        }
    }
}
