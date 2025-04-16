<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <title>Admin | Home</title>
</head>
<body class="m-5 bg-gray-100">
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
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="{{ url('admin') }}" class="block py-2 px-3 md:p-0 text-white bg-green-700 rounded-sm md:bg-transparent md:text-green-700" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('admin/riwayat') }}" class="block py-2 px-3 md:p-0 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-green-700">Riwayat</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="p-6 max-w-7xl mx-auto space-y-8">

        <!-- BAGIAN ATAS: Info Admin dan Statistik -->
        <div class="flex flex-col lg:flex-row gap-6" style="margin-top: 10vh;">
            <!-- Nama Admin -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <h1 class="text-3xl font-bold text-green-900 mb-2">Halo, Selamat Datang!</h1>
                    <h2 class="text-xl font-semibold" style="text-transform: capitalize">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-500 uppercase">{{ Auth::user()->role }}</p>
                </div>
            </div>

            <!-- Statistik -->
            <div class="w-full lg:w-2/3 grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-white p-4 shadow rounded-xl">
                    <h4 class="text-gray-500 text-l">Total Pengguna</h4>
                    <p class="text-2xl font-bold text-green-600">{{ $totalUsers }}</p>
                </div>
                <div class="bg-white p-4 shadow rounded-xl">
                    <h4 class="text-gray-500 text-l">Total Transaksi</h4>
                    <p class="text-2xl font-bold text-blue-600">{{ $totalTransactions }}</p>
                </div>
                <div class="bg-white p-4 shadow rounded-xl">
                    <h4 class="text-gray-500 text-l">Saldo Tersimpan</h4>
                    <p class="text-2xl font-bold text-yellow-500">Rp {{ number_format($totalBalance, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <!-- BAGIAN BAWAH: Daftar Pengguna -->
        <div class="bg-white p-6 rounded-xl shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Daftar Pengguna</h2>
                <button data-modal-target="crud-modal-1" data-modal-toggle="crud-modal-1" class="text-white bg-green-700 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                    Buat Akun
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="p-3">Nama</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Role</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="border-t">
                                <td class="p-3" style="text-transform: capitalize">{{ $user->name }}</td>
                                <td class="p-3">{{ $user->email }}</td>
                                <td class="p-3 uppercase text-sm font-semibold">{{ $user->role }}</td>
                                <td class="p-3 text-center space-x-2">
                                    <button data-modal-target="crud-modal-2{{ $user->id }}" data-modal-toggle="crud-modal-2{{ $user->id }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm" type="button">
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.destroy', ['admin'=> $user->id]) }}" method="POST" onsubmit="return confirm('Anda Yakin Ingin Menghapus?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
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
        
    </div>

    {{-- <div class="flex flex-col lg:flex-row gap-4 mb-6">
        <div class="w-14 bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-4xl md:text-5xl text-green-900">
                Welcome <br><strong>{{ Auth::user()->name }}</strong>
            </h2>
            <span class="inline-block mt-8 px-8 py-2 rounded-full text-xl font-bold text-white bg-green-800 uppercase">
                {{ Auth::user()->role }}
            </span>
        </div>

        <div class="w-32 bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-4xl md:text-5xl text-yellow-900">
                Saldo <br><strong>{{ number_format(Auth::user()->balance,2,',','.') }}</strong>
            </h2>
            <a href="#riwayat" class="inline-block mt-8 px-8 py-2 rounded-full text-xl font-bold text-white bg-yellow-800 hover:bg-amber-900 transition-transform duration-300 hover:scale-105">
                Riwayat Transakasi
            </a>
        </div>
    </div> --}}

    {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="height: 75vh; top: 10vh; left: 9vw; width: 83vw;">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <div class="flex">
                <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    List User
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
                </caption>
                <!-- Modal toggle -->
                <div class="flex">
                    <button data-modal-target="crud-modal-1" data-modal-toggle="crud-modal-1" class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-3 my-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Buat Akun
                    </button>
                    <a href="{{ url('logout') }}"><button type="button" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-3 my-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Logout
                    </button></a>
                </div>
            </div>
            <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" style="text-transform: capitalize">
                        {{ $user->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->email}}
                    </td>
                    <td class="px-6 py-4 uppercase">
                        {{ $user->role}}
                    </td>
                    <td class="py-4 text-right flex">
                        <button data-modal-target="crud-modal-2{{ $user->id }}" data-modal-toggle="crud-modal-2{{ $user->id }}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-3 my-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Edit Akun
                        </button>
                        <form action="{{ route('admin.destroy', ['admin'=> $user->id]) }}" method="POST" onsubmit="return confirm('Anda Yakin Ingin Menghapus?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="block text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-3 my-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                Hapus Akun
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="height: 60vh; top: 15vh; left: 9vw; width: 83vw;">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <div class="flex" style="display:flex;">
                <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Riwayat Transaksi
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
                </caption>
            </div>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4" style="text-transform: capitalize">
                        @if ($transaction->type == 'topup' || $transaction->type == 'withdrawal')
                            {{ $transaction->sender->name ?? 'User Tidak Ditemukan' }}
                        @else
                            {{ $transaction->sender->name ?? 'User Tidak Ditemukan' }} --> {{ $transaction->receiver->name ?? 'User Tidak Ditemukan' }}
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        {{ ($transaction->type) }}
                    </td>
                    <td class="px-6 py-4">
                        Rp{{ number_format($transaction->amount, 2,',','.') }}
                    </td>
                    <td class="px-6 py-4" style="text-transform: capitalize">
                        @if ($transaction->confirmed === 'pending')
                            <span class="text-yellow-500">Menunggu Konfirmasi</span>
                        @elseif ($transaction->confirmed === 'sukses')
                            <span class="text-green-500">Sukses</span>
                        @else
                            <span class="text-red-500">Ditolak</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.single-print') }}"><button class="block text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-3 my-5 text-center">
                            Print
                        </button></a>
                    </td>
                    {{-- <td class="px-6 py-4">
                        @if ($transaction->confirmed === 'pending' && auth()->user()->role === 'admin')
                            <form action="{{ route('transactions.konfirmasi', $transaction->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="p-2 border rounded">
                                    <option value="sukses">Konfirmasi Sukses</option>
                                    <option value="tolak">Tolak</option>
                                </select>
                                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Konfirmasi</button>
                            </form>
                        @endif
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- modal1 -->
    <div id="crud-modal-1" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Buat Akun Baru
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-1">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="edit-form" action="{{ route('admin.store') }}" method="POST" class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Anda" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="test@gmail.com" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                            <select id="category" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected disabled>Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                                <option value="bank">Bank Mini</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" id="password" name="password" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Password"></input>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Tambah Akun Baru
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- modal2 -->
    @foreach ($users as $user)
    <div id="crud-modal-2{{ $user->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Edit Akun
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-2{{ $user->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('admin.update', $user->id) }}" method="POST" class="p-4 md:p-5">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" id="name" value="{{ $user->name }}" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Anda" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" value="{{ $user->email }}" name="email" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="test@gmail.com" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                            <select id="category" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="{{ $user->role }}">{{ $user->role }}</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                                <option value="bank">Bank Mini</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" id="password" name="password" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Password Jika Ingin Mengubah"></input>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</html>
