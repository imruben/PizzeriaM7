<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiRequest\PizzaRequestController;

class PizzaController extends Controller
{

    public PizzaRequestController $pizzaRequest;

    public function __construct()
    {
        $this->pizzaRequest = new PizzaRequestController();
    }

    public function index()
    {
        $pizzas = $this->pizzaRequest->getAllPizzas();

        foreach ($pizzas as &$pizza) {
            $pizza['img'] = random_int(1, 7);
        }
        return view('index', [
            'pizzas' => $pizzas
        ]);
    }
}
