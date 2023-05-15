<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PizzaController extends Controller
{
    private const TOKEN_API_KEY = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiY2QwMzUyMWE5MDEyYzY2ODQ4OWIzZmRlZTE3NDBhMGRlNWIxZDNmYTJjNDliZjY2MTEzOGE1YWUzODZiYmY2ZjgxYjMwOTZkNDNjZGU0ODgiLCJpYXQiOjE2ODQxODU3MDguODEyNzkxLCJuYmYiOjE2ODQxODU3MDguODEyNzk0LCJleHAiOjE3MTU4MDgxMDguNzgyNzY1LCJzdWIiOiIyNCIsInNjb3BlcyI6W119.yu5g3y0O9otKl121_5tFaIqPgXNMMvgeIqPZnQXDnK5NMWVcyXhH--XCYNKvMj193w78D-sK1xtQEp9R6I5P6MO_m-ccTR0Ywuit1GYzUBopeHPGB7Um9_Nkis98iuQOfb1DolhonoeMhUZVZXfRqpd4Bfrex7thLraKegbQWKtd4uNpMaaueEnirIY149MtNIqmmiMQ6460cZKanAe1pNaxWxofZTUXnTL8tWrckBIqLMkgnrOTPZNbHLOlK9evSDf5ABpcc0SY3-Z3ELgH-Phd5Q7V4HjgqzipW9FNxC4BNvd6Fy5epDW72z9pRngZRd76jbyVXEQ2iERXPpapizbJA6nNRwhP9J0P1sEavUvDIbT8317UIwsDoGv9OmQUWntEnCE2FKaUiC2rpkqb0txPwDrHmPKfLhRqa5saIyvwesNjgDM9ngntd_rfEVMPVGPu4Fq9eKzDGNsRFOCBIcXCgk45OVN1PhIBSvAnfHMVMddx-VMYWIYOxwtcP5FkKiprT8pzQBM-BjMkoxMkkJwI3Yublj3RTr9Rsf0Y-cKZlfjviFUauO4w92g1gbignW9VqKqu87TxakY1ByjEohqkL0GjB4ZFKlVYDXczAhAkBO5Q6reMlL9DeBNoYbAurI4M1GSGAA6OdNxul-t1p1IzF24ILSKqMdwvVMl0apU';


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . self::TOKEN_API_KEY,

        ])->get('https://pedantic-taussig.82-223-123-69.plesk.page/api/pizzas');

        $pizzas = json_decode($response, true)['pizzas'];

        return view('index', [
            'pizzas' => $pizzas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
