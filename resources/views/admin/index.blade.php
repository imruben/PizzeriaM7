<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pizzas ADMIN
        </h2>
    </x-slot>


    <div class="py-8 flex flex-col justify-center items-center">
        <a href="{{ route('admin.create') }}" type="button" class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mb-4">
            Create a pizza
        </a>
        <div class="w-3/6 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Delete
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pizzas as $pizza)
                    <tr class="bg-white border-b ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $pizza['id'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $pizza['name'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pizza['price'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pizza['amount'] }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.edit', $pizza['id']) }}" class="font-medium text-blue-600  hover:underline">Edit</a>
                        </td>
                        <form action="{{ route('admin.destroy', $pizza['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td class="px-6 py-4">
                                <button type="submit" class="font-medium text-red-600  hover:underline">Delete</button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>