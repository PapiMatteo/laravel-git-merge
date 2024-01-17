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
     */
    public function run(Faker $faker): void
    {
        $names = ['Daiquiri', 'Negroni', 'Gin Fizz', 'Mint Julep', 'Margarita', 'Martini', 'Rob Roy', 'Moscow Mule'];
        $glasses = ['Collins', 'Old Fashioned', 'Nick & Nora'];
        $difficulty = ['hard', 'medium', 'easy'];




        foreach ($names as $name) {
            $cocktail = new Cocktail();
            $cocktail->name = $name;
            $cocktail->price = $faker->numberBetween(4, 20);
            $cocktail->prep_time = $faker->numberBetween(0, 15);;
            $cocktail->glass_type = $faker->randomElement($glasses);
            $cocktail->prep_difficulty = $faker->randomElement($difficulty);

            // dd($cocktail);
            $cocktail->save();
        }






        // $cocktail = new Cocktail();
        // $cocktail->name = 'Daiquiri';
        // $cocktail->price = 10;
        // $cocktail->prep_time = ;
        // $cocktail->glass_type = 'Nick & Nora';
        // $cocktail->prep_difficulty = 'medium';
        // $cocktail->save();

        // $cocktail = new Cocktail();
        // $cocktail->name = 'Negroni';
        // $cocktail->price = 8;
        // $cocktail->prep_time = ;
        // $cocktail->glass_type = 'Old Fashioned';
        // $cocktail->prep_difficulty = 'easy';
        // $cocktail->save();

        // $cocktail = new Cocktail();
        // $cocktail->name = 'Mint Julep';
        // $cocktail->price = 12;
        // $cocktail->prep_time = ;
        // $cocktail->glass_type = 'Julep Cup';
        // $cocktail->prep_difficulty = 'hard';
        // $cocktail->save();

        // $cocktail = new Cocktail();
        // $cocktail->name = 'Gin Fizz';
        // $cocktail->price = 10;
        // $cocktail->prep_time = ;
        // $cocktail->glass_type = 'Collins';
        // $cocktail->prep_difficulty = 'medium';
        // $cocktail->save();

    }
}
