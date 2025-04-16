<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" /> --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <title>User</title>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-200" style="padding: 2rem">
    {{-- NavBar --}}
    <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAACXBIWXMAAAsTAAALEwEAmpwYAAADHElEQVR4nO2ZPU8UURSGT0hw54L/wUZjZlFKkE6tRFfjB/4CEzuJljDXUBujEWYU7UnwIzIxVCYCakGWqJUuJpqIQiBxpWLnNIC5ZjZuwbK7SNjrWZj3SU5Fsbnvc+45MwMRAAAAAAAAAAAAAAAAAADAX/zDrUf9tDPop51PgauiIK0MSpnAdRaG3JZua40yeJBSftp5EKTVbwSuKjad76p5e+G7ahLBqy1vuxUBQdoZRvjqn0atlZmPsaPkBASuM4TuV5ICVA4ClJwA31UFCFByAh621/7BTHgeFVbPYMcCRjodCAgFBUyda4aAUFDAYm+Tud+GEZSREsCazESm+i3ILs3s6eqdvCEvYKWfzPPjqUQKuPXutryAkoSJs82bxpF0QFnLNfYlbAwBpYp3QryYR46lzKP2vS8guzRjrry82jgCUFQxg7k+x1y70wUBLNgkX/s2v5jiBuj/KwECtOyYhAANAYle1BnsAIIA6S5k3AD5IBgjSD4MFijsAA0B4l3IuAHyQTBGkHwYLFDYAbo+QS5fbzKfe1Ime7LFvO1qNVMd++tS+Bytawdf6CeTu5QyU531CRwC9PbCf39KWQkeN0BvLaDY+RbDxwjStWd++diZPnPA5F/cNOsLz4r1a3zAzFw8BAFs4eklXrjl4a/OjRqzPL6h1r4/Lv4NN0DXV0D2RMuGUOPOLw+/VPnQgwCus4DyR8145FQTsDb/FAK4zgLebEfAjycQwJZHULxwqwn4OYYRZGwv4fhpJ1645eGvfhs106exhI2Nx9DXHRUeQ0OvOPPjijt/J+HjPUDXljCLFzES/xTxoRufIoy0hNme1KZxhE8RWuBz9GV8jja7rfAPGQ0B4l3IuAHyQTBGkHwYLFDYARoCxLuQcQPkg2CMIPkwWKCwA/TeE7AifShOuICc9KE4yQIij+5JH4qTLKDQR0ciTevSB+OkCijeAk2B9MF4lxTZwAzQPvbolfThOKkCShIij3yMI6oafuTRItmmoKkt8ugua/oYeVSQ7jhunMpzP12wLgAAAAAAAAAAAAAAAAAAALRb+QPhQE64KLB0agAAAABJRU5ErkJggg==" alt="wallet--v1" class="h-8">
                <span class="self-center text-2xl font-bold whitespace-nowrap text-green-900">ZenWallet</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="{{ url('logout') }}"><button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center">
                    Logout
                </button></a>
            </div>
        </div>
    </nav>
    {{-- NavBar --}}

    {{-- Main --}}
    <div class="p-6 max-w-7xl mx-auto space-y-8">
        <main class="flex-1 p-4 mt-10">
            {{-- Welcome --}}
            <div class="flex flex-col lg:flex-row gap-4 mb-8">
                <div class="flex-1 bg-white shadow-lg rounded-xl p-6">
                    <h2 class="text-4xl md:text-5xl text-green-900 capitalize">
                        Welcome <br><strong>{{ Auth::user()->name }}</strong>
                    </h2>
                    <span class="inline-block mt-8 px-8 py-2 rounded-full text-xl font-bold text-white bg-green-800 uppercase">
                        {{ Auth::user()->role }}
                    </span>
                </div>

                <div class="flex-1 bg-white shadow-lg rounded-xl p-6">
                    <h2 class="text-4xl md:text-5xl text-yellow-900">
                        Saldo <br><strong>Rp.{{ number_format(Auth::user()->balance,2,',','.') }}</strong>
                    </h2>
                    <a href="#riwayat" class="inline-block mt-8 px-8 py-2 rounded-full text-xl font-bold text-white bg-yellow-800 hover:bg-amber-900 transition-transform duration-300 hover:scale-105">
                        Riwayat Transakasi
                    </a>
                </div>
            </div>
            {{-- Welcome --}}

            {{-- Untuk pesan error --}}
            @if (session('error'))
                <div class="mb-3 px-4 py-2 bg-red-100 border border-red-400 text-red-600 rounded text-sm">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="mb-3 px-4 py-2 bg-green-100 border border-red-400 text-red-600 rounded text-sm">
                    {{ session('succes') }}
                </div>
            @endif
            @error('amount')
                <div class="mb-3 px-4 py-2 bg-red-100 border border-red-400 text-red-600 rounded text-sm">
                    <p>Tidak memenuhi syarat minimum!</p>
                </div>
            @enderror
            {{-- Pesan Error --}}

            {{-- Tombol --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-12">
                <button data-modal-target="crud-modal-1" data-modal-toggle="crud-modal-1" class="bg-green-800 rounded-xl shadow-lg p-6 h-24 focus:ring-4 focus:outline-none focus:ring-green-300 transition-all duration-300 hover:bg-emerald-900 transition-transform duration-300 hover:scale-105" type="button">
                    <h3 class="text-xl font-bold text-white">Top-Up</h3>
                </button>
                <button data-modal-target="crud-modal-2" data-modal-toggle="crud-modal-2" class="bg-green-800 rounded-xl shadow-lg p-6 h-24 focus:ring-4 focus:outline-none focus:ring-green-300 transition-all duration-300 hover:bg-emerald-900 transition-transform duration-300 hover:scale-105" type="button">
                    <h3 class="text-xl font-bold text-white">Withdraw</h3>
                </button>
                <button data-modal-target="crud-modal-3" data-modal-toggle="crud-modal-3" class="bg-yellow-700 rounded-xl shadow-lg p-6 h-24 focus:ring-4 focus:outline-none focus:ring-yellow-300 transition-all duration-300 hover:bg-amber-900 transition-transform duration-300 hover:scale-105" type="button">
                    <h3 class="text-xl font-bold text-white">Transfer</h3>
                </button>
            </div>
            {{-- Tombol --}}

            {{-- Riwayat Transaksi --}}
            <div class="bg-white p-6 rounded-xl shadow">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Riwayat Transakasi</h2>
                </div>

                <div class="overflow-x-auto max-h-[60vh]">
                    <table class="w-full text-left border border-gray-200 rounded-lg">
                        <thead class="sticky top-0 bg-gray-100 text-gray-700">
                            <tr>
                                <th class="p-3">Tanggal</th>
                                <th class="p-3">Jenis</th>
                                <th class="p-3">Jumlah</th>
                                <th class="p-3 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $transaction)
                                <tr class="border-t">
                                    <td class="p-3" style="text-transform: capitalize">{{ $transaction->created_at->format('d M Y') }}</td>
                                    <td class="p-3" style="text-transform: capitalize">{{ $transaction->type }}</td>
                                    <td class="p-3
                                        @if ($transaction->confirmed === 'tolak')
                                            text-gray-400
                                        @elseif ($transaction->type === 'topup' && $transaction->confirmed === 'sukses')
                                            text-green-600
                                        @elseif ($transaction->type === 'topup' && $transaction->confirmed === 'pending')
                                            text-yellow-500
                                        @elseif ($transaction->type === 'withdrawal' && $transaction->confirmed === 'sukses')
                                            text-red-600
                                        @elseif ($transaction->type === 'withdrawal' && $transaction->confirmed === 'pending')
                                            text-yellow-500
                                        @elseif ($transaction->type === 'transfer' && $transaction->confirmed === 'sukses')
                                            text-blue-600
                                        @elseif ($transaction->type === 'transfer' && $transaction->confirmed === 'pending')
                                            text-yellow-500
                                        @endif">
                                        Rp{{ number_format($transaction->amount, 2, ',', '.') }}
                                    </td>
                                    @if ($transaction->confirmed == 'sukses')
                                        <td class="p-3 text-center space-x-2"><span class="text-xs font-bold me-2 px-2.5 shadow py-2  bg-green-200 text-green-600 font-semibold rounded-lg shadow">Dikonfirmasi</span></td>
                                    @elseif ($transaction->confirmed == 'pending')
                                        <td class="p-3 text-center space-x-2"><span class="text-xs font-bold me-2 px-2.5 shadow py-2  bg-yellow-200 text-yellow-600 font-semibold rounded-lg shadow">Pending</span></td>
                                    @else ()
                                        <td class="p-3 text-center space-x-2"><span class="text-xs font-bold me-2 px-2.5 shadow py-2  bg-red-200 text-red-600 font-semibold rounded-lg shadow">Dibatalkan</span></td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-3 text-center text-gray-500">Tidak ada pengguna.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Riwayat Transaksi --}}
        </main>
    </div>
    {{-- Main --}}

        {{-- <div class="overflow-auto max-h-[60vh] bg-white shadow-md rounded-xl mt-4 mb-4">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 p-4">Riwayat Transaksi</h2>
                <table class="w-full text-sm text-left text-gray-500">
                <thead class="sticky top-0 bg-white text-xs text-gray-700 uppercase z-10">
                    <tr class="text-sm text-gray-500">
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Jenis</th>
                        <th class="px-4 py-2">Jumlah</th>
                        <th class="px-4 py-2">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr class="bg-gray-50 hover:bg-gray-100 text-sm text-gray-700">
                            <td class="px-4 py-2">{{ $transaction->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-2">
                                {{ ucfirst($transaction->type) }}
                            </td>
                            <td class="px-4 py-2 font-semibold
                                @if ($transaction->confirmed === 'tolak')
                                    text-gray-400
                                @elseif ($transaction->type === 'topup' && $transaction->confirmed === 'sukses')
                                    text-green-600
                                @elseif ($transaction->type === 'topup' && $transaction->confirmed === 'pending')
                                    text-yellow-500
                                @elseif ($transaction->type === 'withdrawal' && $transaction->confirmed === 'sukses')
                                    text-red-600
                                @elseif ($transaction->type === 'withdrawal' && $transaction->confirmed === 'pending')
                                    text-yellow-500
                                @elseif ($transaction->type === 'transfer' && $transaction->confirmed === 'sukses')
                                    text-blue-600
                                @elseif ($transaction->type === 'transfer' && $transaction->confirmed === 'pending')
                                    text-yellow-500
                                @endif">
                                Rp{{ number_format($transaction->amount, 2, ',', '.') }}
                            </td>
                            @if ($transaction->confirmed == 'sukses')
                                <td class="px-6 py-4"><span class="text-xs font-bold me-2 px-2.5 shadow py-2  bg-green-200 text-green-600 font-semibold rounded-lg shadow">Dikonfirmasi</span></td>
                            @elseif ($transaction->confirmed == 'pending')
                                <td class="px-6 py-4"><span class="text-xs font-bold me-2 px-2.5 shadow py-2  bg-yellow-200 text-yellow-600 font-semibold rounded-lg shadow">Pending</span></td>
                            @else ()
                                <td class="px-6 py-4"><span class="text-xs font-bold me-2 px-2.5 shadow py-2  bg-red-200 text-red-600 font-semibold rounded-lg shadow">Dibatalkan</span></td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-400 py-6">Belum ada transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div> --}}

    <!-- Main modal TopUp -->
    <div id="crud-modal-1" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Top-Up
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal-1">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('user.topUp') }}" method="POST" class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jumlah (Minimum Rp.10.000)</label>
                            <input type="number" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Min 10.000" required="">
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main modal Withdraw -->
    <div id="crud-modal-2" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Withdraw
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal-2">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('user.withdraw') }}" method="POST" class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jumlah</label>
                            <input type="number" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Rp.10000" required="">
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main modal Transfer -->
    <div id="crud-modal-3" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Transfer
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal-3">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form action="{{ route('user.transfer') }}" method="POST" class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jumlah</label>
                            <input type="number" name="amount" id="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Rp.10000" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="siswa" class="block mb-2 text-sm font-medium text-gray-900">Pilih Siswa :</label>
                            <select id="siswa" name="receiver_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected disabled>Siswa</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="relative overflow-x-auto bg-white shadow-md sm:rounded-lg" id="riwayat" style="height: 60vh;">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <div class="flex">
                <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
                    Riwayat Transaksi
                </caption>
            </div>
            <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-8 py-3 bg-white-200">Jenis</th>
                    <th class="px-8 py-3 bg-white-200">Jumlah</th>
                    <th class="px-8 py-3 bg-white-200">Tanggal</th>
                    <th class="px-8 py-3 bg-white-200">Status</th>
                    <th class="px-8 py-3 bg-white-200 w-6">Aksi</th>
                </tr>
            </thead>
            <tbody class="undefined select-none">
                @foreach ($transactions as $transaction)
                <tr class="border-b">
                    <td class="px-6 py-4" style="text-transform: capitalize;">
                        {{ ($transaction->type) }}
                    </td>
                    @if ($transaction->type == 'top_up' || Auth::id() == $transaction->receiver_id || $transaction->confirmed == 'sukses')
                        <td class="text-green-500 px-6 py-4">+ Rp{{ number_format($transaction->amount, 2,',','.') }}</td>
                    @elseif ($transaction->type == 'withdrawal' || Auth::id() == $transaction->sender_id || $transaction->confirmed == 'sukses')
                        <td class="text-red-500 px-6 py-4">- Rp{{ number_format($transaction->amount, 2,',','.') }}</td>
                    @elseif ($transaction->type == 'transfer' || Auth::id() == $transaction->sender_id || $transaction->confirmed == 'sukses')
                        <td class="text-red-500 px-6 py-4">? Rp{{ number_format($transaction->amount, 2,',','.') }}</td>
                    @elseif ($transaction->type == 'top_up' || Auth::id() == $transaction->receiver_id || $transaction->confirmed == 'pending')
                        <td class="text-yellow-500 px-6 py-4">? Rp{{ number_format($transaction->amount, 2,',','.') }}</td>
                    @elseif ($transaction->type == 'top_up' || Auth::id() == $transaction->receiver_id || $transaction->confirmed == 'tolak')
                        <td class="text-grey-500 px-6 py-4">? Rp{{ number_format($transaction->amount, 2,',','.') }}</td>
                    @endif

                    <td class="px-6 py-4">
                        {{ $transaction->created_at }}
                    </td>

                    @if ($transaction->confirmed == 'sukses')
                        <td class="px-6 py-4"><span class="text-xs font-bold me-2 px-2.5 shadow py-2  bg-green-200 text-green-600 font-semibold rounded-lg shadow">Dikonfirmasi</span></td>
                    @elseif ($transaction->confirmed == 'pending')
                        <td class="px-6 py-4"><span class="text-xs font-bold me-2 px-2.5 shadow py-2  bg-yellow-200 text-yellow-600 font-semibold rounded-lg shadow">Pending</span></td>
                    @else ()
                        <td class="px-6 py-4"><span class="text-xs font-bold me-2 px-2.5 shadow py-2  bg-red-200 text-red-600 font-semibold rounded-lg shadow">Dibatalkan</span></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</html>
