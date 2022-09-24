<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $primaryKey = 'id_member';
    protected $fillable = [
        'nama_member',
        'tgl_lahir',
        'alamat',
        'no_telp',
    ];

    public function peminjaman(){
        return $this->belongsTo(Member::class);
    }

    public function pengembalian(){
        return $this->belongsTo(Member::class);
    }
}
