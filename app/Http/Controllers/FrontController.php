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
        $whatsapp = contact::where('jenis_kontak', 'whatsapp')->first();
        return view('home', compact('produk', 'kategori', 'testi', 'whatsapp'));
    }
    public function checkout($slug)
    {
        $checkout = produk::where('slug', $slug)->first();
        $whatsapp = contact::where('jenis_kontak', 'whatsapp')->first();
        $sms = contact::where('jenis_kontak', 'sms')->first();
        $telephone = contact::where('jenis_kontak', 'telephone')->first();
                #update add one visitor to table
        if (!session()->get('visitsNews-'.$slug)) {
            session()->put('visitsNews-'.$slug, true);
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
