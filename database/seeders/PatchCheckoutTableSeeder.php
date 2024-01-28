<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Checkout;

class PatchCheckoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $checkouts = Checkout::whereTotal(0)->get();
        foreach ($checkouts as $key => $checkout) {
            $checkout->update([
                'total' => $checkout->Camp->price
            ]);
        }
    }
}
