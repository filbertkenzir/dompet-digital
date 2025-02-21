<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'admin' || $user->role == 'bank') {
            $transactions = Transaction::with(['sender', 'receiver'])->latest()->get();
        } else {
            $transactions = Transaction::where('sender_id', $user->id)
                ->orWhere('receiver_id', $user->id)
                ->latest()->get();
        }

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


        Transaction::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'amount' => $request->amount,
            'confirmed' => 'pending',
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diajukan!');
    }

    public function konfirmasi(Transaction $transaction, Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $sender = User::findOrFail($transaction->sender_id);

        if ($request->status === 'sukses') {
            if ($transaction->type === 'top_up') {
                $sender->increment('balance', $transaction->amount);
            } elseif ($transaction->type === 'withdrawal') {
                if ($sender->balance >= $transaction->amount) {
                    $sender->decrement('balance', $transaction->amount);
                } else {
                    return redirect()->back()->with('error', 'Saldo tidak cukup untuk konfirmasi penarikan.');
                }
            }
            $transaction->update(['confirmed' => 'sukses']);
            return redirect()->route('admin.index')->with('success', 'Transaksi berhasil dikonfirmasi.');

        } elseif ($request->status === 'tolak') {
            $transaction->update(['confirmed' => 'tolak']);
            return redirect()->route('admin.index')->with('info', 'Transaksi telah ditolak.');
        }
        return redirect()->back()->with('error', 'Transaksi tidak valid untuk dikonfirmasi.');
    }
}
