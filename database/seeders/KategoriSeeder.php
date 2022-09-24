<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kategori = [
            [
                'nama_kategori' => 'Komik',
                'deskripsi'     => 'Komik disebut juga sebagai sastra gambar. 
                Komik menjadi salah satu bentuk komunikasi visual yang berguna 
                untuk menyampaikan informasi dan mempunyai kelebihan berupa 
                mudah dimengerti.',

            ],
            [
                'nama_kategori' => 'Novel',
                'deskripsi'     => 'Novel adalah salah satu jenis karya sastra 
                yang berbentuk prosa. Kisah di dalam novel merupakan hasil karya 
                imajinasi yang membahas tentang permasalahan kehidupan seseorang 
                atau berbagai tokoh.',
            ],
            [
                'nama_kategori' => 'Karya Ilmiah',
                'deskripsi'     => 'Karya ilmiah adalah hasil karya yang diperoleh 
                dari kegiatan menulis dengan menerapkan konvensi ilmiah. Penulisan 
                karya ilmiah menggunakan logika berpikir dan gaya bahasa yang 
                sistematis.',
            ],
            [
                'nama_kategori' => 'Kamus',
                'deskripsi'     => 'Kamus merupakan sejenis buku rujukan yang 
                menerangkan makna kata-kata. Kamus berfungsi untuk membantu seseorang 
                mengenal perkataan baru.',
            ],
            [
                'nama_kategori' => 'Ensiklopedia',
                'deskripsi'     => 'Ensiklopedia adalah karya referensi atau ringkasan 
                yang menyediakan rangkuman informasi dari semua cabang pengetahuan atau 
                dari bidang tertentu.',
            ],
            [
                'nama_kategori' => 'Atlas',
                'deskripsi'     =>  'Atlas adalah kumpulan peta yang disatukan dalam bentuk 
                buku, tetapi juga ditemukan dalam bentuk multimedia.',
            ],
            [
                'nama_kategori' => 'Biografi',
                'deskripsi'     => 'Biografi adalah karya sastra yang berisikan riwayat 
                hidup seorang tokoh ternama.',
            ],
            [
                'nama_kategori' => 'Buku Ajar',
                'deskripsi'     => 'Buku ajar adalah buku acuan yang berisi kumpulan materi 
                dalam cabang ilmu tertentu yang disajikan secara komprehensif.',
            ],
            [
                'nama_kategori' => 'Dongeng',
                'deskripsi'     => 'Dongeng adalah salah satu cerita rakyat yang 
                cukup beragam cakupannya serta berasal dari berbagai kelompok etnis, masyarakat, 
                atau daerah tertentu di berbagai belahan dunia.',
            ],
            [
                'nama_kategori'   => 'Legenda',
                'deskripsi'       => 'Sebuah genre dari cerita rakyat yang terdiri atas 
                narasi yang menampilkan perbuatan-perbuatan manusia yang diyakini atau dipercayai oleh 
                si pencerita dan pendengarnya sebagai suatu kisah nyata yang pernah terjadi.',
            ],
        ];

        DB::table('kategori')->insert($kategori);

    }
}
