<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\testimony;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TestimonyController extends Controller
{
    public function testimony()
    {
        $testi = testimony::paginate(3);
        return $testi;
    }
    public function index()
    {
        $testi = testimony::get();
        return view('admin.testi', compact('testi'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'komentar' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:8048',
        ]);

        $foto = Storage::putFile('public/testi',  $request->foto->path());

        testimony::create([
            'foto' => $foto,
            'nama' => $request->nama,
            'komentar' => $request->komentar,
        ]);
        session()->flash('message', "Swal.fire('Success','Testimoni berhasil ditambah','success')");
        return redirect()->back();
    }
    public function edit($id)
    {
        $data = testimony::find($id);
        return view('admin.setup.testi-edit', ['data' => $data]);
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'komentar' => 'required',
        ]);
        if($request->foto){
            $validator = Validator::make($request->all(), [
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            ]);
        }

        if ($validator->passes()) {
            // update foto
            $targetItem = testimony::where('id', $request->id)->first();
                if($request->hasfile('foto')){
                    Storage::delete($targetItem->foto);

                    $fotoutama = Storage::putFile('public/produk',  $request->foto->path());
                    $update['foto'] = $fotoutama;
                }
            $update['nama'] = $request->nama;
            $update['komentar'] = $request->komentar;
            testimony::where('id', $id)->update($update);
            // return redirect()->back();
          }
    }
    public function delete($id)
    {
        $delete = testimony::where('id', $id)->first();
            Storage::delete($delete);
        $delete->delete();

        return json_encode(array('statusCode'=>200));

    }
}
