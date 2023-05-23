<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ApiRequest\PizzaRequestController;

class CartController extends Controller
{

    private PizzaRequestController $pizzaRequest;

    public function __construct()
    {
        $this->pizzaRequest = new PizzaRequestController();
    }

    public function index()
    {
        $pizzasInCartSession = Session::get('cart');

        $pizzas = [];
        if (null !== $pizzasInCartSession) {
            foreach ($pizzasInCartSession as $pizzaid) {
                array_push($pizzas, $this->pizzaRequest->getPizzaById($pizzaid));
            }
        }

        return view('cart.index', [
            'pizzasInCart' => $pizzas
        ]);
    }
}
