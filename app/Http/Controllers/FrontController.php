<?php

namespace App\Http\Controllers;
use App\Models\produk;
use App\Models\contact;
use App\Models\kategori;
use Illuminate\Support\Facades\Request as request1;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $produk = produk::all();
        $keterangan = "semua";
        if(request1::get('kategori')){
            $produk = produk::where('kategori', request1::get('kategori'))->get();
            $keterangan = request1::get('kategori');
        }
        // dd($keterangan);
        $tc = new TestimonyController;

        $testi = $tc->testimony();
        $kategori = kategori::all();
        $whatsapp = contact::where('jenis_kontak', 'whatsapp')->first();
        return view('home', compact('produk', 'kategori', 'testi', 'whatsapp', 'keterangan'));
        // return response(array($produk, $testi, $kategori, $whatsapp));
    }
    public function checkout($slug)
    {
        $checkout = produk::where('slug', $slug)->first();
        $whatsapp = contact::where('jenis_kontak', 'whatsapp')->first();
        $sms = contact::where('jenis_kontak', 'sms')->first();
        $telephone = contact::where('jenis_kontak', 'telephone')->first();
                #update add one visitor to table
        if (!session()->get('Visit-produk'.$slug)) {
            session()->put('Visit-produk'.$slug, true);
            $checkout->update([
                'visitor' => $checkout->visitor + 1
            ]);
        }

        return view('checkout', compact('checkout', 'whatsapp', 'sms', 'telephone'));
    }
    public function produk()
    {
        $produk = produk::paginate(12);
        $jenis = 'semua_produk';
        return view('product', compact('produk', 'jenis'));
    }
}
