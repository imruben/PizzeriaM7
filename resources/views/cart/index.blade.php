<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col content-center justify-center items-center">
            @if (count($pizzasInCart) == 0)
            <h3>Empty cart</h3>
            @else
            <div class="flex content-center justify-center items-center mb-5">
                <form action="{{ route('order.store') }}" class="mr-5" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Pay</button>
                </form>
                <div>
                    <a href="{{ route('cart.clearAllPizzasFromCart') }}" class="text-white text bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Clear Cart</a>
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Image</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($indexpizza = 0)
                        @foreach($pizzasInCart as $pizza)
                        <tr class="bg-white border-b">
                            <td class="w-32 p-4">
                                <img src="{{ asset('img/pizza_default.png') }}" alt="Apple Watch">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $pizza['name'] }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $pizza['price'] }}€
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('cart.deletePizzaFromCart',  $indexpizza) }}" class="" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="font-medium text-red-600 hover:underline">Remove</a>
                                </form>
                            </td>
                        </tr>
                        @php($indexpizza++)
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>