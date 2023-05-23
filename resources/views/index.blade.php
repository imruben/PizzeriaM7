<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pizzas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-4 gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">

            @foreach($pizzas as $pizza)
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img class="p-8 rounded-t-lg" src="{{ asset('img/pizza_default.png') }}" alt="product image" />
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $pizza['name'] }}</h5>
                    </a>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-3xl font-bold text-gray-900">{{ $pizza['price'] }}€</span>
                        <form action="{{ route('cart.addPizzaToCart', ['pizza' => $pizza['id']]) }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add to cart</a>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>