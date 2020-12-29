<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user()->get();
        $user = User::where('id',  Auth::user()->id)->first();
        return view('admin.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        request()->validate([
            'name' => 'required',
            'password' => 'required|min:8|max:255',
            'email' => 'required',
            'role' => 'required',
        ]);

        $data = [
            'name' => request('name'),
            'password' => bcrypt(request('password')),
            'email' => request('email'),
            'role' => request('role'),
            'foto' => 'public/asset/profile.jpg',
        ];

        User::create($data);

        session()->flash('message', "Swal.fire('Success','New admin added','success')");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.setup.user-edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        // dd(request());
        request()->validate([
            'email' => 'required|email',
            'name' => 'required'
        ]);

        $data = [];

        if(request('password')){
            request()->validate([
                'old_password' => 'required',
                'password' => 'required'
            ]);

            $data = [
                'email' => request('email'),
                'name' => request('name'),
                'password' => bcrypt(request('password')),
            ];
        }

        if (request()->file('foto')) {
            request()->validate([
                'foto' => 'file|image|mimes:jpeg,jpg,svg,png,gif'
            ]);

            if (Auth::user()->foto != '') {
                //delete old image
                Storage::delete(Auth::user()->foto);
            }
            $data['foto'] = Storage::putFile('public/admins', request()->file('foto')->path());
        }

        if (request('password')) {
            if (Hash::check(request('old_password'), Auth::user()->password)) {
                User::where('id', Auth::user()->id)->update($data);
                session()->flash('message', "Swal.fire('Success','Updated profil','success')");
                return back();
            } else {
                session()->flash('message', "Swal.fire('Fail','Wrong password','error')");
                return back();
            }
        }else {
            User::where('id', Auth::user()->id)->update($data);

            session()->flash('message', "Swal.fire('Success','Updated profil','success')");
            return back();
        }
    }

    public function update2(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'email' => 'required|email',
            'name' => 'required'
        ]);

        $data = [];

        if($request->password){
            $request->validate([
                'old_password' => 'required',
                'password' => 'required'
            ]);

            $data = [
                'email' => request('email'),
                'name' => request('name'),
                'password' => bcrypt(request('password')),
            ];
        }
        $password = User::where('id', $id)->first();
        if ($request->password) {
            if (Hash::check(request('old_password'), $password->password)) {
                User::where('id', $id)->update($data);
                session()->flash('message', "Swal.fire('Success','Updated profil','success')");
                return back();
            } else {
                session()->flash('message', "Swal.fire('Fail','Wrong password','error')");
                return back();
            }
        }else {
            User::where('id', $id)->update($data);

            session()->flash('message', "Swal.fire('Success','Updated profil','success')");
            return back();
        }
    }

    public function manage()
    {
        $user = User::get();
        return view('admin.manage.manage', compact('user'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $delete = User::where('id', $id)->first();
            Storage::delete($delete);
        $delete->delete();
        return json_encode(array('statusCode'=>200));
    }
}
