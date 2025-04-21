<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintController extends Controller
{
    public function printAll() {
        $user = User::all();
        $transactions = Transaction::all();

        $pdf = Pdf::loadView('print-all', compact('user', 'transactions'));

        return $pdf->download('all-users-transactions.pdf');
        // return $pdf->stream('user-transactions.pdf'); // untuk tampil di browser
    }

    public function printSingle($id) {
        $transactions = Transaction::findOrFail($id);

        $pdf = Pdf::loadView('print-single', compact( 'transactions'));

        return $pdf->download('user-transactions.pdf');
    }

    public function printHarian(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
        ]);

        $tanggal = $request->tanggal;

        $transactions = Transaction::whereDate('created_at', $tanggal)->get();

        if ($transactions->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada transaksi pada tanggal tersebut.');
        }

        $pdf = Pdf::loadView('print-harian', compact('transactions', 'tanggal'));

        return $pdf->download('transaksi-harian-' . $tanggal . '.pdf');
    }
}
