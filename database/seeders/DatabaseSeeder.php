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
        $building1 = Building::query()->create([
            'address' => 'Bluchera, 32/1',
            'latitude' => 55.7558,
            'longitude' => 37.6173,
        ]);

        $building2 = Building::query()->create([
            'address' => 'Moscow, Lenin St. 1, Office 3',
            'latitude' => 55.751244,
            'longitude' => 37.618423,
        ]);

        $activityFood = Activity::query()->create(['name' => 'Food']);
        $activityMeat = Activity::query()->create(['name' => 'Meat Products', 'parent_id' => $activityFood->id]);
        $activityMeatChicken = Activity::query()->create(['name' => 'Chicken', 'parent_id' => $activityMeat->id]);
        $activityDairy = Activity::query()->create(['name' => 'Dairy Products', 'parent_id' => $activityFood->id]);
        $activityAutomobiles = Activity::query()->create(['name' => 'Automobiles']);
        $activityCars = Activity::query()->create(['name' => 'Cars', 'parent_id' => $activityAutomobiles->id]);
        $activityAccessories = Activity::query()->create(['name' => 'Accessories', 'parent_id' => $activityCars->id]);

        $organization1 = Organization::query()->create([
            'name' => 'LLC “Roga i Kopyta”',
            'phone_numbers' => json_encode(['2-222-222', '3-333-333', '8-923-666-13-13']),
            'building_id' => $building1->id,
        ]);

        $organization1->activities()->attach([$activityMeat->id, $activityDairy->id]);

        $organization2 = Organization::query()->create([
            'name' => 'LLC “Auto World”',
            'phone_numbers' => json_encode(['8-800-555-35-35', '8-495-777-77-77']),
            'building_id' => $building2->id,
        ]);

        $organization2->activities()->attach([$activityCars->id, $activityAccessories->id]);
    }
}
