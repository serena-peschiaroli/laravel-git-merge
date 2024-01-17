<?php

namespace Database\Seeders;

use App\Models\Cocktail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CocktailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $cocktails_name = ['negroni','white russian','manhattan','mojito','cuba libre','spritz'];

        $cocktails_colore=['rosso','arancione','verde','blu','trasparente'];

        for ($i=0; $i < 12 ; $i++) { 
         
            $cocktails = new Cocktail(); 
            $cocktails->nome = $faker->randomElement($cocktails_name);
            $cocktails->prezzo = $faker->numberBetween(7 , 17);
            $cocktails->descrizione = $faker->text(20);
            $cocktails->colore = $faker->randomElement($cocktails_colore);
            $cocktails->e_alcolico= $faker->boolean();
            $cocktails->save();
        }
    }
}
