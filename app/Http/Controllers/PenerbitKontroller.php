<?php

namespace App\Http\Controllers;

use App\Models\PenerbitModel;
use Illuminate\Http\Request;

class PenerbitKontroller extends Controller
{
    public function index()
    {
        $data = PenerbitModel::all();
        return view('admin.penerbit', ['data' => $data, 'title' => 'Data Penerbit', 'active' => 'penerbit']);
    }
}
