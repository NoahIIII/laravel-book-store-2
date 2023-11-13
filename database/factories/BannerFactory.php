<?php

namespace Database\Factories;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'status'=>'1',
            'image'=>$this->GetBannerImage(),
        ];
    }
    function GetBannerImage(){
        $accessKey = '7DbzzwnTRL3Ad8GgjHH6RkmyKTktFso5UdLBZTTLI4I';
        $searchQuery = 'e-commerce banner'; // You can customize the search query if needed

        $url = "https://api.unsplash.com/photos/random?client_id={$accessKey}&query={$searchQuery}&orientation=landscape";

        $client = new Client();
        $response = $client->get($url);

        $data = json_decode($response->getBody(), true);
        $imageUrl = $data['urls']['regular'];

        return $imageUrl;
    }
}
