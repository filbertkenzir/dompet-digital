<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->where('role','user')->get();
        $transactions = Transaction::where('sender_id', Auth::id())->orWhere('receiver_id', Auth::id())->latest()->get();
        return view('user.index', compact('users', 'transactions'));
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
            'amount' => 'required|numeric|min:10000',
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

    public function transfer(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:10000',
        ]);

        $sender = User::findOrFail(Auth::id());
        $receiver = User::findOrFail($request->receiver_id);

        if ($sender->balance < $request->amount) {
            return redirect()->back()->with('error', 'Saldo tidak cukup!');
        }

        $sender->update(['balance' => $sender->balance - $request->amount]);

        $receiver->update(['balance' => $receiver->balance + $request->amount]);

        Transaction::create([
            'sender_id' => $sender->id,
            'receiver_id' => $receiver->id,
            'type' => 'transfer',
            'amount' => $request->amount,
        ]);

        return redirect()->route('user.index')->with('success', 'Transfer berhasil!');
    }

}
