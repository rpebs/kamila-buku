<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = KategoriModel::all();
        return view('admin.kategori', ['data' => $data, 'title' => 'Data Kategori', 'active' => 'datakategori']);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:kategoris'
        ]);

        try {
            KategoriModel::create($validate);
            return back()->with('success', 'Data Berhasil Ditambah');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }

    public function edit(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);

        try {
            $data = KategoriModel::where('id', $request->id)->update($validate);
            return back()->with('success', 'Data Berhasil Diubah');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }

    public function delete($id)
    {
        try {
            KategoriModel::destroy($id);
            return back()->with('success', 'Data Berhasil Dihapus');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }
}
