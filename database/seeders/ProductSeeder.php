<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blousesNames = ['Strečová blúzka', 'Tričko s dlhým rukávom a potlačou', 'Károvaná bavlnená blúzka', 'Tričko s filtrami', 'Saténová blúzka',
                        'Dlhá blúzka', 'Dlhá blúzka s potlačou', 'Tričko s dlhým rukávom', 'Blúzka so širokými rukávmi', 'Vrúbkované tričko s čipkou',
                        'Tričko s dlhým rukávom a potlačou', 'Tričko s gombíkovou légou', 'Materské tričko', 'Tričko, 3/4 rukáv', 'Tričko so šnúrovačkou',
                        'Tričko s kapucňou'];
        $shirtsNames = ['Košeľa s dlhým rukávom s potlačou', 'Košeľa s dlhým rukávom', 'Košeľa', 'Košeľa s rukávmi na vyhnutie',
                        'Flanelová košeľa', 'Kordová košeľa', 'Košeľa s minimálnym vzorom', 'Košeľa s dlhým rukávom', 'Strečová košeľa', 'Košeľa Slim Fit',
                        'Košeľa s kravatovým vzorom', 'Košeľa s grafickou potlačou', 'Elegantná košeľa', 'Košeľa', 'Flanelová košeľa', 'Košeľa s dlhým rukávom'];
        $tShirtsKidsNames = ['Tričko s dlhým rukávom', 'Vrstvené tričko bio bavlna', 'Pásikované tričko s dlhým rukávom s potlačou', 'Vrstvené tričko', 'Športové tričko pre chlapcov',
                            'Športové tričko s kapucňou', 'Tričko s kapucňou', 'Emoji tričko s dlhým rukávom'];

        $descriptionBlouses1 = "Skvelá priľnavá blúzka s čipkovaným lemovaním, mäkká bavlna je veľmi príjemná pri nosení a dobre drží tvar. Pohodlná blúzka sa skvelo hodí k elegantným čiernym nohaviciam či sukni.";
        $descriptionBlouses2 = "Pohodlné dlhé tričko, s okrúhlym výstrihom, vyrobené z bavlny. Tričko sa perfektne hodí, k čiernym nohaviciam alebo k džínsom.";
        $descriptionShirts1 = "Pohodlná košeľa vyrobená z bavlny. Výborne sa hodí s tmavými nohavicami alebo džínsami. Pod košeľou dobre vyznie biele tričko.";
        $descriptionShirts2 = "Elegantná košeľa vyrobená z bavlny. Košeľa je vhodná aj na formálne príležitosti, perfektne sa hodí s čiernym nohavicami a sakom.";
        $descriptionTshirtsKids1 = "Tričko, ktoré vaše dieťa nebude chcieť prestať nosiť. Materiál je príjemný na nosenie a hravý vzor poteší vaše dieťa.";
        $descriptionTshirtsKids2 = "Originálne tričko, ktoré sa bude vášmu dieťaťu páčiť. Príjemný materiál zabezpečí, že vaše dieťa sa bude v tričku cítíť pohodlne";

        $materials = ['bavlna 100%', 'bavlna 95%, polyester 5%', 'bavlna 80%, polyester 15%, elastan 5%'];

        // Generate women blouses products
        $blousesDescriptions = [$descriptionBlouses1, $descriptionBlouses2];
        for ($i = 0; $i < 4; $i++) {
            foreach ($blousesNames as $blouseName) {
                Product::create([
                    'name' => $blouseName,
                    'price' => mt_rand(5, 30) - 0.01,
                    'brand_id' => mt_rand(1, 6),
                    'description' => $blousesDescriptions[mt_rand(0, 1)],
                    'material' => $materials[mt_rand(0, 2)]
                ]);

            }
        }

        // Generate men shirts products
        $shirtsDescriptions = [$descriptionShirts1, $descriptionShirts2];
        for ($i = 0; $i < 4; $i++) {
            foreach ($shirtsNames as $shirtsName) {
                Product::create([
                    'name' => $shirtsName,
                    'price' => mt_rand(5, 30) - 0.01,
                    'brand_id' => mt_rand(1, 6),
                    'description' => $shirtsDescriptions[mt_rand(0, 1)],
                    'material' => $materials[mt_rand(0, 2)]
                ]);
            }
        }

        // Generate men shirts products
        $kidsTshirtsDescriptions = [$descriptionTshirtsKids1, $descriptionTshirtsKids2];
        for ($i = 0; $i < 2; $i++) {
            foreach ($tShirtsKidsNames as $tShirtsKidsName) {
                Product::create([
                    'name' => $tShirtsKidsName,
                    'price' => mt_rand(5, 30) - 0.01,
                    'brand_id' => mt_rand(7, 9),
                    'description' => $kidsTshirtsDescriptions[mt_rand(0, 1)],
                    'material' => $materials[mt_rand(0, 2)]
                ]);
            }
        }
    }
}
