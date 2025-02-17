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
        $user = User::all();
        $transactions = Transaction::with('sender','receiver')->latest()->get();
        return view('admin/index', compact('user','transactions'));
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

    public function edit($id){
        $user = User::find($id);
        return view('admin/edit', compact('user'));
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
}
