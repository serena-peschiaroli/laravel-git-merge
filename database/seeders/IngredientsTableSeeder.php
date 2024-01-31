<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $ingredients_name = ['Gin','Brandy','Succo di Arancia','Bitter','Vodka','Tonica','Succo alla Pesca'];

        foreach ($ingredients_name as $ingredient) {
            $new_ingredient = new Ingredient();
            $new_ingredient->nome = $ingredient;
            $new_ingredient->quantita_cl = $faker->numberBetween(1,50);
            $new_ingredient->save();
        }
    }
}
