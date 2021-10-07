<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboards</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <!-- ROW 1-->
  <div class="row">
    <div class="col-lg-6 col-xs-12">
      <!-- box SALDO -->
      <div class="small-box bg-red">
        <div class="inner">
          <?php 
            $query = "SELECT count(*) as belum FROM bebaspustaka WHERE hardcopy='tidak'";
            $view = mysqli_query($connect, $query);
            $r=mysqli_fetch_array($view);
          ?>
          <center><p><h4>Mahasiswa yang <b>BELUM</b> lulus Tahfidz</h4></p>
          <h3><?php echo $r['belum']; ?></h3></center>
        </div>
        <div class="icon">
          <i class="fa fa-file-text-o"></i>
        </div>
        <a href="?module=data-bebas-pustaka" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-xs-12">
      <!-- box PEMASUKAN -->
      <div class="small-box bg-green">
        <div class="inner">
          <?php 
            $query = "SELECT count(*) as sudah FROM bebaspustaka WHERE hardcopy='ya'";
            $view = mysqli_query($connect, $query);
            $r=mysqli_fetch_array($view);
          ?>
          <center><p><h4>Mahasiswa yang <b>SUDAH</b> lulus Tahfidz</h4></p>
          <h3><?php echo $r['sudah']; ?></h3></center>          
        </div>
        <div class="icon">
          <i class="fa fa-file-text-o"></i>
        </div>
        <a href="?module=data-bebas-pustaka" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->

  <!-- ROW 2-->
  <div class="row">
    <div class="col-md-6 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-book"> M001</i> &nbsp;<b>Sayyidul Adnan S.Kom </b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered table-hover" id="example1">
            <thead>
              <tr>
                <th>NIM</th>
                <th>NAMA MAHASISWA</th>
                <th>JUMLAH HAFALAN</th> 
                <th>SEMESTER</th>
                <th>STATUS</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query  = "SELECT * FROM bebaspustaka WHERE program='M001 - Sayyidul Adnan S.Kom'";
              $tampil = mysqli_query($connect, $query);
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){               
              ?>
              <tr>
                <td><?php echo $r['nim']?></td>        
                <td><?php echo $r['nama']?></td>
                <td><?php echo $r['tahun']?></td>
                <td><?php echo $r['angkatan']?></td>
                <td style="font-size: 16px;">
                  <?php 
                    if ($r['kampus']=='Siman') {
                        if($r['hardcopy']=='ya' && $r['softcopy']=='ya' && $r['receipt2']=='ada') {
                          echo "<span class='label label-success'>Lulus</span>";
                        }
                        else{
                          echo "<span class='label label-danger'>Belum</span>";
                        }
                      }
                    else {
                      if($r['hardcopy']=='ya' && $r['softcopy']=='ya' && $r['receipt2']=='ada' && $r['bp_cabang']=='ada') {
                        echo "<span class='label label-success'>Lulus</span>";
                      }
                      else{
                        echo "<span class='label label-danger'>Belum</span>";
                      }
                    }
                  ?>
                </td>
                <td>
                  <a href="#myModal" class="btn btn-warning btn-xs" id="custId" data-toggle="modal" data-id="<?php echo $r['id_bp']?>"><i class="fa fa-eye"></i></a>
                </td>
              </tr>
              <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>


    <!-- /.col -->
    <div class="col-md-6 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;M002 <b>Rino Mahendra S.Kom</b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <table class="table table-bordered table-hover" id="example11">
            <thead>
              <tr>
                <th>NIM</th>
                <th>NAMA MAHASISWA</th>
                <th>JUMLAH HAFALAN</th> 
                <th>SEMESTER</th>
                <th>STATUS</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query  = "SELECT * FROM bebaspustaka WHERE program='M002 - Rino Mahendra S.Kom'";
              $tampil = mysqli_query($connect, $query);
              $no = 1;
              while ($r=mysqli_fetch_array($tampil)){               
              ?>
              <tr>
                <td><?php echo $r['nim']?></td>        
                <td><?php echo $r['nama']?></td>
                <td><?php echo $r['tahun']?></td>
                <td><?php echo $r['angkatan']?></td>
                <td style="font-size: 16px;">
                  <?php 
                    if ($r['kampus']=='Siman') {
                        if($r['hardcopy']=='ya' && $r['softcopy']=='ya' && $r['receipt2']=='ada') {
                          echo "<span class='label label-success'>Lulus</span>";
                        }
                        else{
                          echo "<span class='label label-danger'>Belum</span>";
                        }
                      }
                    else {
                      if($r['hardcopy']=='ya' && $r['softcopy']=='ya' && $r['receipt2']=='ada' && $r['bp_cabang']=='ada') {
                        echo "<span class='label label-success'>Lulus</span>";
                      }
                      else{
                        echo "<span class='label label-danger'>Belum</span>";
                      }
                    }
                  ?>
                </td>
                <td>
                  <a href="#myModal" class="btn btn-warning btn-xs" id="custId" data-toggle="modal" data-id="<?php echo $r['id_bp']?>"><i class="fa fa-eye"></i></a>
                </td>
              </tr>
              <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->