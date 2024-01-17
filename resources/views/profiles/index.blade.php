<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Customer List</title>
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>

<div class="container mx-auto mt-10 mb-10 px-10">
    <div class="grid grid-cols-8 gap-4 mb-4 p-5">
        <div class="col-span-4 mt-2">
            <h1 class="text-3xl font-bold">
                CUSTOMER LIST
            </h1>
        </div>
        <div class="col-span-4">
            <div class="flex justify-end">
                <a href="{{ route('profile.create') }}"
                   class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                   id="add-post-btn">+ Create New Customer</a>
            </div>
        </div>
    </div>
    <div class="bg-white p-5">
        <!-- Notifikasi menggunakan flash session data -->
        @if (session('success'))
            <div class="p-3 rounded bg-green-500 text-green-100 mb-4">
                {{ session('success') }}
            </div>
        @endif
    </div>
        <div class="col-span-4 mb-5">
            <div class="flex justify-end">
            <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="search" id="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search ..." required>
            </div>
            </div>
        </div>
        <table class="min-w-full table-auto border" id="customerTable">
            <thead class="border-b">
            <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">First Name</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Last Name</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Date of Birth</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Email</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Phone Number</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">KTP Number</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Create At</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($profiles as $profile)
                <tr class="border-b">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $profile->first_name }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{ $profile->last_name  }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{ $profile->birth_date  }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{ $profile->email_address  }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{ $profile->phone_number  }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{ $profile->ktp_number  }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{ $profile->created_at->format('d-m-Y') }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">

                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                              action="{{ route('profile.destroy', $profile->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            <a href="{{ route('profile.edit', $profile->id) }}" id="{{ $profile->id }}-edit-btn"
                               class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Edit</a>

                            <button type="submit"
                                    class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                    id="{{ $profile->id }}-delete-btn">Delete
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-sm text-gray-900 px-6 py-4 whitespace-nowrap" colspan="7">There is no data</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $profiles->links() }}
        </div>
    </div>

</div>

<script src="https://cdn.tailwindcss.com/?plugins=forms"></script>
<script src="{{ asset('js/searchData.js') }}"></script>
</body>
</html>