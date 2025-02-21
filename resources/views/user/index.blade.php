<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <title>User</title>
</head>
<body class="bg-gray-200" style="padding: 2rem">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" style="text-transform: capitalize">{{ Auth::user()->name }}</h5>
    <h4 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Saldo: Rp
        {{ number_format(Auth::user()->balance,2,',','.') }}
    </h4>
    <div class="flex mt-6" style="gap: 1rem">
        <div class="block w-1/2 p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <form class="mx-auto" action="{{ route('user.topUp') }}" method="POST">
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
            <form class="mx-auto" action="{{ route('user.withdraw') }}" method="POST">
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
                            Jenis
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td style="text-transform: capitalize;">{{ ($transaction->type) }}</td>
                        @if ($transaction->type == 'top_up' || Auth::id() == $transaction->receiver_id)
                            <td class="text-green-500">+ Rp{{ number_format($transaction->amount, 2,',','.') }}</td>
                        @elseif ($transaction->type == 'withdrawal' || Auth::id() == $transaction->sender_id)
                            <td class="text-red-500">- Rp{{ number_format($transaction->amount, 2,',','.') }}</td>
                        @elseif ($transaction->type == 'transfer' || Auth::id() == $transaction->sender_id)
                            <td class="text-red-500">? Rp{{ number_format($transaction->amount, 2,',','.') }}</td>
                            @endif
                        @if ($transaction->confirmed == 'sukses')
                            <td class="text-green-500">Dikonfirmasi</td>
                        @elseif ($transaction->confirmed == 'pending')
                            <td class="text-grey-500">Menunggu Konfirmasi</td>
                        @else ()
                            <td class="text-reed-500">Dibatalkan</td>
                        @endif
                        <td>{{ $transaction->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="block max-w-full mt-6 p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <form class="mx-auto" action="{{ route('user.transfer') }}" method="POST">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Transaksi User</h5>
            @csrf
            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                <input type="number" id="text" name="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <form class="max-w-sm mx-auto">
                <label for="siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Siswa :</label>
                <select id="siswa" name="receiver_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option selected disabled>Siswa</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</html>
