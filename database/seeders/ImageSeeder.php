<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;

        // Blouse category products

        $blousePathRoot = 'assets/images/women/blouses/';
        $blouseImages = [
                            [$blousePathRoot.'strecova-bluzka/strecova-bluzka', $blousePathRoot.'strecova-bluzka/strecova-bluzka-1'],
                            [
                                $blousePathRoot.'tricko-s-dlhym-rukavom-a-potlacou/tricko-s-dlhym-rukavom-a-s-poltacou-sovy',
                                $blousePathRoot.'tricko-s-dlhym-rukavom-a-potlacou/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-1',
                                $blousePathRoot.'tricko-s-dlhym-rukavom-a-potlacou/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-2',
                                $blousePathRoot.'tricko-s-dlhym-rukavom-a-potlacou/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-3',
                            ],
                            [$blousePathRoot.'karovana-bavlnena-bluzka/karovana-bavlnena-bluzka', $blousePathRoot.'karovana-bavlnena-bluzka/karovana-bavlnena-bluzka-1'],
                            [$blousePathRoot.'tricko-s-flitrami/tricko-s-flitrami-3-4-rukavy', $blousePathRoot.'tricko-s-flitrami/tricko-s-flitrami-3-4-rukavy-1'],
                            [$blousePathRoot.'satenova-bluzka/satenova-bluzka', $blousePathRoot.'satenova-bluzka/satenova-bluzka-1'] 

                        ];

        $blouseProductsSize = 64;

        for($productId = 1; $productId <= $blouseProductsSize; $productId++) {

            $imagesPaths = $blouseImages[($productId - 1) % 5];
            foreach ($imagesPaths as $imagePath) {
                DB::table('images')->insert([
                    [
                        'id' => $id++,
                        'product_id' => $productId,
                        'path' => $imagePath,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s'),
                    ],
                ]);
            }
        }

        // Shirts category products

        $shirtsPathRoot = 'assets/images/men/shirts/';
        $shirtsImages = [
                            [$shirtsPathRoot.'kosela-s-dlhym-rukavom-s-potlacou/kosela-s-dlhym-rukavom-s-potlacou', $shirtsPathRoot.'kosela-s-dlhym-rukavom-s-potlacou/kosela-s-dlhym-rukavom-s-potlacou-1'],
                            [$shirtsPathRoot.'kosela-s-dlhym-rukavom/kosela-s-dlhym-rukavom', $shirtsPathRoot.'kosela-s-dlhym-rukavom/kosela-s-dlhym-rukavom-1'],
                            [$shirtsPathRoot.'kosela/kosela', $shirtsPathRoot.'kosela/kosela-1'],
                            [$shirtsPathRoot.'kosela-s-rukavmi-na-vyhnutie/kosela-s-rukavmi-na-vyhnutie', $shirtsPathRoot.'kosela-s-rukavmi-na-vyhnutie/kosela-s-rukavmi-na-vyhnutie-1'],
                            [$shirtsPathRoot.'flanelova-kosela/flanelova-kosela', $shirtsPathRoot.'flanelova-kosela/flanelova-kosela-1'] 

                        ];

        $shirtProductsStart = 65;
        $shirtProductsEnd = 128;

        for($productId = $shirtProductsStart; $productId <= $shirtProductsEnd; $productId++) {

            $imagesPaths = $shirtsImages[($productId - 1) % 5];
            foreach ($imagesPaths as $imagePath) {
                DB::table('images')->insert([
                    [
                        'id' => $id++,
                        'product_id' => $productId,
                        'path' => $imagePath,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s'),
                    ],
                ]);
            }
        }

        // Tshirts kids category products

        $tshirtKidsPathRoot = 'assets/images/kids/t-shirts/';
        $tshirtKidsImages = [
                            [$tshirtKidsPathRoot.'tricko-s-dlhym-rukavom/tricko-s-dlhym-rukavom', $tshirtKidsPathRoot.'tricko-s-dlhym-rukavom/tricko-s-dlhym-rukavom-1'],
                            [$tshirtKidsPathRoot.'vrstvene_tricko-bio-bavlna/vrstvene-tricko-bio-bavlna', $tshirtKidsPathRoot.'vrstvene_tricko-bio-bavlna/vrstvene-tricko-bio-bavlna-1'],
                            [$tshirtKidsPathRoot.'pasikovane-tricko-s-dlhym-rukavom/pasikovane-tricko-s-dlhym-rukavom-s-potlacou', $tshirtKidsPathRoot.'pasikovane-tricko-s-dlhym-rukavom/pasikovane-tricko-s-dlhym-rukavom-s-potlacou-1'],
                            [$tshirtKidsPathRoot.'vrstvene-tricko/vrstvene-tricko', $tshirtKidsPathRoot.'vrstvene-tricko/vrstvene-tricko-1'],
                            [$tshirtKidsPathRoot.'sportove-tricko-pre-chlapcov/sportove-tricko-pre-chlapcov', $tshirtKidsPathRoot.'sportove-tricko-pre-chlapcov/sportove-tricko-pre-chlapcov-1'] 

                        ];

        $tshirtKidsProductsStart = 129;
        $tshirtKidsProductsEnd = 144;

        for($productId = $tshirtKidsProductsStart; $productId <= $tshirtKidsProductsEnd; $productId++) {

            $imagesPaths = $tshirtKidsImages[($productId - 1) % 5];
            foreach ($imagesPaths as $imagePath) {
                DB::table('images')->insert([
                    [
                        'id' => $id++,
                        'product_id' => $productId,
                        'path' => $imagePath,
                        'created_at'=>date('Y-m-d H:i:s'),
                        'updated_at'=>date('Y-m-d H:i:s'),
                    ],
                ]);
            }
        }
    }
}
