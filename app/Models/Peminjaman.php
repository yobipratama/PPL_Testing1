<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\Member;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $fillable = [
        'member'.
        'buku',
        'tgl_pinjam',
        'tgl_kembali',
    ];

    public function buku(){
        return $this->hasMany(Peminjaman::class);
    }

    public function member(){
        return $this->hasMany(Peminjaman::class);
    }
}
