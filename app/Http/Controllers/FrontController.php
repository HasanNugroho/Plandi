<?php

namespace App\Http\Controllers;
use App\Models\produk;
use App\Models\contact;
use App\Models\kategori;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $pc = new ProdukController;
        $tc = new TestimonyController;

        $produk = $pc->front();
        $testi = $tc->testimony();
        $kategori = kategori::all();
        return view('home', compact('produk', 'kategori', 'testi'));
    }
    public function checkout($slug)
    {
        $whatsapp = contact::where('jenis_kontak', 'whatsapp')->first();
        $sms = contact::where('jenis_kontak', 'sms')->first();
        $telephone = contact::where('jenis_kontak', 'telephone')->first();
        $checkout = produk::where('slug', $slug)->first();
        return view('checkout', compact('checkout', 'whatsapp', 'sms', 'telephone'));
    }
    public function produk()
    {
        $produk = produk::paginate(12);
        $jenis = 'semua_produk';
        return view('product', compact('produk', 'jenis'));
    }
}
