<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\produk;

class ProdukController extends Controller
{
    // 
    // ketampilan produk
    // 
    public function index()
    {
        $produk = produk::get();
        return view('admin.produk', compact('produk'));
        // return json_encode(array('data'=>$userData));
    }
    // 
    // Ke tampilan tambah produk
    // 
    public function tambah()
    {
        return view('admin.tambah-produk');
    }
    // 
    // menambah data
    // 
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_produk' => 'required',
            'harga' => 'required',
            'berat_barang' => 'required',
            'berat_volume' => 'required',
            'diameter_luar' => 'required',
            'diameter_dalam' => 'required',
            'panjang_tali' => 'required',
            'diskripsi' => 'required',
            'foto' => 'required',
            'foto.*' => 'required'
        ]);

        $data = [];
        if($request->hasfile('foto'))
        {
            foreach($request->file('foto') as $image)
            {
                $imgname = Storage::putFile('public/produk',  $image->path());
                $data[] = $imgname;  
            }
        }
        
        produk::create([
            'foto' => json_encode($data),
            'nama_produk' => $request->nama_produk,
            'slug' => Str::random(10),
            'harga' => $request->harga,
            'berat_barang' => $request->berat_barang,
            'berat_volume' => $request->berat_volume,
            'diameter_luar' => $request->diameter_luar,
            'diameter_dalam' => $request->diameter_dalam,
            'panjang_tali' => $request->panjang_tali,
            'diskripsi' => $request->diskripsi,
        ]);
        return redirect('/dashboard/produk');
    }
    // 
    // delete 
    // 
    public function delete($slug)
    {
        $delete = produk::where('slug', $slug)->first();
        foreach(json_decode($delete->foto) as $hapus){
            Storage::delete($hapus);
        }
        $delete->delete();

        return redirect()->back();
    }
    // 
    // Edit data
    // 
    public function edit($slug)
    {
        $edit = produk::where('slug', $slug)->first();
        return view('admin.edit-produk', compact('edit'));
    }
    // 
    // update
    // 
    public function update(Request $request)
    {
        // validasi
        $data = [
            'nama_produk' => 'required',
            'harga' => 'required',
            'berat_barang' => 'required',
            'berat_volume' => 'required',
            'diameter_luar' => 'required',
            'diameter_dalam' => 'required',
            'panjang_tali' => 'required',
            'diskripsi' => 'required',
        ];

        // validasi foto
        if($request->file('foto')){
            $data['foto'] = 'required';
            $data['foto.*'] = 'required';
        }

        $request->validate($data);
        $targetItem = produk::where('slug', $request->slug)->first();
        if($request->hasfile('foto')){
            foreach(json_decode($targetItem->foto) as $hapus){
                Storage::delete($hapus);
            }
            if($request->hasfile('foto')){
                foreach($request->file('foto') as $image)
                {
                    $imgname = Storage::putFile('public/produk',  $image->path());
                    $update_foto[] = $imgname;
                    $update['foto'] = json_encode($update_foto);
                }
            }
        }

        $update['nama_produk'] = $request->nama_produk;
        $update['harga'] = $request->harga;
        $update['berat_barang'] = $request->berat_barang;
        $update['berat_volume'] = $request->berat_volume;
        $update['diameter_luar'] = $request->diameter_luar;
        $update['diameter_dalam'] = $request->diameter_dalam;
        $update['diskripsi'] = $request->diskripsi;

        produk::where('slug', $request->slug)->update($update);
        return redirect('/dashboard/produk');
    }
}
