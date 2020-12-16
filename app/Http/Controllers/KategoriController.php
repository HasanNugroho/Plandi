<?php

namespace App\Http\Controllers;
use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = kategori::orderBy('id', 'DESC')->get();
        return view('admin.kategori', compact('kategori'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = new kategori();
        $data->kategori = $request->kategori;
        $data->save();
        return response()->json($data);
    }
    public function delete($id)
    {
        kategori::find($id)->delete();
        return redirect()->back();
    }
}
