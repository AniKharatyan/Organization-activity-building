<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Activity;
use App\Models\Building;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $building1 = Building::create([
            'address' => 'Bluchera, 32/1',
            'latitude' => 55.7558,
            'longitude' => 37.6173,
        ]);

        $building2 = Building::create([
            'address' => 'Moscow, Lenin St. 1, Office 3',
            'latitude' => 55.751244,
            'longitude' => 37.618423,
        ]);

        $activityFood = Activity::create(['name' => 'Food']);
        $activityMeat = Activity::create(['name' => 'Meat Products', 'parent_id' => $activityFood->id]);
        $activityDairy = Activity::create(['name' => 'Dairy Products', 'parent_id' => $activityFood->id]);
        $activityAutomobiles = Activity::create(['name' => 'Automobiles']);
        $activityCars = Activity::create(['name' => 'Cars', 'parent_id' => $activityAutomobiles->id]);
        $activityAccessories = Activity::create(['name' => 'Accessories', 'parent_id' => $activityCars->id]);

        $organization1 = Organization::create([
            'name' => 'LLC “Roga i Kopyta”',
            'phone_numbers' => json_encode(['2-222-222', '3-333-333', '8-923-666-13-13']),
            'building_id' => $building1->id,
        ]);

        $organization1->activities()->attach([$activityMeat->id, $activityDairy->id]);

        $organization2 = Organization::create([
            'name' => 'LLC “Auto World”',
            'phone_numbers' => json_encode(['8-800-555-35-35']),
            'building_id' => $building2->id,
        ]);

        $organization2->activities()->attach([$activityCars->id, $activityAccessories->id]);
    }
}
