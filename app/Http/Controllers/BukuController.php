<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use Exception;
use App\Models\KategoriModel;
use App\Models\PenerbitModel;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $data = BukuModel::with('kategoris')->get();
        $kategori = KategoriModel::all();
        $penerbit = PenerbitModel::all();

        return view('admin.buku', ['data' => $data, 'title' => 'Data Buku', 'active' => 'databuku', 'kategori' => $kategori, 'penerbit' => $penerbit]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'kategoris_id' => 'required',
            'penerbits_id' => 'required',
            'penulis' => 'required',
            'nomor_buku' => 'required',
            'tahun_terbit' => 'required',
            'halaman' => 'required',
            'jumlah' => 'required|integer'
        ]);


        try {
            BukuModel::create($validate);
            return back()->with('success', 'Data Berhasil Ditambah');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }

    public function edit(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'penerbit_id' => 'required',
            'penulis' => 'required',
            'nomor_buku' => 'required',
            'tahun_terbit' => 'required',
            'halaman' => 'required',
            'jum    lah' => 'required|integer'
        ]);


        try {
            BukuModel::where('id', $request->id)->update($validate);
            return back()->with('success', 'Data Berhasil Diubah');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }
    public function delete($id)
    {
        try {
            BukuModel::destroy($id);
            return back()->with('success', 'Data Berhasil Dihapus');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }
}
