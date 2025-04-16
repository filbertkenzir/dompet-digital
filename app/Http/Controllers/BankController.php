<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BankController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index () {
        $users = User::where('id', '!=', Auth::id())->where('role','user')->get();
        $transactions = Transaction::with('sender','receiver')->latest()->get();
        $totalSiswa = User::where('role', 'user')->count();
        $totalTrxp = Transaction::where('confirmed', 'pending')->count();
        $totalTrxs = Transaction::where('confirmed', 'sukses')->count();
        $totalTrxt= Transaction::where('confirmed', 'tolak')->count();
        return view('bank/index', compact('users','transactions', 'totalSiswa', 'totalTrxp', 'totalTrxs', 'totalTrxt'));
    }

    public function riwayat() {
        $users = User::where('id','!=',Auth::id())->where('role','user')->get();
        $transactions = Transaction::with('sender','receiver')->latest()->get();
        return view('bank.riwayat', compact('transactions','users'));
    }

    public function akun() {
        $users = User::where('id','!=',Auth::id())->where('role','user')->get();
        return view('bank.akun', compact('users'));
    }

    public function topUp(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->update(['balance' => $user->balance + $request->amount]);

        Transaction::create([
            'sender_id' => $user->id,
            'type' => 'topup',
            'amount' => $request->amount,
            'confirmed' => 'sukses',
        ]);

        return redirect()->route('bank.index')->with('success', 'Top-up berhasil!');
    }

    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $user = User::findOrFail($request->user_id);

        if ($user->balance < $request->amount) {
            return redirect()->back()->with('error', 'Saldo tidak cukup!');
        }
        $user->update(['balance' => $user->balance - $request->amount]);

        Transaction::create([
            'sender_id' => $user->id,
            'type' => 'withdrawal',
            'amount' => $request->amount,
            'confirmed' => 'sukses',
        ]);

        return redirect()->route('bank.index')->with('success', 'Permintaan penarikan dikirim!');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'role' => 'user',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('bank.index');
    }

    public function update(Request $request, User $user, $id) {

        $user = User::find($id);
        $request->validate( [
            'name' => 'required|string',
            'role' => 'required|string',
            'email' => 'required|email|unique:users,name',
            'password' => 'nullable|min:6',
        ]);

        $user->update([
            'name' => $request->name,
            'role' => 'user',
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        $user->save();

        return redirect()->route('bank.index')->with(['success' => 'Data Berhasil Di Ubah']);
    }

    public function destroy(User $user, $id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('bank.index');
    }
}
