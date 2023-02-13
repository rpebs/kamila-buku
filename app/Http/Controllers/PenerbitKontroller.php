<?php

namespace App\Http\Controllers;

use App\Models\PenerbitModel;
use Exception;
use Illuminate\Http\Request;

class PenerbitKontroller extends Controller
{
    public function index()
    {
        $data = PenerbitModel::all();
        return view('admin.penerbit', ['data' => $data, 'title' => 'Data Penerbit', 'active' => 'penerbit']);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:penerbits'
        ]);

        try {
            PenerbitModel::create($validate);
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
            $data = PenerbitModel::where('id', $request->id)->update($validate);
            return back()->with('success', 'Data Berhasil Diubah');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }

    public function delete($id)
    {
        try {
            PenerbitModel::destroy($id);
            return back()->with('success', 'Data Berhasil Dihapus');
        } catch (Exception $e) {
            $message = $e->getMessage();
            return back()->withErrors($message)->withInput();
        }
    }
}
