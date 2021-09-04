<?php

namespace Database\Seeders;

use App\Models\Transport;
use Illuminate\Database\Seeder;

class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transport::insert([
            [
                'name' => 'Osobný odber',
                'price' => 0
            ],
            [
                'name' => 'Doručenie kuriérom',
                'price' => 4.60
            ],
            [
                'name' => 'Pošta',
                'price' => 1.70
            ]
        ]);
    }
}
