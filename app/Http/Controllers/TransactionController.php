<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $transactions = ($user->role->name === 'admin' || $user->role->name === 'bank_mini') ?
            Transaction::with('user')->latest()->get() :
            Transaction::where('user_id', $user->id)->latest()->get();

        return view('admin.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:top_up,withdrawal',
            'amount' => 'required|numeric|min:1',
        ]);

        $confirmed = $request->type == 'top_up';

        Transaction::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'amount' => $request->amount,
            'confirmed' => $confirmed,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diajukan!');
    }

    public function konfirmasi(Transaction $transaction)
    {
        $transaction->update(['confirmed' => 'sukses']);

        return redirect()->route('transactions.index')->with('success', 'Penarikan dikonfirmasi.');
    }
}
