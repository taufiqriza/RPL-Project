<?php
 // Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<script>window.alert('Untuk mengakses modul, Anda harus login dulu.');
        window.location = 'index.php'</script>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "modules/bebas-pustaka/aksi.php";

  // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : '';

  switch($act){
    // Tampil User
    default:

    $query  = "SELECT * FROM bebaspustaka ORDER BY nama";
    $tampil = mysqli_query($connect, $query);
?>  
    <section class="content-header">
      <h1>
        Data Mahasiswa
        <small>Seluruh Kampus</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data Mahasiswa</li>
      </ol>
    </section>

    <section class="content">
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">Jumlah Keseluruhan, <?php echo mysqli_num_rows($tampil); ?> Data</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
      
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="example1">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NIM</th>
                  <th>NAMA LENGKAP</th>
                  <th>JUMLAH HAFALAN</th> 
                  <th>KAMPUS</th>
                  <th>STATUS</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query  = "SELECT * FROM bebaspustaka ORDER BY uploadtime DESC";
                $tampil = mysqli_query($connect, $query);
                $no = 1;
                while ($r=mysqli_fetch_array($tampil)){               
                ?>
                <tr>
                  <td><?php echo $no; ?></td>  
                  <td><?php echo $r['nim']?></td>        
                  <td><?php echo $r['nama']?></td>
                  <td><?php echo $r['angkatan']. '/' .$r['tahun']?></td>
                  <td><?php echo $r['kampus']?></td>
                  <td style="font-size: 16px;">
                    <?php
                      if ($r['kampus']=='Siman') {
                        if($r['hardcopy']=='ya' && $r['softcopy']=='ya' && $r['receipt2']=='ada') {
                          echo "<span class='label label-success'>Lengkap</span>";
                        }
                        else{
                          echo "<span class='label label-danger'>Kurang</span>";
                        }
                      }
                      else {
                        if($r['hardcopy']=='ya' && $r['softcopy']=='ya' && $r['receipt2']=='ada' && $r['bp_cabang']=='ada') {
                          echo "<span class='label label-success'>Lengkap</span>";
                        }
                        else{
                          echo "<span class='label label-danger'>Kurang</span>";
                        }
                      }
                    ?>
                  </td>
                  <td>
                    <a href="#myModal" class="btn btn-warning btn-xs" id="custId" data-toggle="modal" data-id="<?php echo $r['id_bp']?>"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-primary btn-xs" href="?module=data-bebas-pustaka&act=edit&id=<?php echo $r['id_bp']; ?>"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" <?php echo "href=\"$aksi?module=data-bebas-pustaka&act=delete&id=$r[id_bp]\""; ?>><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php
                  $no++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <?php
      break;
    ?>

    <!-- Edit Bebas Pustaka -->
    <?php
    case "edit":
      
      $query = "SELECT * FROM bebaspustaka WHERE id_bp='$_GET[id]'";
      $hasil = mysqli_query($connect, $query);
      $row   = mysqli_fetch_array($hasil);
      $date  = date_create($row['uploadtime']);

      if (strlen($row['no_surat'])==23) {
        $no1 = substr($row['no_surat'], 0, 4);
        $no3 = substr($row['no_surat'], 17, 1);
        $no4 = substr($row['no_surat'], 19, 4);
      }
      elseif (strlen($row['no_surat'])==24) {
        $no1 = substr($row['no_surat'], 0, 4);
        $no3 = substr($row['no_surat'], 17, 2);
        $no4 = substr($row['no_surat'], 20, 4);
      }
      elseif (strlen($row['no_surat'])==25) {
        $no1 = substr($row['no_surat'], 0, 4);
        $no3 = substr($row['no_surat'], 17, 3);
        $no4 = substr($row['no_surat'], 21, 4);
      }
      else {
        $no1 = substr($row['no_surat'], 0, 4);
        $no3 = substr($row['no_surat'], 17, 4);
        $no4 = substr($row['no_surat'], 22, 4);
      }
      
     
    ?> 
        <section class="content-header">
          <h1>
            Edit Data :
            <small><?php echo $row['nama']; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data Mahasiswa</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="box box-warning col-md-10">
                  <div class="box-body">
                    <div class="callout callout-danger">
                      <h4>Perhatian !!</h4>
                      <p>Harap di <b>cek kembali</b> data yang di inputt, <b>sebelum memberikan status kelulusan!</b></p>
                    </div>
                    <h2 class="page-header">Data Mahasiswa
                      <small class="pull-right">Disubmit pada : <b><?php echo date_format($date, 'd M Y | H:i:s'); ?></b></small>
                    </h2>
                    <form role="form" method="post" enctype="multipart/form-data" <?php echo "action=\"$aksi?module=data-bebas-pustaka&act=update\""; ?>>
                      <!-- text hidden -->
                      <input type="hidden" name="id" value="<?php echo $row['id_bp']; ?>">
                      <!-- text input -->
                      <table class="table table-bordered table-hover table-striped
                      </table>

                      <!-- Menampilkan Data Diri -->
                      <br>
                      <h2 class="page-header">Detail</h2>
                      <table class="table table-bordered table-hover table-striped">
                        <tr>
                          <th>&nbsp; Muhafidz</th>
                          <td>&nbsp; <?php echo $row['program']; ?></td>
                        </tr>
                        <tr>
                          <th>&nbsp; Jumlah Hafalan</th>
                          <td>&nbsp; <?php echo "$row[angkatan] / $row[tahun]"; ?></td>
                        </tr>
                        <tr>
                          <th>&nbsp; NIM</th>
                          <td>&nbsp; <?php echo $row['nim']; ?></td>
                        </tr>
                        <tr>
                          <th>&nbsp; Nama Lengkap</th>
                          <td>&nbsp; <?php echo $row['nama']; ?></td>
                        </tr>
                        <tr>
                          <th>&nbsp; No Handphone</th>
                          <td>&nbsp; <?php echo $row['kontak']; ?></td>
                        </tr>
                        <tr>
                          <th>&nbsp; Kampus</th>
                          <td>&nbsp; <?php echo $row['kampus']; ?></td>
                        </tr>
                        <tr>
                          <th>&nbsp; Fakultas / Prodi</th>
                          <td>&nbsp; <?php echo "$row[fakultas] / $row[prodi]"; ?></td>
                        </tr>
                        <tr>
                          <th>&nbsp; Catatan Harian</th>
                          <td>&nbsp; <?php echo $row['judul']; ?></td>
                        </tr>               
                      </table>

                      <!-- Validasi Data -->
                      <br>
                      <h2 class="page-header">Validasi Kelulusan</h2>
                      <table class="table table-bordered table-hover table-striped">
                      
                        <tr>
                          <td>1</td>
                          <td>Menyelesaikan Hafalan Sesuai Ketentuan (5 Lembar)</td>
                          <td width="100px"><input type="text" class="form-control" name="ktr_hard" maxlength="1" value="<?php echo $row['ktr_hard']; ?>" onkeypress="return hanyaAngka(event)"></td>
                          <td align="center" width="100px">Lembar</td>
                          <td align="center">
                            <?php
                              if ($row['hardcopy']=='ya') {
                              ?>
                              <select name="hardcopy" class="form-control">
                                <option value="ya" selected>Terpenuhi</option>
                                <option value="tidak">Belum</option>
                              </select>
                              <?php
                              }
                              else {
                                ?>
                              <select name="hardcopy" class="form-control">
                                <option value="ya">Terpenuhi</option>
                                <option value="tidak" selected>Belum</option>
                              </select>
                              <?php
                              }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td colspan="3">Memenuhi Syarat Minimum  <b>Diskusi Islamisasi</b></td>
                          <td align="center">
                            <?php
                              if ($row['softcopy']=='ya') {
                              ?>
                              <select name="softcopy" class="form-control">
                                <option value="ya" selected>Terpenuhi</option>
                                <option value="tidak">Belum</option>
                              </select>
                              <?php
                              }
                              else {
                                ?>
                              <select name="softcopy" class="form-control">
                                <option value="ya">Terpenuhi</option>
                                <option value="tidak" selected>Belum</option>
                              </select>
                              <?php
                              }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td colspan="3">Memenuhi Syarat Minimum Absensi</td>
                          <td align="center">
                            <?php
                              if ($row['receipt2']=='ada') {
                              ?>
                              <select name="receipt2" class="form-control">
                                <option value="ada" selected>Terpenuhi</option>
                                <option value="tidak">Belum</option>
                              </select>
                              <?php
                              }
                              else {
                                ?>
                              <select name="receipt2" class="form-control">
                                <option value="ada">Terpenuhi</option>
                                <option value="tidak" selected>Belum</option>
                              </select>
                              <?php
                              }
                            ?>
                          </td>
                        </tr>
                        <?php
                        if ($row['kampus']=='Siman') {
                          // Disabled
                          // input text hidden
                          echo "<input type='hidden' name='kampus' value='$row[kampus]'>";
                        }
                        else {
                          // input text hidden
                          echo "<input type='hidden' name='kampus' value='$row[kampus]'>";
                        ?>
                        <tr>
                          <td>4</td>
                          <td colspan="3">Validasi Data<br><small>(Khusus kampus Cabang)</small></td>
                          <td align="center">
                            <?php
                              if ($row['bp_cabang']=='ada') {
                              ?>
                              <select name="bp_cabang" class="form-control">
                                <option value="ada" selected>Terpenuhi</option>
                                <option value="tidak">Belum</option>
                              </select>
                              <?php
                              }
                              else {
                                ?>
                              <select name="bp_cabang" class="form-control">
                                <option value="ada">Terpenuhi</option>
                                <option value="tidak" selected>Belum</option>
                              </select>
                              <?php
                              }
                            ?>
                          </td>
                        </tr>
                        <?php
                        }
                        ?>
                      </table>

                      <div class="box-footer">
                        <button type="submit" class="btn btn-success" id="demo"> <i class="fa fa-save"></i> Simpan</button>
                        <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
                        <button type="button" class="btn btn-danger" onclick="self.history.back()"><i class="fa fa-times"></i> Batal</button>
                      </div>
                    </form>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!--/.col (right) -->
          </div>
        </section>
    <?php
    break;
  }
}
?>  
  
