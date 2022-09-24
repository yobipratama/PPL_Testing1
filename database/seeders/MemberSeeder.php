<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $member = [
            [
                'nama_member' => 'Arifin Ilham',
                'tgl_lahir' => '2001-11-02',
                'alamat' => 'Jl. Kenanga No.11 Surabaya',
                'no_telp' => '087881123676',
            ],
            [
                'nama_member' => 'Ismi Maulida',
                'tgl_lahir' => '2001-07-07',
                'alamat' => 'Jl. Sakura No.21 Malang',
                'no_telp' => '085231456098',
            ],
            [
                'nama_member' => 'Maulidatul Hasanah',
                'tgl_lahir' => '2000-12-22',
                'alamat' => 'Jl. Khatulistiwa No.09 Sidoarjo',
                'no_telp' => '087881123676',
            ],
            [
                'nama_member' => 'Firman Amirudin',
                'tgl_lahir' => '2001-04-01',
                'alamat' => 'Jl. Anggrek No.07 Surabaya',
                'no_telp' => '081890876765',
            ],
            [
                'nama_member' => 'Mustofa Aminullah',
                'tgl_lahir' => '2002-01-02',
                'alamat' => 'Jl. Mawar Putih No.101 Malang',
                'no_telp' => '087881123676',
            ],
        ];

        DB::table('member')->insert($member);

    }
}
