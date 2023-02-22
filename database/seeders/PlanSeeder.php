<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Plano A',
            'url' => 'https://buy.stripe.com/test_00gaGm5OC2yc7fO144',
            'stripe_id' => 'price_1Me421HqIHT9Lt7SyXKzIJhp',
            'price' => '25,00',
            'recommended' => true,
            'description' => '',
        ]);
    }
}
