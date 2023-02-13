<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;
use App\Models\PenerbitModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login', ['title' => 'Admin Login']);
    }

    public function dashboard()
    {
        $buku = BukuModel::with('kategoris')->get();
        $kategori = KategoriModel::all();
        $penerbit = PenerbitModel::all();

        return view('admin.dashboard', ['buku' => $buku, 'kategori' => $kategori, 'penerbit' => $penerbit, 'title' => 'Dashboard']);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function profil()
    {
        $data = User::where('id', auth()->user()->id)->first();
        return view('/admin/profile', ['title' => 'Profil', 'data' => $data]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin');
    }
}
