<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Kategori::all();
        return view('kategori_buku', ['var_kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert_kategori(Request $req)
    {
        $v = $this->validate($req, [
            'name' => 'required|max:255',
            'deskripsi' => 'required|max:255',
        ]);
        if ($v) {
            $kategori = new Kategori();
            $kategori->nama_kategori = $req['name'];
            $kategori->deskripsi = $req['deskripsi'];
            $kategori->created_by = Auth::user()->name;
            $kategori->save();
            session()->flash('berhasil', 'Data Anda Berhasil Ditambahkan');
            return redirect('/kategori_buku');
        }
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
    public function edit_kategori($id)
    {
        $kategori = Kategori::where('id_kategori', $id)->first();
        return view('/edit_kategori', ['var_kategori' => $kategori]);
    }

    public function proses_edit_kategori(Request $req){
        $v = $this->validate($req, [
            'name'  => 'required|max:200',
            'deskripsi' => 'required|max:300',
        ]);
        if ($v) {
            $kategori = Kategori::where('id_kategori', $req['id'])->update(['nama_kategori' => $req["name"], 'deskripsi' => $req["deskripsi"]]);

            if ($kategori) {
                session()->flash('berhasil', 'Data Anda Berhasil Diubah');
                return redirect('/kategori_buku');
            } else {
                session()->flash('gagal', 'Data Anda Gagal Diubah');
                return redirect('/ubah_kategori/' . $req["id"]);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus_kategori($id)
    {
        $member = Kategori::where("id_kategori", $id);
        $member->delete();
        session()->flash('berhasil', 'Data Anda Berhasil Dihapus');
        return redirect('/kategori_buku');
    }
}
