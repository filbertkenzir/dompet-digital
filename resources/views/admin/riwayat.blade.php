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
                    <a href="{{ url('admin') }}" class="block py-2 px-3 md:p-0 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-green-700">Home</a>
                    </li>
                    <li>
                    <a href="{{ url('admin/riwayat') }}" class="block py-2 px-3 md:p-0 text-white bg-green-700 rounded-sm md:bg-transparent md:text-green-700" aria-current="page">Riwayat</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="p-6 max-w-7xl mx-auto space-y-8" style="margin-top: 10vh">

        <div class="bg-white p-6 rounded-xl shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Riwayat Transaksi</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="p-3">User</th>
                            <th class="p-3">Jenis</th>
                            <th class="p-3">Jumlah</th>
                            <th class="p-3 text-center">Status</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $transaction)
                            <tr class="border-t">
                                <td class="p-3 font-semibold text-sm" style="text-transform: capitalize">
                                    @if ($transaction->type == 'topup' || $transaction->type == 'withdrawal')
                                        {{ $transaction->sender->name ?? 'User Tidak Ditemukan' }}
                                    @else
                                        {{ $transaction->sender->name ?? 'User Tidak Ditemukan' }} --> {{ $transaction->receiver->name ?? 'User Tidak Ditemukan' }}
                                    @endif
                                </td>
                                <td class="p-3 font-semibold text-sm" style="text-transform: capitalize">{{ $transaction->type }}</td>
                                <td class="p-3 text-sm font-semibold">Rp.{{ number_format($transaction->amount,'2',',','.') }}</td>
                                @if ($transaction->confirmed == 'sukses')
                                    <td class="p-3 text-center space-x-2"><span class="text-xs font-bold me-2 px-2.5 shadow py-2  bg-green-200 text-green-600 font-semibold rounded-lg shadow">Dikonfirmasi</span></td>
                                @elseif ($transaction->confirmed == 'pending')
                                    <td class="p-3 text-center space-x-2"><span class="text-xs font-bold me-2 px-2.5 shadow py-2  bg-yellow-200 text-yellow-600 font-semibold rounded-lg shadow">Pending</span></td>
                                @else ()
                                    <td class="p-3 text-center space-x-2"><span class="text-xs font-bold me-2 px-2.5 shadow py-2  bg-red-200 text-red-600 font-semibold rounded-lg shadow">Dibatalkan</span></td>
                                @endif
                                <td class="p-3 text-center">
                                    <a href="{{ route('admin.single-print') }}"><button class="bg-yellow-600 text-white px-3 py-1 rounded hover:bg-yellow-700 text-sm">
                                        Print
                                    </button></a>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</html>
