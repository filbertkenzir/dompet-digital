<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <title>Document</title>
</head>
<body class="bg-gray-200" style="padding: 2rem">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" style="text-transform: capitalize">{{ Auth::user()->name }} (Bank)</h5>
    <h4 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Saldo: Rp
        {{ number_format(Auth::user()->balance,2,',','.') }}
    </h4>
    <div class="flex mt-6" style="gap: 1rem">
        <div class="block w-1/2 p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <form class="mx-auto" action="{{ route('bank.topUp') }}" method="POST">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Masukan Dana</h5>
                @csrf
                <div class="mb-5">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                    <input type="number" id="text" name="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
        <div class="block w-1/2 p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <form class="mx-auto" action="{{ route('bank.withdraw') }}" method="POST">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tarik Dana</h5>
                @csrf
                <div class="mb-5">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                    <input type="number" id="text" name="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>

    <div class="block max-w-full mt-6 p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700" style="">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Riwayat Transakasi</h5>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4" style="text-transform: capitalize">
                        @if ($transaction->type == 'top_up' || $transaction->type == 'withdrawal')
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
                        @if ($transaction->confirmed === 'pending' && auth()->user()->role === 'bank')
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
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</html>
