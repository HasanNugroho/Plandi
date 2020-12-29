<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request as request1;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\produk;
use App\Models\kategori;

class ProdukController extends Controller
{
    // 
    // Menampilkan produk ke frontedn
    // 
    public function front()
    {
        // dd(request1::get('kategori'));
        $produk = produk::all();
        if(request1::get('kategori')){
            $produk = produk::where('kategori', request1::get('kategori'))->get();
        }
        return $produk;
    }
    // 
    // Search
    // 
    public function search()
    {
        $produk = produk::search(request1::get('search'))->get();
        $key = request1::get('search');
        $search_count = $produk->count();
        $jenis = 'search_result';
        $rekomendasi = produk::where('slug','!=',$produk[0]->slug)->latest()->limit(4)->get();
        $count_rekomendasi = $rekomendasi->count();
        if($produk->count() > 0){
            return view('product', compact('produk', 'key', 'search_count', 'jenis', 'rekomendasi', 'count_rekomendasi'));
        }else{
            return back()->with(['danger' => 'Search Results for ' .$key. ' not available']);
        }
    }
    // 
    // Menampilkan produk
    // 
    public function index()
    {
        $kategori = kategori::all();
        $produk = produk::get();
        return view('admin.produk', compact('produk', 'kategori'));
        // return json_encode(array('data'=>$userData));
    }
    // 
    // menambah data
    // 
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'nama_produk' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'berat_barang' => 'required',
            'berat_volume' => 'required',
            'diameter_luar' => 'required',
            'diameter_dalam' => 'required',
            'panjang_tali' => 'required',
            'diskripsi' => 'required',
            'foto_utama' => 'required',
        ]);
        // dd($request);

        if($request->hasfile('foto')){
            $this->validate($request,[
                'foto' => 'required',
                'foto.*' => 'required'
            ]);
        }
        $data = [];
        if($request->hasfile('foto'))
        {
            foreach($request->file('foto') as $image)
            {
                $imgname = Storage::putFile('public/produk',  $image->path());
                $data[] = $imgname;  
            }
        }
        if($request->hasfile('foto_utama'))
        {
            $fotoutama = Storage::putFile('public/produk',  $request->foto_utama->path());
        }
        produk::create([
            'foto' => json_encode($data),
            'nama_produk' => $request->nama_produk,
            'slug' => Str::slug($request->nama_produk),
            'foto_utama' => $fotoutama,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'berat_barang' => $request->berat_barang,
            'berat_volume' => $request->berat_volume,
            'diameter_luar' => $request->diameter_luar,
            'diameter_dalam' => $request->diameter_dalam,
            'panjang_tali' => $request->panjang_tali,
            'diskripsi' => $request->diskripsi,
        ]);
        session()->flash('message', "Swal.fire('Success','Produk berhasil ditambah','success')");
        return redirect('/dashboard/produk');
    }
    // 
    // delete 
    // 
    public function delete($slug)
    {
        $delete = produk::where('slug', $slug)->first();
        Storage::delete($delete->foto_utama);
        foreach(json_decode($delete->foto) as $hapus){
            Storage::delete($hapus);
        }
        $delete->delete();
        session()->flash('message', "Swal.fire('Success','Produk berhasil dihapus','success')");
        return redirect()->back();
    }
    // 
    // Edit data
    // 
    public function edit($slug)
    {
        $edit = produk::where('slug', $slug)->first();
        $kategori = kategori::all();
        return view('admin.edit-produk', compact('edit', 'kategori'));
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

        // vlidasi kategori
        if($request->kategori){
            $data['kategori'] = 'required';
        }
        // validasi foto
        if($request->file('foto')){
            $data['foto'] = 'required';
            $data['foto.*'] = 'required';
        }
        // validasi foto utama
        if($request->file('foto_utama')){
            $data['foto_utama'] = 'required';
        }

        $request->validate($data);
        // update kategori
        if($request->kategori){
            $update['kategori'] = $request->kategori;
        }
        // update foto utama
        $targetItem = produk::where('slug', $request->slug)->first();
        if($request->hasfile('foto_utama')){
            Storage::delete($targetItem->foto_utama);

            $fotoutama = Storage::putFile('public/produk',  $request->foto_utama->path());
            $update['foto_utama'] = $fotoutama;
        }
        // update multiple foto
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
        session()->flash('message', "Swal.fire('Success','Produk berhasil diupdate','success')");
        return redirect('/dashboard/produk');
    }
}
