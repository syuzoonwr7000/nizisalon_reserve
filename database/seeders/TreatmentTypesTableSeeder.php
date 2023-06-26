<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TreatmentType;

class TreatmentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TreatmentType::insert([
            'type' => 'マタニティ',
            'price' => 6000,
            'frequency' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        TreatmentType::insert([
            'type' => '産後',
            'price' => 7800,
            'frequency' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        TreatmentType::insert([
            'type' => '一般',
            'price' => 7800,
            'frequency' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        TreatmentType::insert([
            'type' => 'マタニティ',
            'price' => 44000,
            'frequency' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        TreatmentType::insert([
            'type' => '産後',
            'price' => 42000,
            'frequency' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        TreatmentType::insert([
            'type' => '一般',
            'price' => 42000,
            'frequency' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
