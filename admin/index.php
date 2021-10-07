<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Qur'anic System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-1.x/skins/all.css?v=1.0.2">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../../index2.html" class="navbar-brand"><b>Markaz Al Qur'an</b> UNIDA Gontor</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#"> <span class="sr-only">(current)</span></a></li>
            <li><a href="#"></a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Log-In -->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="admin" class="dropdown-toggle" >
                <i class="glyphicon glyphicon-log-in"></i>
                <span class="label label-warning">Login</span>
              </a>
            </li>
            <!-- /.Log-In-menu -->
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->

      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="row">
          <ol class="breadcrumb">
            <li><a href="/quranic"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="#">Page</a></li>
            <li class="active">Rekap Tahfidz</li>
          </ol>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- general form elements -->
          <div class="box col-lg-12">
            <div class="row">
              <div class="box-header">
                <center><br>
                <h3><strong>
                  FORM REKAP TAHFIDZ Al QUR'AN <br><br> UNIDA GONTOR
                </strong></h3>
                <br></center>
              </div>
              <!-- /.col -->
            </div>
            <!-- form start -->
            <form enctype="multipart/form-data" method="POST" action="action.php">
              <div class="box-body">
                <!-- program -->
                <div class="form-group">
                  <label class="control-label">ID Muhafidz</label>
                    <select name="program" class="form-control">
                      <option>-- Please select --</option>
                      <option value="M001 - Sayyidul Adnan S.Kom">M001 - Sayyidul Adnan S.Kom</option>
                      <option value="M002 - Rino Mahendra S.Kom">M002 - Rino Mahendra S.Kom</option>
                      <option value="M003 - Achmad Irfan S.Sos">M003 - Ahmad Trisna S.Kom</option>
                      <option value="M004 - Deni Setiawan S.Pd">M004 - Deni Setiawan S.Pd</option>
                      <option value="M005 - Faiz Aunullah S.T">M005 - Faiz Aunullah S.T</option>
                      <option value="M006 - Alif Fauzi Arfani - S.Ilkom">M006 - Alif Fauzi Arfani - S.Ilkom</option>
                      <option value="M007 - Abdulrohman M.Kom">M007 - Abdulrohman M.Kom</option>
                      <option value="M008 - Delyan Achmad M.Ag">M008 - Delyan Achmad M.Ag</option>
                      <option value="M009 - Muhamad Taufiq Riza M.Kom">M009 - Muhamad Taufiq Riza M.Kom</option>
                      <option value="M010 - Faishal Reza Pradana M.Kom">M010 - Faishal Reza Pradana M.Kom</option>
                      <option value="M011 - Dihin Muryatmoko M.T">M011 - Dihin Muryatmoko M.T</option>
                      
                    </select>
                </div>
                <div class="form-group">
                  <label>Semester</label>
                  <input type="text" class="form-control" name="angkatan" maxlength="3" onkeypress="return hanyaAngka(event)" placeholder="Semester" required>
                </div>
                <div class="form-group">
                  <label>Jumlah Hafalan/Surah</label>
                  <input type="text" class="form-control" name="tahun" maxlength="20" onkeypress="return //hanyaAngka(event)" placeholder="Ayat / Surah" required>
                </div> 
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                  <label for="judul">NIM</label>
                  <input type="text" class="form-control" name="nim" placeholder="NIM" maxlength="15" onkeypress="return hanyaAngka(event)" required>
                </div>
                <!-- Kampus -->
                <div class="form-group">
                  <label class="control-label">Kampus</label>
                    <select name="kampus" class="form-control">
                      <option>-- Please select --</option>
                      <option value="Siman">Siman</option>
                      <option value="Robitoh">Robitoh</option>
                      <option value="UNIDA Gontor Mantingan">UNIDA Gontor Mantingan</option>
                      <option value="Gontor Putri 1 Mantingan">Gontor Putri 1 Mantingan</option>
                      <option value="Gontor Putri 2 Mantingan">Gontor Putri 2 Mantingan</option>
                      <option value="Gontor Putri 3 karangbanyu">Gontor Putri 3 karangbanyu</option>
                      <option value="Gontor Putri 5 Kandangan">Gontor Putri 5 Kandangan</option>
                      <option value="Gontor 3 Kediri">Gontor 3 Kediri</option>
                      <option value="Gontor 6 Magelang">Gontor 6 Magelang</option>
                    </select>
                </div>          
                <!-- fakultas -->
                <div class="form-group">
                  <label class="control-label">Fakultas</label>
                    <select name="fakultas" class="form-control">
                      <option>-- Please select --</option>
                      <option value="Ushuluddin">Ushuluddin</option>
                      <option value="Tarbiyah">Tarbiyah</option>
                      <option value="Shariah">Shariah</option>
                      <option value="FEM">FEM</option>
                      <option value="Humaniora">Humaniora</option>
                      <option value="Tarbiyah">Tarbiyah</option>
                      <option value="Saintek">Saintek</option>
                      <option value="Kesehatan">Kesehatan</option>
                    </select>
                </div>
                <!-- prodi -->
                <div class="form-group">
                  <label class="control-label">Prodi</label>
                    <select name="prodi" class="form-control">
                      <option>-- Please select --</option>
                      <option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
                      <option value="Pendidikan Bahasa Arab">Pendidikan Bahasa Arab</option>
                      <option value="Aqidah Filsafat Islam">Aqidah Filsafat Islam</option>
                      <option value="Studi Agama-Agama">Studi Agama - Agama</option>
                      <option value="Ilmu Al-Quran dan Tafsir">Ilmu Al-Quran dan Tafsir</option>
                      <option value="Perbandingan Madzhab dan Hukum">Perbandingan Madzhab dan Hukum</option>
                      <option value="Hukum Ekonomi Syariah">Hukum Ekonomi Syariah</option>
                      <option value="Informatika">Informatika</option>
                      <option value="Teknologi Industri Pertanian">Teknologi Industri Pertanian</option>
                      <option value="Agro Teknologi">Agro Teknologi</option>
                      <option value="Hubungan Internasional">Hubungan Internasional</option>
                      <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                      <option value="Farmasi">Farmasi</option>
                      <option value="Nutrition">Nutrition</option>
                      <option value="Keselamatan dan Kesehatan Kerja">Keselamatan dan Kesehatan Kerja</option>
                      <option value="Ekonomi Islam">Ekonomi Islam</option>
                      <option value="Manajemen">Manajemen</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="judul">Catatan <br><small><i>(Catatan Penting)</i></small></label>
                  <textarea name="judul" class="form-control" placeholder="Catatan"></textarea>
                </div> 
                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                  </div>
                </div> 
                <div class="form-group">
                  <label>Kontak</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" class="form-control" name="kontak" placeholder="No Handphone" maxlength="13" onkeypress="return hanyaAngka(event)" required>
                  </div>
                </div> 
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="upload">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
          <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2021 Qur'anic </a>.</strong> Universitas Darussalam Gontor.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->
<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>
<!-- iCheck 1.0.1 -->
<script src="plugins/icheck-1.x/icheck.js?v=1.0.2"></script>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
</body>
</html>
