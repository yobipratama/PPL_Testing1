<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<style>
  table{
    border: 2px solid black;
    border-spacing: 4px; 
  }
</style>
<head>
    <title>Laporan Peminjaman</title>
<body>
                  <table id="bootstrap-data-table" class="sectioned">
                    <thead>
                      <tr>
                        <th>Nama Member</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($peminjaman as $key)
                      <tr>
                        <td>{{ $key -> nama_member }}</td>
                        <td>{{ $key -> judul_buku }}</td>
                        <td>{{ $key -> tgl_pinjam }}</td>
                        <td>{{ $key -> tgl_kembali }}</td>
                    </tr>
                      @endforeach
                    </tbody>
                  </table>
</body>
</html>
