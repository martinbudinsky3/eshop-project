<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsTableSeeder extends Seeder
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
        $tshirtsKidsNames = ['Tričko s dlhým rukávom', 'Vrstvené tričko bio bavlna', 'Pásikované tričko s dlhým rukávom s potlačou', 'Vrstvené tričko', 'Športové tričko pre chlapcov',
                            'Športové tričko s kapucňou', 'Tričko s kapucňou', 'Emoji tričko s dlhým rukávom'];

        $descriptionBlouses1 = "Skvelá priľnavá blúzka s čipkovaným lemovaním, mäkká bavlna je veľmi príjemná pri nosení a dobre drží tvar. Pohodlná blúzka sa skvelo hodí k elegantným čiernym nohaviciam či sukni.";
        $descriptionBlouses2 = "Pohodlné dlhé tričko, s okrúhlym výstrihom, vyrobené z bavlny. Tričko sa perfektne hodí, k čiernym nohaviciam alebo k džínsom.";
        $descriptionShirts1 = "Pohodlná košeľa vyrobená z bavlny. Výborne sa hodí s tmavými nohavicami alebo džínsami. Pod košeľou dobre vyznie biele tričko.";
        $descriptionShirts2 = "Elegantná košeľa vyrobená z bavlny. Košeľa je vhodná aj na formálne príležitosti, perfektne sa hodí s čiernym nohavicami a sakom.";
        $descriptionTshirtsKids1 = "Tričko, ktoré vaše dieťa nebude chcieť prestať nosiť. Materiál je príjemný na nosenie a hravý vzor poteší vaše dieťa.";
        $descriptionTshirtsKids2 = "Originálne tričko, ktoré sa bude vášmu dieťaťu páčiť. Príjemný materiál zabezpečí, že vaše dieťa sa bude v tričku cítíť pohodlne";
        
        $materials = ['bavlna 100%', 'bavlna 95%, polyester 5%', 'bavlna 80%, polyester 15%, elastan 5%'];

        $id = 1;
        // Generate women blouses products
        $blousesDescriptions = [$descriptionBlouses1, $descriptionBlouses2];

        for ($i=0; $i < 4; $i++) {
            for ($j=0; $j < sizeof($blousesNames); $j++) {
                DB::table('products')->insert([
                    'id' => $id++,
                    'name' => $blousesNames[$j],
                    'price' => mt_rand(5, 30) - 0.01,
                    'brand_id' => mt_rand(1, 6),
                    'description' => $blousesDescriptions[mt_rand(0, 1)],
                    'material' => $materials[mt_rand(0, 2)],
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),               
                ]);
            }
        }

        // Generate men shirts products
        $shirtsDescriptions = [$descriptionShirts1, $descriptionShirts2];

        for ($i=0; $i < 4; $i++) {
            for ($j=0; $j < sizeof($shirtsNames); $j++) {
                DB::table('products')->insert([
                    'id' => $id++,
                    'name' => $shirtsNames[$j],
                    'price' => mt_rand(5, 50) - 0.01,
                    'brand_id' => mt_rand(1, 6),
                    'description' => $shirtsDescriptions[mt_rand(0, 1)],
                    'material' => $materials[mt_rand(0, 2)],
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),               
                ]);
            }
        }

        // Generate men shirts products
        $kidsTshirtsDescriptions = [$descriptionTshirtsKids1, $descriptionTshirtsKids2];

        for ($i=0; $i < 2; $i++) {
            for ($j=0; $j < sizeof($tshirtsKidsNames); $j++) {
                DB::table('products')->insert([
                    'id' => $id++,
                    'name' => $tshirtsKidsNames[$j],
                    'price' => mt_rand(5, 30) - 0.01,
                    'brand_id' => mt_rand(1, 9),
                    'description' => $kidsTshirtsDescriptions[mt_rand(0, 1)],
                    'material' => $materials[mt_rand(0, 2)],
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),               
                ]);
            }
        }
    }
}
