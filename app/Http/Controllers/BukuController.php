<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;
use App\Models\PenerbitModel;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $data = BukuModel::all();
        $kategori = KategoriModel::all();
        $penerbit = PenerbitModel::all();

        return view('admin.buku', ['data' => $data, 'title' => 'Data Buku', 'active' => 'databuku', 'kategori' => $kategori, 'penerbit' => $penerbit]);
    }
}
