<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perpustakaan Online - UAS PWL</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="imagesapple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link href="{{ asset('style/assets/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{ asset('style/images/logo.png') }}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="style/images/logo2.png') }}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('/home') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Menu</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Data Buku</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ route('buku.index') }}">Tabel Buku</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route('buku.create') }}">Tambah Buku</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Data Member</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ route('member.index') }}">Tabel Member</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route('member.create') }}">Tambah Member</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Data Peminjaman</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{ route('peminjaman.index') }}">Tabel Peminjaman</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{ route('peminjaman.create') }}">Tambah Peminjaman</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Data Pengembalian</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="{{ route('pengembalian.index') }}">Tabel Pengembalian</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route('pengembalian.create') }}">Tambah Pengembalian</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                        
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                </form>
                                </li>
                        </ul>
                    </li>
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">
                <div class="col-sm-12">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('style/images/admin.jpg') }}" alt="User Avatar">
                        </a>
                        
                        <div class="user-menu dropdown-menu">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                        
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                </form>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <!--/.col-->
        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Edit Data Buku</strong>
                            </div>
                            <div class="card-body card-block">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            <form method="POST" action="{{ route('buku.update', $buku->id_buku) }}" id="myForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                <div class="form-group">
                                    <label for="judul_buku" class=" form-control-label">Judul Buku</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"></div>
                                        <input type="judul_buku" name="judul_buku" class="form-control" id="judul_buku" ariadescribedby="judul_buku" value="{{ old('judul_buku', $buku->judul_buku) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kategori" class=" form-control-label">Kategori</label>
                                    <select name="kategori" id="kategori" class=" form-control">
                                        <option selected disabled value="{{ old('kategori', $buku->kategori) }}">Pilih Kategori</option>
                                    @foreach($kategori as $Kategori)
                                    <option value="{{ $Kategori->id_kategori }}">{{ $Kategori->nama_kategori }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pengarang" class=" form-control-label">Nama Pengarang</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"></div>
                                        <input type="nama_pengarang" name="nama_pengarang" id="nama_pengarang" class="form-control" ariadescribedby="nama_pengarang" value="{{ old('nama_pengarang', $buku->nama_pengarang) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_penerbit" class=" form-control-label">Nama Penerbit</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"></div>
                                        <input type="nama_penerbit" name="nama_penerbit" id="nama_penerbit" class="form-control" ariadescribedby="nama_penerbit" value="{{ old('nama_penerbit', $buku->nama_penerbit) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ketebalan" class=" form-control-label">Ketebalan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"></div>
                                        <input type="ketebalan" name="ketebalan" id="ketebalan" class="form-control" ariadescribedby="ketebalan" value="{{ old('ketebalan', $buku->ketebalan) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_terbit" class=" form-control-label">Tahun Terbit</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"></div>
                                        <input type="date" name="tahun_terbit" id="tahun_terbit" class="form-control" ariadescribedby="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_buku" class=" form-control-label">Jumlah Buku</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"></div>
                                        <input type="jumlah_buku" name="jumlah_buku" id="jumlah_buku" class="form-control" ariadescribedby="jumlah_buku" value="{{ old('jumlah_buku', $buku->jumlah_buku) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class=" form-control-label">Upload Foto</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"></div>
                                        <input type="file" name="image" id="image" class="form-control" required="required" aria-describedby="image" value="{{ old('image', $buku->image) }}">
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('style/assets/js/main.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>

</body>
</html>
