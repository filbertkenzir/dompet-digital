<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .card {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 6px 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Laporan Transaksi</h2>
    </div>

    <div class="card">
        <strong>Total Transaksi:</strong> {{ $transactions->count() }} <br>
        <strong>Transaksi Berhasil:</strong> {{ $transactions->where('confirmed', 'sukses')->count() }} <br>
        <strong>Transaksi Pending:</strong> {{ $transactions->where('confirmed', 'pending')->count() }} <br>
        <strong>Transaksi Dibatalkan:</strong> {{ $transactions->where('confirmed', 'gagal')->count() }} <br>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $i => $trx)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>
                    @if ($trx->type == 'topup' || $trx->type == 'withdrawal')
                        {{ ucfirst($trx->sender->name) ?? 'User Tidak Ditemukan' }}
                    @else
                        {{ ucfirst($trx->sender->name) ?? 'User Tidak Ditemukan' }} --> {{ ucfirst($trx->receiver->name) ?? 'User Tidak Ditemukan' }}
                    @endif
                </td>
                <td>{{ ucfirst($trx->type) }}</td>
                <td>Rp{{ number_format($trx->amount, 2, ',', '.') }}</td>
                <td>{{ ucfirst($trx->confirmed) }}</td>
                <td>{{ $trx->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada {{ now()->format('d-m-Y H:i') }}
    </div>

</body>
</html>
