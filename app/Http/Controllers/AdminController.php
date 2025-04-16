<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::all();
        $totalUsers = User::count();
        $totalTransactions = Transaction::count();
        $totalBalance = Transaction::sum('amount');
        $transactions = Transaction::with('sender','receiver')->latest()->get();
        return view('admin/index', compact('users','transactions', 'totalUsers', 'totalTransactions', 'totalBalance'));
    }

    public function riwayat(){
        $transactions = Transaction::with('sender','receiver')->latest()->get();
        return view('admin.riwayat', compact('transactions'));
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
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.index');
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
            'role' => $request->role,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        $user->save();

        return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Di Ubah']);
    }

    public function destroy(User $user, $id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.index');
    }

    public function singlePrint($id) {
        $user = User::find($id);
        $transactions = Transaction::where('sender_id', $id)->orWhere('receiver_id', $id)->get();
        return view('admin/print', compact('user','transactions'));
    }
}
