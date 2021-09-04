<?php

namespace Database\Seeders;

use App\Models\Image;
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
        // Blouse category products
        $blousePathRoot = 'assets/images/women/blouses/';
        $blouseImages = [
                            ['strecova-bluzka/strecova-bluzka', 'strecova-bluzka/strecova-bluzka-1'],
                            [
                                'tricko-s-dlhym-rukavom-a-potlacou/tricko-s-dlhym-rukavom-a-s-poltacou-sovy',
                                'tricko-s-dlhym-rukavom-a-potlacou/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-1',
                                'tricko-s-dlhym-rukavom-a-potlacou/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-2',
                                'tricko-s-dlhym-rukavom-a-potlacou/tricko-s-dlhym-rukavom-a-s-poltacou-sovy-3',
                            ],
                            ['karovana-bavlnena-bluzka/karovana-bavlnena-bluzka', 'karovana-bavlnena-bluzka/karovana-bavlnena-bluzka-1'],
                            ['tricko-s-flitrami/tricko-s-flitrami-3-4-rukavy', 'tricko-s-flitrami/tricko-s-flitrami-3-4-rukavy-1'],
                            ['satenova-bluzka/satenova-bluzka', 'satenova-bluzka/satenova-bluzka-1']

                        ];

        $blouseProductsSize = 64;
        for($productId = 1; $productId <= $blouseProductsSize; $productId++) {
            $imagesPaths = $blouseImages[($productId - 1) % 5];
            foreach ($imagesPaths as $imagePath) {
                Image::create([
                    'product_id' => $productId,
                    'path' => $blousePathRoot.$imagePath
                ]);
            }
        }

        // Shirts category products
        $shirtsPathRoot = 'assets/images/men/shirts/';
        $shirtsImages = [
                            ['kosela-s-dlhym-rukavom-s-potlacou/kosela-s-dlhym-rukavom-s-potlacou', 'kosela-s-dlhym-rukavom-s-potlacou/kosela-s-dlhym-rukavom-s-potlacou-1'],
                            ['kosela-s-dlhym-rukavom/kosela-s-dlhym-rukavom', 'kosela-s-dlhym-rukavom/kosela-s-dlhym-rukavom-1'],
                            ['kosela/kosela', 'kosela/kosela-1'],
                            ['kosela-s-rukavmi-na-vyhnutie/kosela-s-rukavmi-na-vyhnutie', 'kosela-s-rukavmi-na-vyhnutie/kosela-s-rukavmi-na-vyhnutie-1'],
                            ['flanelova-kosela/flanelova-kosela', 'flanelova-kosela/flanelova-kosela-1']
                        ];

        $shirtProductsStart = 65;
        $shirtProductsEnd = 128;
        for($productId = $shirtProductsStart; $productId <= $shirtProductsEnd; $productId++) {
            $imagesPaths = $shirtsImages[($productId - 1) % 5];
            foreach ($imagesPaths as $imagePath) {
                Image::create([
                    'product_id' => $productId,
                    'path' => $shirtsPathRoot.$imagePath
                ]);
            }
        }

        // Tshirts kids category products
        $tshirtKidsPathRoot = 'assets/images/kids/t-shirts/';
        $tshirtKidsImages = [
                            ['tricko-s-dlhym-rukavom/tricko-s-dlhym-rukavom', 'tricko-s-dlhym-rukavom/tricko-s-dlhym-rukavom-1'],
                            ['vrstvene_tricko-bio-bavlna/vrstvene-tricko-bio-bavlna', 'vrstvene_tricko-bio-bavlna/vrstvene-tricko-bio-bavlna-1'],
                            ['pasikovane-tricko-s-dlhym-rukavom/pasikovane-tricko-s-dlhym-rukavom-s-potlacou', 'pasikovane-tricko-s-dlhym-rukavom/pasikovane-tricko-s-dlhym-rukavom-s-potlacou-1'],
                            ['vrstvene-tricko/vrstvene-tricko', 'vrstvene-tricko/vrstvene-tricko-1'],
                            ['sportove-tricko-pre-chlapcov/sportove-tricko-pre-chlapcov', 'sportove-tricko-pre-chlapcov/sportove-tricko-pre-chlapcov-1']
                        ];

        $tshirtKidsProductsStart = 129;
        $tshirtKidsProductsEnd = 144;
        for($productId = $tshirtKidsProductsStart; $productId <= $tshirtKidsProductsEnd; $productId++) {
            $imagesPaths = $tshirtKidsImages[($productId - 1) % 5];
            foreach ($imagesPaths as $imagePath) {
                Image::create([
                    'product_id' => $productId,
                    'path' => $tshirtKidsPathRoot.$imagePath
                ]);
            }
        }
    }
}
