<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiRequest\PizzaRequestController;
use Illuminate\Http\Request;

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

        return view('admin.index', [
            'pizzas' => $pizzas
        ]);
    }

    public function create()
    {
        return view('admin.createPizza');
    }

    public function store(Request $request)
    {
        $this->pizzaRequest->storePizza($request->name, $request->price, $request->amount);

        return redirect(route("admin.index"));
    }

    public function edit(string $id)
    {
        $pizza = $this->pizzaRequest->getPizzaById($id);

        return view('admin.updatePizza', [
            'pizza' => $pizza
        ]);
    }

    public function update(Request $request, int $id)
    {
        $this->pizzaRequest->updatePizza($id, $request->name, $request->price, $request->amount);

        return redirect(route("admin.index"));
    }


    public function destroy(string $id)
    {
        $this->pizzaRequest->DeletePizza($id);

        return redirect(route("admin.index"));
    }
}
