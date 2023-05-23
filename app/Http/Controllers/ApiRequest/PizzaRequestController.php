<?php

namespace App\Http\Controllers\ApiRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PizzaRequestController extends Controller
{

    private string $apikey;
    private string $apiurl;

    private const API_URL = '';

    public function __construct()
    {
        $this->apikey = env('TOKEN_API_KEY');
        $this->apiurl = env('API_URL');
    }


    public function getAllPizzas()
    {
        $response = Http::withToken($this->apikey)->get($this->apiurl . 'pizzas');
        return json_decode($response, true)['pizzas'];
    }

    public function getPizzaById(string $id)
    {
        $response = Http::withToken($this->apikey)->get($this->apiurl . 'pizzas/' . $id);
        return json_decode($response, true)['pizza'];
    }

    public function storePizza($name, $price, $amount): string
    {
        $json = json_encode([
            "name" => $name,
            "price" => $price,
            "amount" => $amount,
            "provider" => 1
        ]);

        $response = Http::withToken($this->apikey)->withBody($json)->post($this->apiurl . 'pizzas');
        return $response->body();
    }

    public function updatePizza($id, $name, $price, $amount): string
    {
        $json = json_encode([
            "id" => $id,
            "name" => $name,
            "price" => $price,
            "amount" => $amount,
        ]);

        $response = Http::withToken($this->apikey)->withBody($json)->put($this->apiurl . 'pizzas');
        return $response->body();
    }

    public function deletePizza(string $id): string
    {
        $response = Http::withToken($this->apikey)->delete($this->apiurl . 'pizzas/' . $id);
        return $response->body();
    }
}
