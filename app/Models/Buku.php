<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $fillable = [
        'judul_buku',
        'kategori',
        'nama_pengarang',
        'nama_penerbit',
        'ketebalan',
        'tahun_terbit',
        'jumlah_buku',
        'image',
    ];

    public function kategori(){
        return $this->belongsTo(Buku::class);
    }

    public function peminjaman(){
        return $this->belongsTo(Buku::class);
    }

    public function pengembalian(){
        return $this->belongsTo(Buku::class);
    }
}
