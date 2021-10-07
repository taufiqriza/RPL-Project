<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Rekap Lporan
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Download</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Data yang BELUM -->
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header with-border">
          <i class="fa fa-close"></i><h3 class="box-title"><b>BELUM</b> Lulus</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="exampleBelum">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NIM</th>
                  <th>NAMA</th>
                  <th>KAMPUS</th>
                  <th>FAKULTAS</th>
                  <th>PRODI</th>
                  <th>JUMLAH HAFALAN / TAHUN</th> 
                  <th>CATATAN</th>
                  <th>STATUS KELLUSAN</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query  = "SELECT * FROM bebaspustaka WHERE hardcopy='tidak' ORDER BY nama";
                $tampil = mysqli_query($connect, $query);
                $no = 1;
                while ($r=mysqli_fetch_array($tampil)){               
                ?>
                <tr>
                  <td><?php echo $no; ?></td>  
                  <td><?php echo $r['nim']?></td>        
                  <td><?php echo $r['nama']?></td>
                  <td><?php echo $r['kampus']?></td>
                  <td><?php echo $r['fakultas']?></td>
                  <td><?php echo $r['prodi']?></td>
                  <td><?php echo $r['angkatan']. '/' .$r['tahun']?></td>
                  <td><?php echo $r['judul']?></td>
                  <td style="font-size: 16px;">
                    <?php 
                      echo "<span class='label label-danger'>BELUM</span>";
                    ?>
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
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- Data yang SUDAH -->
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <i class="fa fa-check"></i><h3 class="box-title"><b>SUDAH</b> Lulus</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="exampleSudah">
              <thead>
                <tr>
                  <th colspan="6"><b>SUDAH</b> Lulus</th>
                </tr>
                <tr>
                  <th>NO</th>
                  <th>NIM</th>
                  <th>NAMA</th>
                  <th>KAMPUS</th>
                  <th>FAKULTAS</th>
                  <th>PRODI</th>
                  <th>JUMLAH HAFALAN / TAHUN</th> 
                  <th>CATATAN</th>
                  <th>STATUS KELLUSAN</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query  = "SELECT * FROM bebaspustaka WHERE hardcopy='ya' ORDER BY nama";
                $tampil = mysqli_query($connect, $query);
                $no = 1;
                while ($r=mysqli_fetch_array($tampil)){               
                ?>
                <tr>
                  <td><?php echo $no; ?></td>  
                  <td><?php echo $r['nim']?></td>        
                  <td><?php echo $r['nama']?></td>
                  <td><?php echo $r['kampus']?></td>
                  <td><?php echo $r['fakultas']?></td>
                  <td><?php echo $r['prodi']?></td>
                  <td><?php echo $r['angkatan']. '/' .$r['tahun']?></td>
                  <td><?php echo $r['judul']?></td>
                  <td style="font-size: 16px;">
                    <?php 
                      echo $r['ktr_hard']." Lembar <b>|&nbsp;&nbsp;</b><span class='label label-success'>SUDAH</span>";
                    ?>
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
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
</section>