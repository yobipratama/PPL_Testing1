<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Member;
use App\Models\Peminjaman;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Bus;
use Illuminate\Queue\Jobs\RedisJob;
use Dompdf\Dompdf;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $peminjaman = DB::table('peminjaman')
                      ->join('member', 'member.id_member', '=', 'peminjaman.member_id')
                      ->join('buku', 'buku.id_buku', '=', 'peminjaman.buku_id')
                      ->get();
        return view('layouts.peminjaman')->with('peminjaman', $peminjaman);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $member = Member::all();
        $buku = Buku::all();
        return view('layouts.createpeminjaman', ['member' => $member, 'buku' => $buku]);
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
        ]);

        $peminjaman = new Peminjaman;
        $peminjaman->member_id = $request->get('member');
        $peminjaman->buku_id = $request->get('buku');
        $peminjaman->tgl_pinjam = $request->get('tgl_pinjam');
        $peminjaman->tgl_kembali = $request->get('tgl_kembali');
        $peminjaman->save();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data Peminjaman Berhasil Ditambahkan');
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
    public function edit($id_peminjaman)
    {
        $peminjaman = Peminjaman::find($id_peminjaman);
        $member = Member::all();
        $buku = Buku::all();
        return view('layouts.editpeminjaman', compact('peminjaman', 'member', 'buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'member' => 'required',
            'buku' => 'required',
            'tgl_pinjam' => 'required|date_format:Y-m-d',
            'tgl_kembali' => 'required|date_format:Y-m-d',
        ]);

        $peminjaman->member_id = $request->get('member');
        $peminjaman->buku_id = $request->get('buku');
        $peminjaman->tgl_pinjam = $request->get('tgl_pinjam');
        $peminjaman->tgl_kembali = $request->get('tgl_kembali');
        $peminjaman->save();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data Peminjaman Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_peminjaman)
    {
        Peminjaman::where('id_peminjaman', $id_peminjaman)->delete();
        return redirect()->route('peminjaman.index')
            ->with('success', 'Data Peminjaman Berhasil Dihapus');
    }

    public function print_pdf()
    {
        $peminjaman = DB::table('peminjaman')
                      ->join('member', 'member.id_member', '=', 'peminjaman.member_id')
                      ->join('buku', 'buku.id_buku', '=', 'peminjaman.buku_id')
                      ->get();
        $html = view('layouts.print_pdf')->with('peminjaman', $peminjaman);

        $dompdf = new Dompdf();
        $dompdf->load_html($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream();
    }
}
