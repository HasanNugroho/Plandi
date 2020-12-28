<?php

namespace App\Http\Controllers;
use App\Models\produk;
use App\Models\contact;
use App\Models\kategori;
use App\Models\visitor;
use App\Models\testimony;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Index()
    {
        $testi = testimony::paginate(5);
        $produk = produk::paginate(10);
        
        $visitor = visitor::get()->count();
        $count_kategori = kategori::get()->count();
        $count_testi = testimony::get()->count();
        $count_produk = produk::get()->count();

        return view('dashboard',compact('produk', 'testi', 'count_testi', 'count_produk', 'count_kategori', 'visitor'));
    }
}
