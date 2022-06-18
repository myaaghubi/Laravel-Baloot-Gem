<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gem;
use App\Models\GemTransaction;

class GemTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GemTransaction::truncate();
        $gems = Gem::all();

        foreach ($gems as $gem) {
            $transactionsCnt = rand(0, 30);
            GemTransaction::factory($transactionsCnt)->create([
                'gem_id' => $gem->id,
                'user_id' => $gem->user->id,
            ]);

            $gemsAmount = $gem->gems;
            if ($gemsAmount==0 && $transactionsCnt==0) {
                GemTransaction::where('gem_id', $gem->id)->delete();
            } else {
                $gemsAmountFinal = $gemsAmount - GemTransaction::where('gem_id', $gem->id)->sum('amount');
                GemTransaction::factory(1)->create([
                    'gem_id' => $gem->id,
                    'user_id' => $gem->user->id,
                    'amount' => $gemsAmountFinal,
                ]);
            }
        }
    }
}
