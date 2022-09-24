<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;
use App\Models\Member;

class Pengembalian extends Model
{
    use HasFactory;
    protected $table = 'pengembalian';
    protected $primaryKey = 'id_pengembalian';
    protected $fillable = [
        'member'.
        'buku',
        'tgl_pinjam',
        'tgl_kembali',
        'denda',
        'keadaan',
    ];

    public function buku(){
        return $this->hasMany(Pengembalian::class);
    }

    public function member(){
        return $this->hasOne(Pengembalian::class);
    }
}
