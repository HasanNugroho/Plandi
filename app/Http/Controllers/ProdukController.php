<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request as request1;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\produk;
use App\Models\keyword;
use App\Models\kategori;

class ProdukController extends Controller
{
    // 
    // Search
    // 
    public function search()
    {
        if(request1::get('search')){
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
        }else{
            return back();

        }
    }
    // 
    // Menampilkan produk
    // 
    public function index()
    {
        $keyword = keyword::all();
        $kategori = kategori::all();
        $produk = produk::paginate(10);
        return view('admin.produk', compact('produk', 'kategori', 'keyword'));
        // return json_encode(array('data'=>$userData));
    }
    // 
    // menambah data
    // 
    public function store(Request $request)
    {
        // 
        // validasi
        // 
        $data = [
            'nama_produk' => 'required',
            'harga' => 'required',
            'diskripsi' => 'required',
            'foto_utama' => 'required',
            'kategori' => 'required',
            'keyword' => 'required',
            'keyword.*' => 'required'
        ];
        // validasi berat_barang
        if($request->berat_barang){
            $data['berat_barang'] = 'required';
        }
        // validasi berat_volume
        if($request->berat_volume){
            $data['berat_volume'] = 'required';
        }
        // validasi diameter_luar
        if($request->diameter_luar){
            $data['diameter_luar'] = 'required';
        }
        // validasi diameter_dalam
        if($request->diameter_dalam){
            $data['diameter_dalam'] = 'required';
        }
        // validasi panjang_tali
        if($request->panjang_tali){
            $data['panjang_tali'] = 'required';
        }
        // validasi foto
        if($request->file('foto')){
            $data['foto'] = 'required';
            $data['foto.*'] = 'required';
        }
        // $request->validate($data);
        if (!$request->validate($data)) {
            session()->flash('message', "Swal.fire('Success','Produk berhasil ditambah','success')");
            return redirect('/dashboard/produk');
        }
        // 
        // 
        // 


        $data = [];
        if($request->hasfile('foto'))
        {
            foreach($request->file('foto') as $image)
            {
                $imgname = Storage::putFile('public/produk', $image->path())->resize(200, 200);
                $data[] = $imgname;  
            }
        }
        if($request->keyword)
        {
            foreach($request->keyword as $key)
            {
                $key_data[] = $key;  
            }
        }
        if($request->hasfile('foto_utama'))
        {
            $fotoutama = Storage::putFile('public/produk',  $request->foto_utama->path())->resize(200, 200);
        }
        $input = [
            'foto' => json_encode($data),
            'keyword' => json_encode($key_data),
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
        ];
        if (produk::create($input)) {
            session()->flash('message', "Swal.fire('Success','Produk berhasil ditambah','success')");
            return redirect('/dashboard/produk');
        }else{
            session()->flash('message', "Swal.fire('Error','Produk gagal ditambahkan','error')");
            return redirect('/dashboard/produk');
        }
        
    }
    // 
    // delete 
    // 
    public function delete($id)
    {
        $delete = produk::where('id', $id)->first();
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
    public function edit($id)
    {
        $edit = produk::where('id', $id)->first();
        $kategori = kategori::all();
        $keyword = keyword::all();
        return view('admin.edit-produk', compact('edit', 'kategori', 'keyword'));
    }
    // 
    // update
    // 
    public function update(Request $request)
    {
        // dd($request);
        // 
        // validasi
        // 
        $data = [
            'nama_produk' => 'required',
            'harga' => 'required',
            'diskripsi' => 'required',
            'keyword' => 'required',
            'keyword.*' => 'required',
        ];
        // validasi kategori
        if($request->kategori){
            $data['kategori'] = 'required';
        }
        // validasi berat_barang
        if($request->berat_barang){
            $data['berat_barang'] = 'required';
        }
        // validasi berat_volume
        if($request->berat_volume){
            $data['berat_volume'] = 'required';
        }
        // validasi diameter_luar
        if($request->diameter_luar){
            $data['diameter_luar'] = 'required';
        }
        // validasi diameter_dalam
        if($request->diameter_dalam){
            $data['diameter_dalam'] = 'required';
        }
        // validasi panjang_tali
        if($request->panjang_tali){
            $data['panjang_tali'] = 'required';
        }
        // validasi foto
        if($request->file('foto')){
            $data['foto'] = 'required';
            $data['foto.*'] = 'required';
        }
        if($request->file('foto_utama')){
            $data['foto_utama'] = 'required';
        }
        $request->validate($data);
        // 
        // 
        // 

        // update kategori
        if($request->kategori){
            $update['kategori'] = $request->kategori;
        }
        // update foto utama
        $targetItem = produk::where('id', $request->id)->first();
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
        if($request->keyword)
        {
            foreach($request->keyword as $key)
            {
                $key_data[] = $key;  
                $update['keyword'] =json_encode($key_data);
            }
        }
        $update['nama_produk'] = $request->nama_produk;
        $update['slug'] = Str::slug($request->nama_produk);
        $update['harga'] = $request->harga;
        $update['berat_barang'] = $request->berat_barang;
        $update['berat_volume'] = $request->berat_volume;
        $update['diameter_luar'] = $request->diameter_luar;
        $update['diameter_dalam'] = $request->diameter_dalam;
        $update['diskripsi'] = $request->diskripsi;

        produk::where('id', $request->id)->update($update);
        session()->flash('message', "Swal.fire('Success','Produk berhasil diupdate','success')");
        return redirect('/dashboard/produk');
    }
}
