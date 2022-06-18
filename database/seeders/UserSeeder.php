<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Gem;
use App\Models\GemTransaction;
use App\Enums\GemTransactionTagEnum;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Gem::truncate();

        User::factory(50)->create()->each(function($user) {
            $gemsAmount = rand(0, 100);
            Gem::factory(1)->create([
                'user_id' => $user->id,
                'gems' => $gemsAmount
            ]);
        });
    }
}
