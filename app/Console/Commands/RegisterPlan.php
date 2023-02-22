<?php

namespace App\Console\Commands;

use App\Models\Plan;
use Illuminate\Console\Command;
use Stripe\Stripe;

class RegisterPlan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:RegisterPlan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the plan on the stripe and save it in the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Stripe::setApiKey(config('stripe.stripe_secret'));

        $name = $this->ask('Qual é o nome do plano?');
        $price = $this->ask('Qual é o preço?');
        $interval = $this->ask('Qual é o tipo de intervalo?');
        $recommended = $this->ask('Recomenda esse plano?', 0 || 'no');
        $description = $this->ask('Descreva o plano');

        $stripePlan = \Stripe\Plan::create([
            'amount' => $price,
            'interval' => $interval,
            'product' => [
                'name' => $name,
            ],
            'currency' => 'brl',
        ]);

        $plan = $this->plan($name, $price, $stripePlan, $recommended, $description);

        $this->info("{$plan->name} salvo com sucesso!!!");
        return 0;
    }

    private function plan($name, $price, $stripePlan, $recommended, $description)
    {
        $plan = new Plan();
        $plan->name = $name;
        $plan->url = $stripePlan->id;
        $plan->price = $price;
        $plan->stripe_id = $stripePlan->id;
        $plan->recomended = $recommended;
        $plan->description = $description;
        $plan->save();
        return $plan;
    }
}
