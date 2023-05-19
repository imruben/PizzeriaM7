<?php

namespace App\Http\Controllers\ApiRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PizzaRequestController extends Controller
{

    private const TOKEN_API_KEY = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiY2QwMzUyMWE5MDEyYzY2ODQ4OWIzZmRlZTE3NDBhMGRlNWIxZDNmYTJjNDliZjY2MTEzOGE1YWUzODZiYmY2ZjgxYjMwOTZkNDNjZGU0ODgiLCJpYXQiOjE2ODQxODU3MDguODEyNzkxLCJuYmYiOjE2ODQxODU3MDguODEyNzk0LCJleHAiOjE3MTU4MDgxMDguNzgyNzY1LCJzdWIiOiIyNCIsInNjb3BlcyI6W119.yu5g3y0O9otKl121_5tFaIqPgXNMMvgeIqPZnQXDnK5NMWVcyXhH--XCYNKvMj193w78D-sK1xtQEp9R6I5P6MO_m-ccTR0Ywuit1GYzUBopeHPGB7Um9_Nkis98iuQOfb1DolhonoeMhUZVZXfRqpd4Bfrex7thLraKegbQWKtd4uNpMaaueEnirIY149MtNIqmmiMQ6460cZKanAe1pNaxWxofZTUXnTL8tWrckBIqLMkgnrOTPZNbHLOlK9evSDf5ABpcc0SY3-Z3ELgH-Phd5Q7V4HjgqzipW9FNxC4BNvd6Fy5epDW72z9pRngZRd76jbyVXEQ2iERXPpapizbJA6nNRwhP9J0P1sEavUvDIbT8317UIwsDoGv9OmQUWntEnCE2FKaUiC2rpkqb0txPwDrHmPKfLhRqa5saIyvwesNjgDM9ngntd_rfEVMPVGPu4Fq9eKzDGNsRFOCBIcXCgk45OVN1PhIBSvAnfHMVMddx-VMYWIYOxwtcP5FkKiprT8pzQBM-BjMkoxMkkJwI3Yublj3RTr9Rsf0Y-cKZlfjviFUauO4w92g1gbignW9VqKqu87TxakY1ByjEohqkL0GjB4ZFKlVYDXczAhAkBO5Q6reMlL9DeBNoYbAurI4M1GSGAA6OdNxul-t1p1IzF24ILSKqMdwvVMl0apU';

    private const API_URL = 'https://pedantic-taussig.82-223-123-69.plesk.page/api/';


    public function getAllPizzas()
    {
        $response = Http::withToken(self::TOKEN_API_KEY)->get(self::API_URL . 'pizzas');
        return json_decode($response, true)['pizzas'];
    }

    public function getPizzaById(string $id)
    {
        $response = Http::withToken(self::TOKEN_API_KEY)->get(self::API_URL . 'pizzas/' . $id);
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

        $response = Http::withToken(self::TOKEN_API_KEY)->withBody($json)->post(self::API_URL . 'pizzas');
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

        $response = Http::withToken(self::TOKEN_API_KEY)->withBody($json)->put(self::API_URL . 'pizzas');
        return $response->body();
    }

    public function deletePizza(string $id): string
    {
        $response = Http::withToken(self::TOKEN_API_KEY)->delete(self::API_URL . 'pizzas/' . $id);
        return $response->body();
    }
}
