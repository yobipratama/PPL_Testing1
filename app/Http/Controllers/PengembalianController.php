<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Member;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalian = DB::table('pengembalian')
                      ->join('member', 'member.id_member', '=', 'pengembalian.member_id')
                      ->join('buku', 'buku.id_buku', '=', 'pengembalian.buku_id')
                      ->get();
        return view('layouts.pengembalian')->with('pengembalian', $pengembalian);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = Member::all();
        $buku = Buku::all();
        return view('layouts.createpengembalian', ['member' => $member, 'buku' => $buku]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'member' => 'required',
            'buku' => 'required',
            'tgl_pinjam' => 'required|date_format:Y-m-d',
            'tgl_kembali' => 'required|date_format:Y-m-d',
            'denda' => 'required',
            'keadaan' => 'required',
        ]);

        $pengembalian = new Pengembalian;
        $pengembalian->member_id = $request->get('member');
        $pengembalian->buku_id = $request->get('buku');
        $pengembalian->tgl_pinjam = $request->get('tgl_pinjam');
        $pengembalian->tgl_kembali = $request->get('tgl_kembali');
        $pengembalian->denda = $request->get('denda');
        $pengembalian->keadaan = $request->get('keadaan');
        $pengembalian->save();

        return redirect()->route('pengembalian.index')
            ->with('success', 'Data Pengembalian Berhasil Ditambahkan');
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
    public function edit($id_pengembalian)
    {
        $pengembalian = Pengembalian::find($id_pengembalian);
        $buku = Buku::all();
        $member = Member::all();
        return view('layouts.editpengembalian', compact('pengembalian', 'buku', 'member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        $request->validate([
            'member' => 'required',
            'buku' => 'required',
            'tgl_pinjam' => 'required|date_format:Y-m-d',
            'tgl_kembali' => 'required|date_format:Y-m-d',
            'denda' => 'required',
            'keadaan' => 'required',
        ]);

        $pengembalian->member_id = $request->get('member');
        $pengembalian->buku_id = $request->get('buku');
        $pengembalian->tgl_pinjam = $request->get('tgl_pinjam');
        $pengembalian->tgl_kembali = $request->get('tgl_kembali');
        $pengembalian->denda = $request->get('denda');
        $pengembalian->keadaan = $request->get('keadaan');
        $pengembalian->save();

        return redirect()->route('pengembalian.index')
            ->with('success', 'Data Pengembalian Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pengembalian)
    {
        Pengembalian::where('id_pengembalian', $id_pengembalian)->delete();
        return redirect()->route('pengembalian.index')
            ->with('success', 'Data Pengembalian Berhasil Dihapus');
    }

    public function print()
    {
        $pengembalian = DB::table('pengembalian')
                      ->join('member', 'member.id_member', '=', 'pengembalian.member_id')
                      ->join('buku', 'buku.id_buku', '=', 'pengembalian.buku_id')
                      ->get();
        $html = view('layouts.print')->with('pengembalian', $pengembalian);

        $dompdf = new Dompdf();
        $dompdf->load_html($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream();
    }
}
