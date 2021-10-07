<?php
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo  "<script>window.alert('Untuk mengakses modul, Anda harus login dulu.');
        window.location = 'index.php'</script>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else{
  include "../config/db.php";
  $tampil = mysqli_query($connect, "SELECT * FROM users WHERE username='$_SESSION[namauser]'");
  $r      = mysqli_fetch_array($tampil);
?>

<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../dist/img/<?php echo $r['foto'];?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $r['username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <?php
    // Menu Admin //
    if ($_SESSION['leveluser']=='admin') {
    ?>
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
            <a href="?module=dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="?module=data-bebas-pustaka">
                <i class="fa fa-file-text-o"></i> <span>Data Mahasiswa</span>
            </a>
        </li>
        <li>
            <a href="?module=download">
                <i class="fa fa-download"></i> <span>Laporan</span>
            </a>
        </li>
        <li>
            <a href="?module=user">
                <i class="fa fa-users"></i> <span>Manajemen User</span>
            </a>
        </li>
        <li class="header">LABELS</li>
        <li><a href="../index.php" target="blank"><i class="fa fa-circle-o text-green"></i> <span>Input Data</span></a></li>
        <li><a href="logout.php"><i class="fa fa-circle-o text-red"></i> <span>Keluar</span></a></li>
    </ul>
    <?php
    }
    // Menu User //
    else
    {
    ?>
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
            <a href="?module=dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-file-text-o"></i> <span>Data Mahasiswa</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="?module=tesis_skripsi"><i class="fa fa-cloud-upload"></i> Upload</a></li>
                <li><a href="#"><i class="fa fa-list"></i> List</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-money"></i> <span>Keuangan</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="?module=keuangan"><i class="fa fa-usd"></i> Kelola Keuangan</a></li>
                <li><a href="?module=hutang"><i class="fa fa-minus"></i> Data Hutang</a></li>
                <li><a href="modules/keuangan/print_data.php" target="blank"><i class="fa fa-print"></i> Laporan Keuangan</a></li>
            </ul>
        </li>
        <li class="header">LABELS</li>
        <li><a href="../index.php" target="blank"><i class="fa fa-circle-o text-green"></i> <span>View Website</span></a></li>
        <li><a href="logout.php"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
    </ul>
    <?php
    }
    ?>
</section>
<?php
}
?>