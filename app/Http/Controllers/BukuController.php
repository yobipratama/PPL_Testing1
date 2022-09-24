<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = DB::table('buku')
                ->join('kategori', 'kategori.id_kategori', '=', 'buku.kategori_id')
                ->get();
        return view('layouts.buku')->with('buku', $buku);
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('layouts.createbuku', ['kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'kategori' => 'required',
            'nama_pengarang' => 'required',
            'nama_penerbit' => 'required',
            'ketebalan' => 'required',
            'tahun_terbit' => 'required|date_format:Y-m-d',
            'jumlah_buku' => 'required',
            'image' => 'image',

        ]);

        if($request->file('image')) {
            $image_name = $request->file('image')->store('images', 'public');
        }

            $buku = new Buku;
            $buku->judul_buku = $request->get('judul_buku');
            $buku->kategori_id = $request->get('kategori');
            $buku->nama_pengarang = $request->get('nama_pengarang');
            $buku->nama_penerbit = $request->get('nama_penerbit');
            $buku->ketebalan = $request->get('ketebalan');
            $buku->tahun_terbit = $request->get('tahun_terbit');
            $buku->jumlah_buku = $request->get('jumlah_buku');
            $buku->image = $image_name;
            $buku->save();

            return redirect()->route('buku.index')
                ->with('success', 'Data Buku Berhasil Ditambahkan');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_buku)
    {
        $buku = Buku::where('id_buku', $id_buku)->first();
        return view('layouts.detailbuku', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_buku)
    {
        $buku = Buku::find($id_buku);
        $kategori = Kategori::all();
        return view('layouts.editbuku', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_buku)
    {
        $request->validate([
            'judul_buku' => 'required',
            'kategori' => 'required',
            'nama_pengarang' => 'required',
            'nama_penerbit' => 'required',
            'ketebalan' => 'required',
            'tahun_terbit' => 'required|date_format:Y-m-d',
            'jumlah_buku' => 'required',
            'image' => 'image',

        ]);
        $buku = Buku::with('kategori')->where('id_buku', $id_buku)->first();

        if($buku->image)
        {
            Storage::delete($buku->image);
            $image = $request->file('image')->store('gambar', 'public');
        }else{
            $image = $buku->image;
        }

        $buku->judul_buku = $request->get('judul_buku');
        $buku->kategori_id = $request->get('kategori');
        $buku->nama_pengarang = $request->get('nama_pengarang');
        $buku->nama_penerbit = $request->get('nama_penerbit');
        $buku->ketebalan = $request->get('ketebalan');
        $buku->tahun_terbit = $request->get('tahun_terbit');
        $buku->jumlah_buku = $request->get('jumlah_buku');
        $buku->image = $image;
        $buku->save();

        return redirect()->route('buku.index')
            ->with('success', 'Data Buku Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_buku)
    {
        Buku::where('id_buku', $id_buku)->delete();
        return redirect()->route('buku.index')
            ->with('success', 'Data Buku Berhasil Dihapus');
    }
}
