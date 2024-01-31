<?php

namespace Database\Seeders;

use App\Models\Cocktail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class CocktailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $rows = $this->getData();

        foreach ($rows as $row) {
            $cocktail = new Cocktail();
            $cocktail->name        = $row->strDrink;
            $cocktail->glass_type  = $row->strGlass;
            $cocktail->instruction = $row->strInstructionsIT;
            $cocktail->image       = $row->strDrinkThumb;
            $cocktail->price       = $faker->numberBetween(4,20);
            $cocktail->save();
        }
    }

    protected function getData(int $total=10) {
        $rows   = [];
        $url    = 'https://thecocktaildb.com/api/json/v1/1/random.php';
        $client = new Client(['verify' => false]);

        for ($i=0; $i < $total; $i++) { 
            $response = $client->get($url);
            $row      = json_decode($response->getBody());
           
            $rows     = [...$rows, ...$row->drinks];
        }
        return $rows;
    }
}
