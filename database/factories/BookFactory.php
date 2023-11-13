<?php

namespace Database\Factories;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->word(),
            'author'=> $this->faker->name(),
            'description'=> $this->faker->text(),
            'price'=> $this->faker->numberBetween(50,300),
            'discount'=>$this->faker->numberBetween(5,25),
            'category_id'=>'1',
            'price_after_discount'=>$this->faker->numberBetween(50,250),
            'image'=>$this->GetBookImage(),
            'stock'=>$this->faker->numberBetween(1,10),
            'status'=>'1',
            'code'=>rand(10000,20000),
            'best_seller'=>$this->faker->numberBetween(1,20),
            'number_of_pages'=>$this->faker->numberBetween(100,500),
            'created_at'=>now(),
            'updated_at'=>now(),
    ];
    }
    function GetBookImage(){
        $accessKey = '7DbzzwnTRL3Ad8GgjHH6RkmyKTktFso5UdLBZTTLI4I';
        $searchQuery = 'book cover'; // You can customize the search query if needed

        $url = "https://api.unsplash.com/photos/random?client_id={$accessKey}&query={$searchQuery}&orientation=landscape";

        $client = new Client();
        $response = $client->get($url);

        $data = json_decode($response->getBody(), true);
        $imageUrl = $data['urls']['regular'];

        return $imageUrl;
    }
}
