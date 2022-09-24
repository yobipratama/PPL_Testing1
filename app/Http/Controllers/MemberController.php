<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\Kategori;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::all();
        return view('layouts.member', ['member' => $member]);
    }

    public function create()
    {
        return view('layouts.createmember');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_member' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $member = new Member;
        $member->nama_member = $request->get('nama_member');
        $member->tgl_lahir = $request->get('tgl_lahir');
        $member->alamat = $request->get('alamat');
        $member->no_telp = $request->get('no_telp');
        $member->save();

        return redirect()->route('member.index')
            ->with('success', 'Data Member Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_member)
    {
        $member = Member::where('id_member', $id_member)->first();
        return view('layouts.detailmember', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_member)
    {
        $member = Member::find($id_member);
        return view('layouts.editmember', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_member)
    {
        $request->validate([
            'nama_member' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

       Member::where('id_member', $id_member)
        ->update([
            'nama_member'=>$request->nama_member,
            'tgl_lahir'=>$request->tgl_lahir,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->no_telp,
        ]);

        return redirect()->route('member.index')
            ->with('success', 'Data Member Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_buku)
    {
        
    }
}
