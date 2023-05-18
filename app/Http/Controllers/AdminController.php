<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiRequest\PizzaRequestController;

class AdminController extends Controller
{
    public PizzaRequestController $pizzaRequest;

    public function __construct()
    {
        $this->pizzaRequest = new PizzaRequestController();
    }

    public function index()
    {
        $pizzas = $this->pizzaRequest->GetAllPizzas();

        return view('admin.pizzas', [
            'pizzas' => $pizzas
        ]);
    }
}
