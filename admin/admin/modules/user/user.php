<?php
 // Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<script>window.alert('Untuk mengakses modul, Anda harus login dulu.');
        window.location = 'index.php'</script>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "modules/user/aksi_user.php";

  // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : '';

  switch($act){
    // Tampil User
    default:

    $query  = "SELECT * FROM users ORDER BY username";
    $tampil = mysqli_query($connect, $query);
?>  
    <section class="content-header">
      <h1>
        Data User
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data User</li>
      </ol>
    </section>

    <section class="content">
      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Jumlah Data User, <?php echo mysqli_num_rows($tampil); ?> Data</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php 
            if (isset($_SESSION['namauser'])): 
          ?>
            <a href="?module=user&act=tambahuser" style="margin-bottom: 10px;" class="btn btn-md btn-primary"> <i class="fa fa-plus"></i> Tambah Data User</a>
          <?php endif; ?>
      
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="example1">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>USERNAME</th>
                  <th>EMAIL</th> 
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while ($r=mysqli_fetch_array($tampil)){
                ?>
                <tr>
                  <td><?php echo $no; ?></td>          
                  <td><?php echo $r['username']?></td>
                  <td><?php echo $r['email']?></td>
                  <td>
                    <a class="btn btn-success" href="?module=user&act=edituser&id=<?php echo $r['id_user']; ?>"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" <?php echo "href=\"$aksi?module=user&act=delete&id=$r[id_user]\""; ?>><i class="fa fa-trash"></i></a>
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

    <!-- Tambah User -->
    <?php
    case "tambahuser":
      if ($_SESSION['leveluser']=='admin'){
      ?>
        <section class="content-header">
          <h1>
            Tambah Data
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data User</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="box box-danger">
                  <div class="box-header">
                    <h3 class="box-title">Tambah User</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <form role="form" method="post" enctype="multipart/form-data" <?php echo "action=\"$aksi?module=user&act=input\""; ?>>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value=""/>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" value=""/>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value=""/>
                      </div>
                      

                      <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
                      <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
                      <button type="button" class="btn btn-danger" onclick="self.history.back()"><i class="fa fa-times"></i> Batal</button>
                    </form>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!--/.col (right) -->
          </div>
        </section>
      <?php
      }
      else{
        echo "Anda tidak berhak mengakses halaman ini.";
      }
    break;
    ?>

    <!-- Edit User -->
    <?php
    case "edituser":
      
      $query = "SELECT * FROM users WHERE id_user='$_GET[id]'";
      $hasil = mysqli_query($connect, $query);
      $r     = mysqli_fetch_array($hasil);
     
      if ($_SESSION['leveluser']=='admin'){
    ?> 
        <section class="content-header">
          <h1>
            Edit Data
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data User</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="box box-warning">
                  <div class="box-header">
                    <h3 class="box-title">Edit User</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <form role="form" method="post" enctype="multipart/form-data" <?php echo "action=\"$aksi?module=user&act=update\""; ?>>
                    
                      <!-- text input -->
                      <input type="hidden" name="id" value="<?php echo $r['id_user']; ?>">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $r['username'] ?>"/>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" value=""/>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $r['email'] ?>"/>
                      </div>
                       
                      <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
                      <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
                      <button type="button" class="btn btn-danger" onclick="self.history.back()"><i class="fa fa-times"></i> Batal</button>
                    </form>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!--/.col (right) -->
          </div>
        </section>
    <?php
      }
      else{
        echo "Anda tidak berhak mengakses halaman ini.";
      }
    break;
  }
}
?>  
  
