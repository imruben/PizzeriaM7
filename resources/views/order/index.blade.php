<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cart
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex content-center	justify-center">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                User
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Order Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $order['user_id'] }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $order['totalprice'] }}€
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {{ $order['created_at']->format('d/m - H:i') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>