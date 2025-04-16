<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <title>Document</title>
</head>
<body>
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
                        <button onclick="window.print()" class="block text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-3 my-5 text-center">
                            Print
                        </button>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</html>
