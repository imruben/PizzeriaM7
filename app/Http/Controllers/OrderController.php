<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ApiRequest\PizzaRequestController;

class OrderController extends Controller
{

    private PizzaRequestController $pizzaRequest;

    public function __construct()
    {
        $this->pizzaRequest = new PizzaRequestController();
    }

    public function index()
    {
        return view('order.index', [
            'orders' => Order::all()
        ]);
    }

    public function store()
    {
        $pizzasInCartSession = Session::get('cart');
        $totalprice = 0;

        if (null !== $pizzasInCartSession) {
            foreach ($pizzasInCartSession as $pizzaid) {
                $pizza = $this->pizzaRequest->getPizzaById($pizzaid);
                $totalprice += $pizza['price'];
            }
        }

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->totalprice = $totalprice;
        $order->save();

        Session::forget('cart');

        return redirect(route('order.index'));
    }
}
