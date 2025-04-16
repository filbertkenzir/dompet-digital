<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .info {
            margin-bottom: 10px;
        }

        .label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }

        .value {
            display: inline-block;
        }

        .box {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 8px;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #f9f9f9;
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

    <h2>Laporan Transaksi</h2>

    <div class="box">
        <div class="info">
            <span class="label">User</span>
            @if ($transactions->type == 'topup' || $transactions->type == 'withdrawal')
                {{ ucfirst($transactions->sender->name) ?? 'User Tidak Ditemukan' }}
            @else
                {{ ucfirst($transactions->sender->name) ?? 'User Tidak Ditemukan' }} --> {{ ucfirst($transactions->receiver->name) ?? 'User Tidak Ditemukan' }}
            @endif
        </div>

        <div class="info">
            <span class="label">Jenis Transaksi:</span>
            <span class="value">{{ ucfirst($transactions->type) }}</span>
        </div>

        <div class="info">
            <span class="label">Jumlah:</span>
            <span class="value">Rp{{ number_format($transactions->amount, 2, ',', '.') }}</span>
        </div>

        <div class="info">
            <span class="label">Status:</span>
            <span class="value">{{ ucfirst($transactions->confirmed) }}</span>
        </div>

        <div class="info">
            <span class="label">Tanggal:</span>
            <span class="value">{{ $transactions->created_at->format('d-m-Y H:i') }}</span>
        </div>

        @if ($transactions->sender)
        <div class="info">
            <span class="label">Pengirim:</span>
            <span class="value">{{ ucfirst($transactions->sender->name) }}</span>
        </div>
        @endif

        @if ($transactions->receiver)
        <div class="info">
            <span class="label">Penerima:</span>
            <span class="value">{{ ucfirst($transactions->receiver->name) }}</span>
        </div>
        @endif
    </div>

    <div class="footer">
        Dicetak pada {{ now()->format('d-m-Y H:i') }}
    </div>

</body>
</html>
