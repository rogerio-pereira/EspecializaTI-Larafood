<?php

use App\Models\Plan;
use App\Models\DetailPlan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Plan::class, 5)->create()->each(function ($plan) {
            $plan->details()->saveMany(factory(App\Models\DetailPlan::class, 3)->make());
        });;
    }
}
