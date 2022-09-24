<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserModel::all();
        return view('data_karyawan', ['var_user' => $users]);
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ubah_user()
    {
        return view('edit_user');
    }
    public function proses_edit_user(Request $req)
    {
        $v = $this->validate($req, [
            'name'  => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($v) {
            if (Hash::check($req['password'], Auth::user()->password)) {
                if ($req['email'] == Auth::user()->email) {
                    UserModel::where('id', Auth::user()->id)->update(['name' => $req['name'], 'email' => $req["email"]]);
                    session()->flash('berhasil', 'Data Anda Berhasil Diubah');
                    return redirect('/home');
                } else {
                    $email = DB::table('users')->where('email', '=', $req['email'])->first();
                    if ($email) {
                        session()->flash('gagal', 'Data Anda Gagal Diubah');
                        return redirect('/ubah_user');
                    } else {
                        UserModel::where('id', Auth::user()->id)->update(['name' => $req['name'], 'email' => $req["email"]]);
                        session()->flash('berhasil', 'Data Anda Berhasil Diubah');
                        return redirect('/home');
                    }
                }
            } else {
                session()->flash('gagal', 'Data Anda Gagal Diubah');
                return redirect('/ubah_user');
            }
        }
    }
}
