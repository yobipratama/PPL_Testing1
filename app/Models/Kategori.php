<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    public function buku() {
        return $this->hasMany(Kategori::class);
    }
}
