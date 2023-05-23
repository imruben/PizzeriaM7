<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiRequest\PizzaRequestController;
use Illuminate\Support\Facades\Session;

class PizzaController extends Controller
{

    private PizzaRequestController $pizzaRequest;

    public function __construct()
    {
        $this->pizzaRequest = new PizzaRequestController();
    }

    public function index()
    {
        $pizzas = $this->pizzaRequest->getAllPizzas();

        return view('index', [
            'pizzas' => $pizzas
        ]);
    }

    public function addPizzaToCart(int $pizzaid)
    {
        $pizzasInCartSession = Session::get('cart');

        if ($pizzasInCartSession == null) {
            $pizzasInCartSession = [];
        }
        array_push($pizzasInCartSession, $pizzaid);

        Session::put('cart', $pizzasInCartSession);

        return redirect(route("pizzas.index"));
    }

    public function deletePizzaFromCart(int $indexpizza)
    {

        $pizzasInCartSession = Session::get('cart');

        array_splice($pizzasInCartSession, $indexpizza, 1);

        Session::put('cart', $pizzasInCartSession);

        return redirect(route("cart.index"));
    }

    public function clearAllPizzasFromCart()
    {
        Session::forget('cart');

        return redirect(route("cart.index"));
    }
}
