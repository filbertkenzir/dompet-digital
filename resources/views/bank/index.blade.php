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
                    <td class="px-6 py-4">
                        {{ $transaction->confirmed ? 'Dikonfirmasi' : 'Menunggu Konfirmasi' }}
                    </td>
                    <td class="px-6 py-4">
                        @if (!$transaction->confirmed && auth()->user()->role->name === 'bank')
                            <form action="{{ route('transactions.confirm', $transaction->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-white bg-green-600 hover:bg-green-700 px-3 py-1 rounded">
                                    Konfirmasi
                                </button>
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
