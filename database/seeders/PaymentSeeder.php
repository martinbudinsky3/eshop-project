<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Payment::insert([
            [
                'name' => 'Kartou online',
                'price' => 0
            ],
            [
                'name' => 'VúB e-platby',
                'price' => 0
            ],
            [
                'name' => 'Platba kuriérovi',
                'price' => 3.60
            ],
            [
                'name' => 'Bankový prevod',
                'price' => 0
            ],
            [
                'name' => 'Kredit',
                'price' => 0
            ]
        ]);
    }
}
