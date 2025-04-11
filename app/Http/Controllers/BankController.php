<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index () {
        $user = User::all();
        $transactions = Transaction::with('sender','receiver')->latest()->get();
        return view('bank/index', compact('user','transactions'));
    }

    public function topUp(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000',
        ]);

        $user = User::findOrFail(Auth::id());
        // $user->update(['balance' => $user->balance + $request->amount]);

        Transaction::create([
            'sender_id' => $user->id,
            'type' => 'top_up',
            'amount' => $request->amount,
        ]);

        return redirect()->route('bank.index')->with('success', 'Top-up berhasil!');
    }

    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $user = User::findOrFail(Auth::id());

        // if ($user->balance < $request->amount) {
        //     return redirect()->back()->with('error', 'Saldo tidak cukup!');
        // }
        // $user->update(['balance' => $user->balance - $request->amount]);

        Transaction::create([
            'sender_id' => $user->id,
            'type' => 'withdrawal',
            'amount' => $request->amount,
        ]);

        return redirect()->route('bank.index')->with('success', 'Permintaan penarikan dikirim!');
    }
}
