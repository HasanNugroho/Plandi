<?php

namespace App\Http\Controllers;
// seo
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;

use App\Models\produk;
use App\Models\contact;
use App\Models\kategori;
use Illuminate\Support\Facades\Request as request1;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        SEOTools::setDescription('Plandi itu anu');
        SEOTools::opengraph()->setUrl('http://current.url.com');
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'articles');
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
        if (!session()->get('produk'.$slug)) {
            session()->put('produk'.$slug, true);
            $checkout->update([
                'visitor' => $checkout->visitor + 1
            ]);
        }

        // SEO
        if($checkout != null){
        SEOMeta::setTitle($checkout->nama_produk);
        SEOMeta::setDescription($checkout->diskripsi);
        // SEOMeta::addMeta('article:published_time', $checkout->, 'property');
        SEOMeta::addMeta('article:section', $checkout->kategori, 'property');
        SEOMeta::addKeyword($checkout->keyword);
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
