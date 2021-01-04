<?php

namespace App\Http\Controllers;
use App\Models\contact;
use App\Models\keyword;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function contact()
    {
        $kontak = contact::get();
        return view('admin.kontak', compact('kontak'));
    }
    public function contact_edit($id)
    {
        $data = contact::find($id);
        return view('admin.setup.kontak-edit', ['data' => $data]);
    }
    public function contact_update(Request $request, $id)
    {
        $request->validate([
            'kontak' => 'required',
            'jenis_kontak' => 'required',
        ]);
        contact::where('id', $id)->update([
            'kontak' => $request->kontak,
            'jenis_kontak' => $request->jenis_kontak,
        ]);
    }
    // 
    // keyword
    // 
    public function index()
    {
        $keyword = keyword::get();
        return view('admin.keyword', compact('keyword'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'keyword' => 'required',
        ]);
        keyword::insert([
            'keyword' => $request->keyword,
        ]);
        return redirect()->back();
    }
    public function delete($id)
    {
        $data = keyword::find($id);
        $data->delete();
        return redirect()->back();
    }

}
