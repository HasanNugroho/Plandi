<?php

namespace App\Http\Controllers;
use App\Models\contact;

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

}
