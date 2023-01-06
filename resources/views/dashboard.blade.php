<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="sm:px-6 lg:px-8 max-w-7xl mx-auto mt-5">
            <div class="overflow-x-auto relative">
        <a href="{{ url('/nilai') }}" class="inline-flex shadow-lg my-5 py-2 px-6 bg-slate-800 text-white hover:text-slate-800 hover:bg-white">Create Nilai</a>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Npm
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Nama
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Mata Kuliah
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Semester
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Nilai
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nilai as $data)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data['npm'] }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ $data['nama'] }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $data['npm'] }}
                                </td>
                                <td class="py-4 px-2">
                                    {{ $data['matkul'] }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $data['nilai'] }}
                                </td>
                                <td class="py-4 px-6 flex">
                                    <a class="px-6 py-2 bg-gray-900 hover:text-slate-600 hover:bg-white"
                                        href="/nilai/{{ $data['id'] }}">Edit</a>
                                    <form method="POST" action="/nilai/{{ $data['id'] }}"
                                        class="ml-4">
                                        @csrf
                                        @method('delete')
                                        <button class="px-6 py-2 bg-red-900 hover:text-slate-600 hover:bg-white"
                                            href="{{ url('http://127.0.0.1:8000/api/nilai/'). $data['id'] }}">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>